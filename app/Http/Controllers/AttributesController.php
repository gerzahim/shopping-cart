<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Attributes;
use ShopCart\AttributesValues;
use Session;


class AttributesController extends Controller
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
        return view('admin.attributes', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.createattributes');
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
        $attributes = new Attributes();
        
        $input = $request->all();

        $attributes->fill($input)->save();

        Session::flash('message', 'Attribute successfully created!');
        return redirect()->route('attributes.index');
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
        $attributesvalues = AttributesValues::where('attributes_id', '=', $id)->get();

        $attribute = Attributes::find($id);   

        return view('admin.editattributes', ['attributesvalues' => $attributesvalues, 'attribute' => $attribute]);
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
        $attribute = Attributes::find($id);
        
        $input = $request->all();

        $attribute->fill($input)->save();

        Session::flash('message', 'Attribute successfully updated!');
        return redirect()->route('attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributes = new Attributes();
        $attributes->find($id)->delete();
        Session::flash('message', 'Attribute successfully Deleted!');
        return redirect()->route('attributes.index');
    }

    public function createValue($id)
    {
        $attribute = Attributes::find($id);          
        return view('admin.createattributesvalue', ['attribute' => $attribute]);
    }


    public function storeValue(Request $request, $id)
    {

        $attributesvalues = new AttributesValues();
        $input = $request->all();

        $input['attributes_id'] = $id;

        $attributesvalues->fill($input)->save();


        Session::flash('message', 'Attribute Value Successfully Created!');

        
        $attributesvalues = AttributesValues::where('attributes_id', '=', $id)->get();

        $attribute = Attributes::find($id);   

        return view('admin.editattributes', ['attributesvalues' => $attributesvalues, 'attribute' => $attribute]);
    }

    public function editValue($id, $idv)
    {
        $attribute = Attributes::find($id); 
        $attributesvalues = AttributesValues::find($idv);

        return view('admin.editattributesvalue', ['attributesvalues' => $attributesvalues, 'attribute' => $attribute]);
    }

    public function updateValue(Request $request, $id, $idv)
    {

        $attributesvalues = new AttributesValues();
        $input = $request->all();
        $input['attributes_id'] = $id;

        $attributesvalues->fill($input)->save();


        Session::flash('message', 'Attribute Value Successfully Updated!');
        $attributesvalues = AttributesValues::where('attributes_id', '=', $id)->get();
        $attribute = Attributes::find($id);   
        return view('admin.editattributes', ['attributesvalues' => $attributesvalues, 'attribute' => $attribute]);
    }    


    public function destroyValue($id, $idv)
    {
        $attributes = new AttributesValues();
        $attributes->find($idv)->delete();
        Session::flash('message', 'Attribute successfully Deleted!');

        $attributesvalues = AttributesValues::where('attributes_id', '=', $id)->get();
        $attribute = Attributes::find($id);   
        return view('admin.editattributes', ['attributesvalues' => $attributesvalues, 'attribute' => $attribute]);
    }    


}
