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
        $attributeValueName= array();
        foreach ($attributesvalues as $attributesvalue) {
            # code...
            $attributeId[$attributesvalue->id] = $attributesvalue->attributes_id;
            $attributeValueName[$attributesvalue->id] = $attributesvalue->att_value;
        }


        $attributes = Attributes::all();
        $attributeName = array();
        foreach ($attributes as $attribute) {
            # code...
            $attributeName[$attribute->id] = $attribute->name;
        }

        //dd($attributeName);
        return view('admin.attributesproducts', ['attributesproducts' => $attributesproducts, 'id' => $id, 'attributeName' => $attributeName, 'attributeId' => $attributeId, 'attributeValueName' => $attributeValueName]);

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


 
        $productAttributeValues = new ProductAttributeValues();
        $input = $request->all();

        //product_id , attributes_values_id



            //Get List attributes from Id Products
            $prodattributes = ProductAttributeValues::where('product_id', '=', $input['product_id'])->get();            
            if (count($prodattributes) > 0) {

                //Ask if there is one exacly 
                $attributes = ProductAttributeValues::where('product_id', '=', $input['product_id'])->where('attributes_values_id', '=', $input['attributes_values_id'])->count(); 

                // If Exits already dont save
                if($attributes > 0){
                    Session::flash('alert-danger', 'Product Attribute already Exists!');
                    return redirect()->route('showattributeproduct', ['id' => $id]);   
                }else{

                    // Get attribute id from input
                    $attributegiveit = AttributesValues::where('id', '=', $input['attributes_values_id'] )->first(); 

                    $mainattribute = $attributegiveit->attributes_id;


                    //Get All the Attributeid with that id_product
                    $listattributes = array();
                    foreach ($prodattributes as $prodattribute) {
                        # code...
                        //$AttributesValues = AttributesValues::where('attributes_id', '=', $prodattribute->attributes_values_id  )->first();

                        $AttributesValues = AttributesValues::where('id', '=', $prodattribute->attributes_values_id )->first();
                        //dd($AttributesValues->attributes_id);
                        $listattributes[] =  $AttributesValues->attributes_id;
                    }
                    //dd($listattributes); // 1 Color , 2 Size

                    // If Exits the same attribute dont save
                    if (in_array($mainattribute, $listattributes)) {
                        # code...
                        Session::flash('alert-danger', 'Only One Value for each Attribute!');
                        return redirect()->route('showattributeproduct', ['id' => $id]);    

                    } else {
                        # code...
                        try {
                            $productAttributeValues->fill($input)->save();
                            Session::flash('message', 'Product Attribute successfully Added!');
                            return redirect()->route('showattributeproduct', ['id' => $id]);                                 
                            
                        } catch(\Exception $e){
                            return redirect()->back()->with('error', $e->getMessage());
                        }

                    }


                }



            }else{
                # There is not Attributes for this product
                try {
                    $productAttributeValues->fill($input)->save();   
                    Session::flash('message', 'Product Attribute successfully Added!');
                    return redirect()->route('showattributeproduct', ['id' => $id]);                      
                    
                } catch(\Exception $e){
                    return redirect()->back()->with('error', $e->getMessage());
                } 


            }

    } 



    public function deleteProductAttribute($id, $product_id)
    {
        
        $productAttributeValues = ProductAttributeValues::find($id);

        $productAttributeValues->delete();
        
        Session::flash('message', 'Product Attribute Deleted!');

        return redirect()->route('showattributeproduct', ['id' => $product_id]);

        
    }   





}
