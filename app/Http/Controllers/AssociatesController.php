<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Product;
use ShopCart\Attributes;
use ShopCart\AttributesValues;
use ShopCart\ProductAttributeValues;
use ShopCart\AssociatesAttributes;
use ShopCart\AssociateProductsAttributes;
use Session;


class AssociatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attributes = Attributes::all();

        $listattributes = array();

        foreach ($attributes as $attribute) {
            # code...
            
            $listattributes[$attribute->id] = $attribute->name;
            //dd($listattributes);
        }

        //dd($listattributes);

        $associates = AssociatesAttributes::all();
        return view('admin.associates', compact('associates', 'listattributes'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $attributes = Attributes::all();

        return view('admin.createassociates', ['attributes' => $attributes]);        
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
        $associates = new AssociatesAttributes();
        
        $input = $request->all();

        $associates->fill($input)->save();

        Session::flash('message', 'Associates successfully created!');
        return redirect()->route('associates.index');        
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
        $AssociatesProducts = AssociateProductsAttributes::where('associates_id', '=', $id)->get();


        $attributes = Attributes::all();

        $assoattribute = AssociatesAttributes::find($id);

        $products = Product::all();
        $skuproduct = array();
        $titleproduct = array();
        foreach ($products as $product) {
            # code...
            $skuproduct[$product->id] = $product->sku;
            $titleproduct[$product->id] = $product->title;
        }

        $attributesvalues = AttributesValues::all();
        $listattributesv = array();
        foreach ($attributesvalues as $attributev) {
            # code...
            $listattributesv[$attributev->id] = $attributev->att_value;
        }


        $assoproducts = ProductAttributeValues::all();
        $listassoproducts_pid = array();
        $listassoproducts_aid = array();
        foreach ($assoproducts as $assoproduct) {
            # code...
            $listassoproducts_pid[$assoproduct->id] = $assoproduct->product_id;
            $listassoproducts_aid[$assoproduct->id] = $assoproduct->attributes_values_id;
        }

        return view('admin.editassociates', [
            'AssociatesProducts' => $AssociatesProducts, 
            'attributes' => $attributes, 
            'assoattribute' => $assoattribute, 
            'skuproduct' => $skuproduct, 
            'titleproduct' => $titleproduct, 
            'listattributesv' => $listattributesv,
            'listassoproducts_pid' => $listassoproducts_pid,
            'listassoproducts_aid' => $listassoproducts_aid,
            'associate_id' => $id
            ]);        
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
        $assoattribute = AssociatesAttributes::find($id);
        
        $input = $request->all();

        $assoattribute->fill($input)->save();

        Session::flash('message', 'Associate successfully updated!');
        return redirect()->route('associates.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assoattribute = new AssociatesAttributes();
        $assoattribute->find($id)->delete();
        Session::flash('message', 'Associate successfully Deleted!');
        return redirect()->route('associates.index');
    }

    public function addProduct($id)
    {
        $products = Product::all();
        $skuproduct = array();
        $titleproduct = array();
        foreach ($products as $product) {
            # code...
            $skuproduct[$product->id] = $product->sku;
            $titleproduct[$product->id] = $product->title;
        }

        $attributesvalues = AttributesValues::all();
        $listattributesv = array();
        foreach ($attributesvalues as $attributev) {
            # code...
            $listattributesv[$attributev->id] = $attributev->att_value;
        }


        $assoproducts = ProductAttributeValues::all();

        //$assoproducts = AssociateProductsAttributes::find($id);          
        return view('admin.addassociateproduct', [
            'assoproducts' => $assoproducts, 
            'skuproduct' => $skuproduct, 
            'titleproduct' => $titleproduct, 
            'listattributesv' => $listattributesv,
            'id' => $id
            ]);
    }



    public function storeProductAssociate(Request $request, $id)
    {

        $AssociatesProducts = new AssociateProductsAttributes();
        $input = $request->all();

        $attributesvalues = AssociateProductsAttributes::where('associates_id', '=', $input['associates_attributes_id'])->where('products_attributes_id', '=', $input['product_attributes_values_id'])->get();
        //$input['associates_attributes_id'] = 
        if (count($attributesvalues) > 0) {
            # code...
            Session::flash('alert-danger', 'Product Associated Already Exist!');
            return redirect()->route('associates.edit', $id);            
        }       

        $input['associates_id']= $input['associates_attributes_id'];
        $input['products_attributes_id']= $input['product_attributes_values_id'];

        //dd($input);


        $AssociatesProducts->fill($input)->save();


        Session::flash('alert-success', 'Product Successfully Associated!');
        return redirect()->route('associates.edit', $id);
    }


    public function destroyProductAssociate($id, $idv)
    {
        $AssociatesProducts = new AssociateProductsAttributes();
        $AssociatesProducts->find($id)->delete();
        Session::flash('message', 'Associate Product  Deleted!');

        return redirect()->route('associates.edit', $idv);
    }         


}
