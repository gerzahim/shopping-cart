<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Settings;
use ShopCart\ShippingCost;
use Session;
use Auth;

class ShippingCostController extends Controller
{

    public function getShipping(){

        $shippings = ShippingCost::all();

        //dd($shippings);

        return view('shop.shipping', ['shippings' => $shippings]);        


    } 

    public function getShippingAdmin(Request $request)
    {
        $shippings = ShippingCost::all();

        //dd($shippings);

        return view('admin.shippingcost', ['shippings' => $shippings]);                                   

    }

    public function editShipping($id)
    {

        $shipping = ShippingCost::find($id);


        return view('admin.editshipping', compact('shipping'));
    }

    public function updateShipping(Request $request, $id){

        $shipping = ShippingCost::find($id);

        $array = $request->all();


        $shipping->fill($array)->save();

        Session::flash('message', 'Shipping successfully updated!');

        $shippings2 = ShippingCost::all();
        return view('admin.shippingcost', ['shippings' => $shippings2]);  

    }    
}
