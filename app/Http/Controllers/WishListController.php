<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Cart;
use ShopCart\Order;
use ShopCart\Settings;
use ShopCart\User;
use ShopCart\Product;
use ShopCart\WishList;
use Session;
use Auth;

class WishListController extends Controller
{


    public function getWishList(){

        $products = array();
        $wishlist = array();
        $quantity = array();

        $wishlists = WishList::all();
        
        foreach ($wishlists as $wishlist) {
            $products[] = Product::find($wishlist->product_id); 
            $quantity[$wishlist->product_id]['qty'] = $wishlist->qty;
        }
        //DD($products);
        return view('shop.wishlist', ['products' => $products, 'wishlist' => $wishlist, 'quantity' => $quantity]);
    }


    public function getAddToWishList(Request $request, $id)
    {   

        $product = Product::find($id);

        $wishlist = WishList::where('product_id',$id)->first();
        //if(count($user) > 0 || count($subscriber) > 0 ){}

        if ($wishlist == null) {
            // Insert on DB
            $wishlist = new WishList;
            if (Auth::check()) {
                // The user is logged in...
                $wishlist->user_id = Auth::user()->id;
            }else{
                // Save user like guess
                $wishlist->user_id = 1;
            } 

            $wishlist->product_id = $product->id;
            $wishlist->qty = 1;
            Session::flash('alert-success', 'Product successfully Added to WishList!');

        }else{
            // Update qty on DB
            $wishlist->qty = $wishlist->qty + 1;
            Session::flash('alert-success', 'Product successfully Updated WishList!');
        }

        $wishlist->save();        
        
        return redirect()->route('product.shop');
        
    }

    public function getAddByOne($id)
    {

        $wishlist = WishList::where('product_id',$id)->first();
        //if(count($user) > 0 || count($subscriber) > 0 ){}

        $wishlist->qty = $wishlist->qty + 1;

        $wishlist->save();   

        return redirect()->route('product.wishlist');
        
    }     

    public function getReduceByOne($id)
    {

        //$product = Product::find($id);

        $wishlist = WishList::where('product_id',$id)->first();
        //dd(count($wishlist));

        if ( $wishlist->qty > 1) {
            $wishlist->qty = $wishlist->qty - 1;
            $wishlist->save(); 
        }else{
            $wishlist = WishList::where('product_id',$id)->delete();
        }

        return redirect()->route('product.wishlist');
        
    }    

    public function getRemoveItem($id)
    {
        $wishlist = WishList::where('product_id',$id)->delete();
        return redirect()->route('product.wishlist');
        
    }


    public function getMovetoCart(Request $request, $id)
    {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        $wishlist = WishList::where('product_id',$id)->delete();
        return redirect()->route('product.wishlist');
        
    }

    public function getMovetoWishList(Request $request, $id)
    {

        $product = Product::find($id);

        $wishlist = WishList::where('product_id',$id)->first();
        //if(count($user) > 0 || count($subscriber) > 0 ){}

        if ($wishlist == null) {
            // Insert on DB
            $wishlist = new WishList;
            if (Auth::check()) {
                // The user is logged in...
                $wishlist->user_id = Auth::user()->id;
            }else{
                // Save user like guess
                $wishlist->user_id = 1;
            } 

            $wishlist->product_id = $product->id;
            $wishlist->qty = 1;
            Session::flash('alert-success', 'Product successfully Added to WishList!');

        }else{
            // Update qty on DB
            $wishlist->qty = $wishlist->qty + 1;
            Session::flash('alert-success', 'Product successfully Updated WishList!');
        }

        $wishlist->save();        
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->reduceByOne($id);

        if ( count($cart->items) > 0) {
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');

        
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
