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

        //$total = $cart->totalPrice;		
		$cart->addShippingCost($totalprice, $shippingCost);

    $totalbeforetax = $totalprice + $shippingCost;
    $totalcost = $totalbeforetax;



    $taxcost = $state;
    $state_code = States::where('code',$state)->first();
    $taxcost = ($state_code->tax * $totalbeforetax) / 100;

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
      //return response()->json(array('msg'=> $msg), 200);
      //return response()->json(['new_body' => $post->body], 200);
      //return response()->json(['shippingcost' => $shippingCost, 'total_cost' => $totalprice], 200);
      return response()->json(['totalprice' => $totalprice, 'shippingcost' => $shippingCost, 'totalbeforetax' => $totalbeforetax, 'taxcost' => $taxcost, 'totalcost' => $totalcost], 200);
      //turn response('Hello World', 200)
   }
}

/*

		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->addShippingCost($totalPrice, $shippingCost);
		$request->session()->put('cart', $cart);
		$totalprice = $totalprice + $shippingCost;

                          <option value="0">Please Select Shipping</option>
                          <option value="1">Pick up Store</option>
                          <option value="2">Ground Shipping</option>
                          <option value="3">2nd-Day Shipping</option>
                          <option value="4">Next-Day Shipping</option>

*/                          