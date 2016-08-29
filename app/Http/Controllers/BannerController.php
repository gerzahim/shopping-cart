<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Product;
use Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $url = $request->url();

            $products = Product::all();
            $categories = Categories::all();
            $brands = Brand::all();

            $tree='';  
            foreach ($products as $product ) {
                $tree.='<tr>';
                $tree.='<td class="cart_product">';
                if ($product->imagepath == Null) {
                 $tree.='<img height="50px" width="50px" src="images/no-image.jpg"  alt="No Images">';
                } else {
                 $tree.='<img height="50px" width="50px" src="media/'.$product->imagepath.'" alt="No Images">';
                }
                $tree.='</td>';
                $tree.='<td class="cart_description">'.$product->sku.'</td>';
                $tree.='<td class="cart_description">'.$product->title.'</td>';
                $tree.='<td class="cart_description">'.$product->price.'</td>';
                $tree.='<td class="cart_description">'.$product->quantity.'</td>';
               
                $brands = Brand::Find($product->brand_id);
                $brandName = $brands['name'];
                $tree.='<td class="cart_description">'.$brandName.'</td>';
                $categories = Categories::Find($product->categories_id);
                $categoryName = $categories['name'];                
                $tree.='<td class="cart_description">'.$categoryName.'</td>';
                $tree.='<td class="cart_description">';
                $tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$product->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                $tree.='</td>';
                $tree.='<td class="cart_description">';
                $tree.='<a class="cart_quantity_delete" href="'.$url.'/removeProduct/'.$product->id.'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                $tree.='</td>';
                $tree.='</tr>';           
                
            }                             

            // return $tree;
            return view('admin.products', compact('tree'));
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
