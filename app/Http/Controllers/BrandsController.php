<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Brand;
use Session;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $url = $request->url();

        $brands = Brand::all();
        $tree='';  
        foreach ($brands as $brand ) {
            $tree.='<tr>';
            $tree.='<td class="cart_product">';
            if ($brand->imagepath == Null) {
             $tree.='<img height="50px" width="50px" src="images/no-image.jpg"  alt="No Images">';
            } else {
             $tree.='<img height="50px" width="50px" src="media/'.$brand->imagepath.'" alt="No Images">';
            }
            $tree.='</td>';
            $tree.='<td class="cart_description">';
            $tree.='<i class="fa fa-circle fa-fw" aria-hidden="true"></i> '.$brand->name;
            $tree.='</td>';
            $tree.='<td class="cart_description">';
            $tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$brand->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            $tree.='</td>';
            $tree.='<td class="cart_description">';
            $tree.='<a class="cart_quantity_delete" href="'.$url.'/removeBrand/'.$brand->id.'"><i class="fa fa-times" aria-hidden="true"></i></a>';
            $tree.='</td>';
            $tree.='</tr>';           
            
        }
        return view('admin.brands', compact('tree'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.createbrands');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        
        $input = $request->all();

        //dd($input); 

        if ($request->hasFile('imagepath') && $request->file('imagepath')->isvalid()){

            $input['imagepath'] = $request->file('imagepath');

            $file=$request->file('imagepath');
            $imgrealpath= $file->getRealPath(); 
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $nameonly = str_replace(' ', '_', $nameonly);            
            $fullname=$nameonly.'.'.$file->getClientOriginalExtension();


            $nameimage = str_replace(' ', '_', $input['name']);  
            $fileName = "Bra_".$nameimage.'.'.$file->getClientOriginalExtension();

            $input['imagepath'] = $fileName;
            $fileName = str_replace(' ', '', $fileName);
            //$request->file('photo')->move($destinationPath, $fileName); 
            $request->file('imagepath')->move('media/', $fileName);
        }else{
            $input['imagepath'] = Null;    
        }
        
        $brand->fill($input)->save();

        Session::flash('message', 'Brand successfully created!');
        return redirect()->route('brands.index');
    }

    public function getRemoveBrand($id)
    {
        $brand = new Brand();
        $brand->find($id)->delete();
        return redirect()->route('brands.index');
        
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
        //$categories = new Categories();
        //$category = new Categories();   
        $brand = Brand::find($id);   

        return view('admin.editbrands', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){


        $brand = Brand::find($id);
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

                $nameimage = str_replace(' ', '_', $input['name']);  
                $fileName = "Bra_".$nameimage.'.'.$file->getClientOriginalExtension();

                $input['imagepath'] = $fileName;
                $fileName = str_replace(' ', '', $fileName);
                //$request->file('photo')->move($destinationPath, $fileName); 
                $request->file('imagepath')->move('media/', $fileName);
            }else{
                //$input['imagepath'] = Null; 
                $input['imagepath'] = $brand->imagepath;    
                
            }         

        }else{
            $input['imagepath'] = $brand->imagepath;   

        }        


        $brand->fill($input)->save();  

        Session::flash('message', 'Brand successfully Updated!');
        return redirect()->route('brands.index');

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
