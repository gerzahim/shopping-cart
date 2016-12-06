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
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment()
	{

		/*dd('HOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
		$items = array();
		$subtotal = 0;
		$cart = \Session::get('cart');
		$currency = 'USD';
		*/



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
			->setDescription('Pedido de prueba en mi Laravel App Store');

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
		\Session::put('paypal_payment_id', $payment->getId());

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
		$payment_id = \Session::get('paypal_payment_id');

		// clear the session payment ID
		\Session::forget('paypal_payment_id');

		//$payerId = \Input::get('PayerID');

		isset($input['PayerID']) ? $payerId=$input['PayerID'] : $payerId="";

		$token= $input['token'];
		//$token = \Input::get('token');

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('principal')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));

		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar

			$this->saveOrder(\Session::get('cart'));

			\Session::forget('cart');


			return \Redirect::route('home')
				->with('message', 'Compra realizada de forma correcta');
		}
		return \Redirect::route('home')
			->with('message', 'La compra fue cancelada');
	}


	private function saveOrder($cart)
	{
	    $subtotal = 0;
	    foreach($cart as $item){
	        $subtotal += $item->price * $item->quantity;
	    }
	    
	    $order = Order::create([
	        'subtotal' => $subtotal,
	        'shipping' => 100,
	        'user_id' => \Auth::user()->id
	    ]);
	    
	    foreach($cart as $item){
	        $this->saveOrderItem($item, $order->id);
	    }
	}
	
	private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			'quantity' => $item->quantity,
			'price' => $item->price,
			'product_id' => $item->id,
			'order_id' => $order_id
		]);
	}






}