<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Cart;
use ShopCart\Product;
use ShopCart\Order;
use ShopCart\Categories;
use ShopCart\Brand;
use ShopCart\Banner;
use ShopCart\User;
use ShopCart\Subscriber;
use ShopCart\Settings;
use ShopCart\ShippingCost;
use ShopCart\States;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use Mail;
use Validator;


class AjaxController extends Controller
{
   public function index(Request $request){
      
      $input = $request->all();
      
      $shipping_id= $input['id'];
      $totalprice= $input['_totalprice'];
      $state= $input['state'];

      $shippingCost = 0;
      $taxcost = 0;
      
      $shipcosts = ShippingCost::all(); 

      foreach ($shipcosts as $shipcost) {
      	# code...
      	if ($totalprice >= $shipcost->range_value_min and $totalprice <= $shipcost->range_value_max) {
      		# '1pickup', '2ground','3second_day','4next_day'
      		if ($shipping_id == '2') {
      			# 1pickup...
      			$shippingCost = $shipcost->ground;

      		}elseif($shipping_id == '3'){
      			$shippingCost = $shipcost->second_day;
      		}elseif($shipping_id == '4'){
      			$shippingCost = $shipcost->next_day;      			
      		}else {
      			$shippingCost = 0;
      		}
      		break;        		
      	}
      	
      }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        // Get Tax Cost
        $taxcost = $state;
        $state_code = States::where('code',$state)->first();
        $taxcost = ($state_code->tax * $totalprice) / 100;
        $taxcost = round($taxcost, 2);


        // Get Total + Tax
        $subtotalwtax = round($totalprice + $taxcost, 2);
        $cart->addTaxCost($totalprice, $taxcost);


        $totalcost = round($totalprice + $shippingCost + $taxcost, 2);
        $cart->addShippingCost($subtotalwtax, $shippingCost);

        $request->session()->put('cart', $cart);
        //$total = $cart->totalPrice;		
		

/*  
$cart->addShippingCost($totalprice, $shippingCost);
    $cart->addShippingCost($totalprice, $shippingCost);
    $totalbeforetax = $totalprice + $shippingCost;
    $totalbeforetax = round($totalbeforetax, 2);
    $totalcost = $totalbeforetax;

    //round($change, 2);

    $taxcost = $state;
    $state_code = States::where('code',$state)->first();
    $taxcost = ($state_code->tax * $totalbeforetax) / 100;
    $taxcost = round($taxcost, 2);

    $totalcost = $totalbeforetax + $taxcost;
    $cart->addTaxCost($totalbeforetax, $taxcost);  


		$request->session()->put('cart', $cart);
		

/*  
    $totalprice       98
    $shippingcost      2
    $totalbeforetax   100
    $taxcost           7
    $totalcost         107  

      $msg = "This is a simple message 1";
      $msg2 = "This is a simple message 2";
      //dd($msg);
*/      
      $msg = "This is a simple message 1";
      //return response()->json(array('msg'=> $msg), 200);
      return response()->json(['totalprice' => $totalprice, 'taxcost' => $taxcost, 'subtotalwtax' => $subtotalwtax, 'shippingcost' => $shippingCost, 'totalcost' => $totalcost], 200);

      //return response()->json(['shippingcost' => $shippingCost, 'total_cost' => $totalprice], 200);
      //return response()->json(['totalprice' => $totalprice, 'shippingcost' => $shippingCost, 'totalbeforetax' => $totalbeforetax, 'taxcost' => $taxcost, 'totalcost' => $totalcost], 200);
      //return response('Hello World', 200)
   }

   public function setModalask(Request $request){

        Session::put('modal_ask', '1');

    //        Session::forget('cart');
   }

   public function unsetModalask(Request $request){

        Session::forget('modal_ask');
   }


   public function getAddByOneToCart(Request $request){

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        Session::put('cart', $cart);
   }

   public function setQtyItemToCart(Request $request){


      $input = $request->all();
      
      $id_qty= $input['id_qty'];

      list($id, $qty) = split("-", $id_qty);
      
        //$product = Product::find($id);
        //$oldCart = Session::has('cart') ? Session::get('cart') : null;
        //$cart = new Cart($oldCart);
        //$cart->setQtyItem($id, $qty);

        //Session::put('cart', $cart);
        //return response()->json(['totalprice' => $cart->totalPrice]);
        //return response()->json(['totalprice' => $cart->totalPrice], 200);
   }

}

                       