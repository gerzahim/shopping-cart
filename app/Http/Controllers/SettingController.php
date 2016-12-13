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
use Session;
use Auth;


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

    public function editBannerSetting($id)
    {

        $id=1;
        $setting = Settings::find($id);

        //return view('admin.editproducts', ['product' => $product], compact('categories'), compact('brands'));
        return view('admin.editsetting_banner', compact('id', 'setting'));
    }


    public function nullIfBlank($field)
    {
        return trim($field) !== '' ? $field : null;
    }


    public function ignoreIfBlank($input, $setting){

        //$tree =$this->nullIfBlank($cat_);

        $verga=  key($input);

        dd($verga);

        if ($input == '') {
            // if field coming empty asign the same value from DB
            $input = $setting->name;
        }else{

        }

        return $input;
    }
    public function updateBannerSetting(Request $request, $id){

            $id=1;
            $setting = Settings::find($id);

            $input = $request->all();

            // If Checked for Change Image for Logo Home
            if ($request->cbox1 == '1') {
                
                // Validate File Ok
                if ($request->hasFile('bansidepath') && $request->file('bansidepath')->isvalid()){

                    $input['bansidepath'] = $request->file('bansidepath');

                    $file=$request->file('bansidepath');
                    $imgrealpath= $file->getRealPath(); 
                    $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
                    $nameonly = str_replace(' ', '_', $nameonly);            
                    $fileName=$nameonly.'.'.$file->getClientOriginalExtension();

                    //$fileName = $input['sku'].'.'.$file->getClientOriginalExtension();

                    $input['bansidepath'] = $fileName;

                    //$request->file('photo')->move($destinationPath, $fileName); 
                    $request->file('bansidepath')->move('media/', $fileName);
                }else{
                    //$input['imagepath'] = Null; 
                    $input['bansidepath'] = $setting->bansidepath;    
                    
                }         

            }else{
                $input['bansidepath'] = $setting->bansidepath;   

            }
            $setting->fill($input)->save(); 

            Session::flash('message', 'Sidebar Banner successfully Updated!');
            return redirect()->route('banners.index');            

    }      







    public function updateSetting(Request $request, $id)
    {

        $id=1;
        $setting = Settings::find($id);

        $input = $request->all();

        if($input['quick_cat_id1'] == '' || $input['quick_cat_id1'] == 0){
            $input['quick_cat_id1'] = $setting->quick_cat_id1;
        }else{
            $category = Categories::find($input['quick_cat_id1']);
            //$input['quick_cat_name1']= $category->name;
            if ($category == null) {
                # code...
                $input['quick_cat_name1']= "Not Valid";
            } else {
                # code...
                $input['quick_cat_name1']= $category->name; 
            }     
        }

        if($input['quick_cat_id2'] == '' || $input['quick_cat_id2'] == 0){
            $input['quick_cat_id2'] = $setting->quick_cat_id2;
        }else{
            $category = Categories::find($input['quick_cat_id2']);
            //$input['quick_cat_name2']= $category->name; 
            if ($category == null) {
                # code...
                $input['quick_cat_name2']= "Not Valid";
            } else {
                # code...
                $input['quick_cat_name2']= $category->name; 
            }               
        }
                
        if($input['quick_cat_id3'] == '' || $input['quick_cat_id3'] == 0){
            $input['quick_cat_id3'] = $setting->quick_cat_id3;
        }else{
            $category = Categories::find($input['quick_cat_id3']);
            //$input['quick_cat_name3']= $category->name;
            if ($category == null) {
                # code...
                $input['quick_cat_name3']= "Not Valid";
            } else {
                # code...
                $input['quick_cat_name3']= $category->name; 
            }                
        }


        if($input['quick_cat_id4'] == '' || $input['quick_cat_id4'] == 0){
            $input['quick_cat_id4'] = $setting->quick_cat_id4;
        }else{
            $category = Categories::find($input['quick_cat_id4']);
           // $input['quick_cat_name4']= $category->name;
            if ($category == null) {
                # code...
                $input['quick_cat_name4']= "Not Valid";
            } else {
                # code...
                $input['quick_cat_name4']= $category->name; 
            }                
        }

        if($input['quick_cat_id5'] == '' || $input['quick_cat_id5'] == 0){
            $input['quick_cat_id5'] = $setting->quick_cat_id5;
        }else{
            $category = Categories::find($input['quick_cat_id5']);
            //$input['quick_cat_name5']= $category->name; 
            if ($category == null) {
                # code...
                $input['quick_cat_name5']= "Not Valid";
            } else {
                # code...
                $input['quick_cat_name5']= $category->name; 
            }               
        }


        // If Checked for Change Image for Logo Home
        if ($request->cbox1 == '1') {
            
            // Validate File Ok
            if ($request->hasFile('logo_home') && $request->file('logo_home')->isvalid()){

                $input['logo_home'] = $request->file('logo_home');

                $file=$request->file('logo_home');
                $imgrealpath= $file->getRealPath(); 
                $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
                $nameonly = str_replace(' ', '_', $nameonly);            
                $fileName=$nameonly.'.'.$file->getClientOriginalExtension();

                //$fileName = $input['sku'].'.'.$file->getClientOriginalExtension();

                $input['logo_home'] = $fileName;

                //$request->file('photo')->move($destinationPath, $fileName); 
                $request->file('logo_home')->move('images/', $fileName);
            }else{
                //$input['imagepath'] = Null; 
                $input['logo_home'] = $setting->logo_home;    
                
            }         

        }else{
            $input['logo_home'] = $setting->logo_home;   

        }

        // If Checked for Change Image for Lema Home
        if ($request->cbox2 == '1') {
            
            // Validate File Ok
            if ($request->hasFile('lema_home') && $request->file('lema_home')->isvalid()){

                $input['lema_home'] = $request->file('lema_home');

                $file=$request->file('lema_home');
                $imgrealpath= $file->getRealPath(); 
                $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
                $nameonly = str_replace(' ', '_', $nameonly);            
                $fileName=$nameonly.'.'.$file->getClientOriginalExtension();


                //$fileName = $input['sku'].'.'.$file->getClientOriginalExtension();

                $input['lema_home'] = $fileName;

                //$request->file('photo')->move($destinationPath, $fileName); 
                $request->file('lema_home')->move('images/', $fileName);
            }else{
                //$input['imagepath'] = Null; 
                $input['lema_home'] = $setting->lema_home;    
                
            }         

        }else{
            $input['lema_home'] = $setting->lema_home;   

        } 

        // If Checked for Change Image for Logo Admin
        if ($request->cbox3 == '1') {
            
            // Validate File Ok
            if ($request->hasFile('logo_admin') && $request->file('logo_admin')->isvalid()){

                $input['logo_admin'] = $request->file('logo_admin');

                $file=$request->file('logo_admin');
                $imgrealpath= $file->getRealPath(); 
                $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
                $nameonly = str_replace(' ', '_', $nameonly);            
                $fileName=$nameonly.'.'.$file->getClientOriginalExtension();


                //$fileName = $input['sku'].'.'.$file->getClientOriginalExtension();

                $input['logo_admin'] = $fileName;

                //$request->file('photo')->move($destinationPath, $fileName); 
                $request->file('logo_admin')->move('images/', $fileName);
            }else{
                //$input['imagepath'] = Null; 
                $input['logo_admin'] = $setting->logo_admin;    
                
            }         

        }else{
            $input['logo_admin'] = $setting->logo_admin;   

        }                         

        $setting->fill($input)->save(); 

        Session::flash('message', 'Settings successfully Updated!');
        return redirect()->route('settings.edit', array('id' => $id));
    }          
}




