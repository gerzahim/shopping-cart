<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Cart;
use ShopCart\Product;
use ShopCart\Order;
use ShopCart\Categories;
use ShopCart\Brand;
use ShopCart\User;
use ShopCart\Settings;


class SettingController extends Controller
{
    public function getSetting(){
        
        // Get info for Banner Section

        //$setting = Settings::all();
        //$setting = Settings::find('1');
        $id=1;
        $setting = Settings::find($id);

        //$setting = Settings::where('id', 1)->last();
        //dd($setting->title_site);

        //return $setting->title_site;
        return compact('setting');
    }

    public function editSetting($id)
    {

        $id=1;
        $setting = Settings::find($id);

        //return view('admin.editproducts', ['product' => $product], compact('categories'), compact('brands'));
        return view('admin.editsettings', compact('id', 'setting'));
    }  

    public function updateSetting(Request $request, $id)
    {

        dd("HOLAA");
        $id=1;
        $setting = Settings::find($id);

        //return view('admin.editproducts', ['product' => $product], compact('categories'), compact('brands'));
        return redirect()->back();
    }          
}



