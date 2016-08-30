<?php

namespace ShopCart\Http\Controllers;

use ShopCart\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use ShopCart\Banner;
use ShopCart\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        return view('master');

    }

    public function getIndex()
    {

        // Get info for Banner Section
        $banners = Banner::all();

        // Get info for Content Section Shop
        $products = Product::all();        

        //dd($banners);
        return view('shop.home', ['products' => $products], ['banners' => $banners]);
    }

}
