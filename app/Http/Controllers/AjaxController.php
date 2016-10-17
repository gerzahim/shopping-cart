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
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use Mail;
use Validator;


class AjaxController extends Controller
{
   public function index(){

	  $user = User::find(1);
	  $user->name = "Mamalo";
	  $user->save();

      $msg = "This is a simple message.";
      dd($msg);
      return response()->json(array('msg'=> $msg), 200);
   }
}
