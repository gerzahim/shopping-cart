<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Banner;
use Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $url = $request->url();

            $banners = Banner::all();

            $tree='';  
            foreach ($banners as $banner ) {
                $tree.='<tr>';
                $tree.='<td class="cart_product">';
                if ($banner->imagepath == Null or $banner->imagepath == "") {
                 $tree.='<img height="50px" width="50px" src="images/no-image.jpg"  alt="No Images">';
                } else {
                    if ($banner->typeofbanner == "1") {
                        $tree.='<img height="50px" width="100px" src="media/'.$banner->imagepath.'" alt="No Images">';
                    }else{
                        $tree.='<img height="50px" width="50px" src="media/'.$banner->imagepath.'" alt="No Images">';
                    }                 
                }
                $tree.='</td>';             
                $tree.='<td class="cart_description">'.$banner->title.'</td>';
                $tree.='<td class="cart_description">';
                if ($banner->typeofbanner == 0) {
                 $tree.='Text and Images';
                } else {
                 $tree.='Large Image';
                }
                $tree.='</td>';                   
                $tree.='<td class="cart_description">';
                $tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$banner->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                $tree.='</td>';
                $tree.='</tr>';           
                
            }                             

            // return $tree;
            return view('admin.banners', compact('tree'));
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
        $banner = Banner::find($id);   
        return view('admin.editbanners', ['banner' => $banner]);
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
        $banner = Banner::find($id);

        $input = $request->all();

        // If Checked for Change Image
        if ($request->cbox1 == '1') {
            
            // Validate File Ok
            if ($request->hasFile('imagepath') && $request->file('imagepath')->isvalid()){

            $input['imagepath'] = $request->file('imagepath');

            $file=$request->file('imagepath');
            $imgrealpath= $file->getRealPath(); 
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $nameonly = str_replace(' ', '_', $nameonly);            
            $fullname=$nameonly.'.'.$file->getClientOriginalExtension();

            $nameimage = str_replace(' ', '_', $id);  
            $fileName = "Ban_".$nameimage.'.'.$file->getClientOriginalExtension();

            $input['imagepath'] = $fileName;
            $fileName = str_replace(' ', '', $fileName);
            //$request->file('photo')->move($destinationPath, $fileName); 
            $request->file('imagepath')->move('media/', $fileName);
            }else{
                //$input['imagepath'] = Null; 
                $input['imagepath'] = $banner->imagepath;    
                
            }         

        }else{
            $input['imagepath'] = $banner->imagepath;   

        }


        // If Checked for Change Image
        if ($request->cbox2 == '1') {
            if ($request->hasFile('imagepath_price') && $request->file('imagepath_price')->isvalid()){

                $input['imagepath_price'] = $request->file('imagepath_price');

                $file=$request->file('imagepath_price');
                $imgrealpath= $file->getRealPath(); 
                $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
                $nameonly = str_replace(' ', '_', $nameonly);            
                $fullname=$nameonly.'.'.$file->getClientOriginalExtension();

                $nameimage = str_replace(' ', '_', $id);  
                $fileName = "Banp_".$nameimage.'.'.$file->getClientOriginalExtension();

                $input['imagepath_price'] = $fileName;
                $fileName = str_replace(' ', '', $fileName);
                //$request->file('photo')->move($destinationPath, $fileName); 
                $request->file('imagepath_price')->move('media/', $fileName);
            }else{
                $input['imagepath_price'] = Null;   
                //$input['imagepath_price'] = $banner->imagepath_price;     
            }             

        }else{
            $input['imagepath_price'] = $banner->imagepath_price; 
        }


      

        $banner->fill($input)->save();  

        Session::flash('message', 'Banners successfully Updated!');
        return redirect()->route('banners.index');

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
