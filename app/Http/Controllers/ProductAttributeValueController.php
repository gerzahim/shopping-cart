<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\ProductAttributeValues;
use ShopCart\AttributesValues;
use ShopCart\Attributes;
use ShopCart\Product;
use Session;



class ProductAttributeValueController extends Controller
{
    public function showProductAttribute(Request $request, $id)
    {
        //DD("HOLAA");
        $attributesproducts = ProductAttributeValues::where('product_id', '=', $id)->get();

        $attributesvalues = AttributesValues::all();
        $attributeId = array();
        foreach ($attributesvalues as $attributesvalue) {
            # code...
            $attributeId[$attributesvalue->id] = $attributesvalue->attributes_id;
        }


        $attributes = Attributes::all();
        $attributeName = array();
        foreach ($attributes as $attribute) {
            # code...
            $attributeName[$attribute->id] = $attribute->name;
        }

        //dd($attributeName);

        return view('admin.attributesproducts', ['attributesproducts' => $attributesproducts, 'id' => $id, 'attributeName' => $attributeName, 'attributeId' => $attributeId]);

    }


    public function selectProductAttribute(Request $request, $id)
    {
        //$imgproduct = ProductAttributeValues::find($id);
        //dd($imgproduct);
        $attributes = Attributes::all();


        //$product = Product::find($imgproduct->product_id);
        $product = Product::find($id);

        return view('admin.selectproductattributes', ['id' => $id, 'attributes' => $attributes, 'product_id' => $product->id]);

    }  

    public function addProductAttribute(Request $request, $id)
    {

        $input = $request->all();

        //DD($input);


        //$imgproduct = ProductAttributeValues::find($id);
        //dd($imgproduct);
        $attributes = AttributesValues::where('attributes_id', '=', $input['attributes_id'])->get();

        //$product = Product::find($imgproduct->product_id);
        $product = Product::find($id);

        return view('admin.addproductattributes', ['id' => $id, 'attributes' => $attributes, 'product_id' => $product->id]);

    }    


    public function storeProductAttribute(Request $request, $id)
    {

        $attributes = new AttributesValues();

        $input = $request->all();


        $input['imagepath1'] = Null;  


        $imgproduct->fill($input)->save(); 
     

        Session::flash('message', 'Image on Gallery No Added!');
        return redirect()->back();
        //return redirect('editgallery', ['id' => $input['product_id']]);


    } 






}
