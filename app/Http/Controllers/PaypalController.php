<?php 

namespace ShopCart\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Cart;
use ShopCart\Product;
use ShopCart\Order;
use ShopCart\Categories;
use ShopCart\Settings;

use DB;
use Session;
use Auth;
use Mail;
use Validator;
use Illuminate\Support\Facades\Input;


class PaypalController extends BaseController
{
	private $_api_context;

	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		//$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));

		//Get Info from General Variable on DB
		$setting = Settings::find(1);
		$this->_api_context = new ApiContext(new OAuthTokenCredential($setting->paypalclient_id, $setting->paypalsecretkey));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment(Request $request)
	{

		/*dd('HOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
		$items = array();
		$subtotal = 0;
		$cart = \Session::get('cart');
		$currency = 'USD';

            //var url = url+"?name="+name+"&email="+email+"&phone="+phone+"&companyname="+companyname+"&address="+address+"&city="+city+"&state="+state+"&zip="+zip; 
            //alert(url);

		Session::put('modal_ask', '1');

		*/
		$input = $request->all();

		//Save temporary data costumer
		Session::put('name', $input['name']);
		Session::put('email', $input['email']);
		Session::put('phone', $input['phone']);
		Session::put('companyname', $input['companyname']);
		Session::put('address', $input['address']);
		Session::put('city', $input['city']);
		Session::put('state', $input['state']);
		Session::put('zip', $input['zip']);
		Session::put('shipping_id', $input['shipping_id']);

        // Get General Parameters
        $id=1;
        $setting = Settings::find($id);  
        $setting->name_site = str_replace("&#039;","'", $setting->name_site);


		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$items = array();
		$subtotal = 0;
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
		$currency = 'USD';

		foreach($cart->items as $product){
			$item = new Item();
			$item->setName($product['item']['title'])
			->setCurrency($currency)
			->setDescription($product['item']['description'])
			->setQuantity($product['qty'])
			->setPrice($product['item']['price']);

			$items[] = $item;
			$subtotal += $product['qty'] * $product['item']['price'];
		}		


		$item_list = new ItemList();
		$item_list->setItems($items);

		$details = new Details();
		$details->setSubtotal($subtotal);
		$details->setTax($cart->taxCost); 
		$details->setShipping($cart->shippingCost);
		//->setTax(1.3);


		/////////////////////////////////
		// CHECK Amount with Tax 
		/////////////////////////////////
		$total = $subtotal + $cart->shippingCost + $cart->taxCost;

		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Order From '. $setting->name_site);

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		Session::put('paypal_payment_id', $payment->getId());

		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}

		return \Redirect::route('cart-show')
			->with('error', 'Ups! Error desconocido.');

	}

	public function getPaymentStatus(Request $request)
	{

		$input = $request->all();

		// Get the payment ID before session clear
		$payment_id = Session::get('paypal_payment_id');


		// clear the session payment ID
		Session::forget('paypal_payment_id');

		//$payerId = \Input::get('PayerID');

		isset($input['PayerID']) ? $payerId=$input['PayerID'] : $payerId="";

		$token= $input['token'];
		//$token = \Input::get('token');

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token) ) {
                Session::flash('alert-danger', 'Error - We can’t process your payment right now, so please contact us !!!');     
                return redirect('checkout');   			
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';echo 'payerId->'.$payerId;echo 'payment_id->'.$payment_id;exit; // DEBUG RESULT, remove it later

		if ($result->getState() == 'approved') { 

			// payment made

			$this->saveOrder($payment_id);

			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar

			//$this->saveOrder(Session::get('cart'));

			//Session::forget('cart');

			Session::flash('alert-success', 'Thank You! Your Purchase Was Successfully Completed !!');     
	        return redirect('principal');  

			//return \Redirect::route('home')->with('message', 'Compra realizada de forma correcta');
		}

		//return \Redirect::route('home')->with('message', 'La compra fue cancelada');
		Session::flash('alert-danger', 'Your Purcharse was Cancel !!!');     
        return redirect('checkout');  
	}


	private function saveOrder($payment_id){


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);		

	    // Saving Order on Database
	    $order = new Order();
	    $order->cart = serialize($cart);            
	    $order->address = Session::get('address'); 
	    $order->city = Session::get('city'); 
	    $order->state = Session::get('state'); 
	    $order->zip = Session::get('zip'); 
	    $order->country = Session::get('country'); 
	    $order->name = Session::get('name'); 
	    $order->email = Session::get('email'); 
	    $order->phone = Session::get('phone'); 
	    $order->companyname = Session::get('companyname'); 	
		

	    $order->payment_id = $payment_id;

	    $shipping_id = Session::get('shipping_id');

	    // Set order_status to Pick Up Order
        if ($shipping_id == '1') {
            $order->status = "0";
        }

        // Save like Guess or Id_user
        if (Auth::check()) {
            // The user is logged in...
            Auth::user()->orders()->save($order);
        }else{
            // Save user like guess
            $order->user_id = "1";
            //orders()->save($order);
            $order->save();
        }         
		
		
        //Unserialize to email format
        $order->cart = unserialize($order->cart);

        // Get General Parameters
        $id=1;
        $setting = Settings::find($id);  

        // Define to Mail Message
        switch ($shipping_id) {
            case '1':
                $shipping_id = "Pick up Store";
                break;
            case '2':
                $shipping_id = "Ground Shipping";
                break;
            case '3':
                $shipping_id = "2nd-Day Shipping";
                break;
            case '4':
                $shipping_id = "Next-Day Shipping";
                break;                                                            
            
            default:
                # code...
                break;
        }

        //Data Email Format
        $data = array(

            'email_site' => $setting->email_site, 
            'name_site' => $setting->name_site,                
            'email' => $order->email,
            'costumer' => $order->name,
            'idorder' => $order->id,
            'order_placed' => date('F d, Y h:i:s A'),
            'order' => $order->cart,
            'phone' => $order->phone,
            'companyname' => $order->companyname,
            'address' => $order->address,
            'city' => $order->city,
            'state' => $order->state,
            'zip' => $order->zip,
            'country' => $order->country,
            'shipping' => $shipping_id
        ); 

        $data['name_site'] = str_replace("&#039;","'",$data['name_site']);
        // Send Email to Client
        Mail::send('emails.order', $data, function ($message) use ($data){              

            $message->from($data['email_site'], $data['name_site']);
            $message->to($data['email']);
            $message->subject('You have a New Order on '.$data['name_site'].'');

        });                         

        // Send Email to Administrator
        Mail::send('emails.neworder', $data, function ($message) use ($data){

            $message->from($data['email']);
            $message->to($data['email_site'], $data['name_site']);
            $message->subject('New Order Pending on '.$data['name_site'].'');
        });  



        // Delete Product From Stock 
        //dd($cart);
        $cart = is_array($cart) ? $cart : array($cart);

        
        //dd($cart);
        foreach ($cart as $items) {
            //dd($items->totalQty);
            //dd($items->items);
            foreach ($items->items as $item) {
                //dd($item['item']['id']);
                //dd($item['qty']);                    
                
                $product = Product::find($item['item']['id']);
                //dd($product->quantity);
                
                $product->quantity = $product->quantity - $item['qty'];

                // Check if qty = 0 
                // Send Email to Administrator , Stock it's Over
                // Product Status = 0
                if ($product->quantity == 0) {

                    //Send Email 
                    $data = array(

                        'email_site' => $setting->email_site,              
                        'name_site' => $setting->name_site,
                        'item' => $product->title,
                        'sku' => $product->sku
                    );

                    $data['name_site'] = str_replace("&#039;","'",$data['name_site']);

                    Mail::send('emails.stockover', $data, function ($message) use ($data){
                        $message->from($data['email_site']);
                        $message->to($data['email_site'], $data['name_site']);
                        $message->subject(' this item it is over on '.$data['name_site'].'');
                    });
                    $product->status = 0;                           
                }

                
                $product->save();


            }
        }


    //delete cart session
    Session::forget('cart');

    //delete temporary data costumer
    Session::forget('name');
    Session::forget('email');
    Session::forget('phone');
    Session::forget('companyname');
    Session::forget('address');
    Session::forget('city');
    Session::forget('state');
    Session::forget('zip');
    Session::forget('shipping_id');

	}
	

}