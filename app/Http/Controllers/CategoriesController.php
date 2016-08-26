<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Categories;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $categories = Categories::all();
        //dd($categories);
        foreach ($categories as $category) {

            if ($category['imagepath'] == Null) {
                $category['imagepath'] = "no-categories.png";
            }

            if ($category['parentcategory'] == 0) {
                $category['parentcategory'] = "No Parent";
            }else{
                $subcategories = Categories::Find($category['parentcategory']);
                $category['parentcategory'] = $subcategories['name'];
            }
        }


        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();

        foreach ($categories as $category) {

            if ($category['parentcategory'] == 0) {
                $category['parentcategory'] = "No Parent";
            }else{
                $subcategories = Categories::Find($category['parentcategory']);
                $category['parentcategory'] = $subcategories['name'];
            }
        }        

        return view('admin.createcategories', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categories();
        
        $input = $request->all();

        //dd($input); 

        if ($request->hasFile('imagepath') && $request->file('imagepath')->isvalid()){

            $input['imagepath'] = $request->file('imagepath');

            $file=$request->file('imagepath');
            $imgrealpath= $file->getRealPath(); 
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $fullname=$nameonly.'.'.$file->getClientOriginalExtension();


            $fileName = "Cat_".$input['name'].'.'.$file->getClientOriginalExtension();

            $input['imagepath'] = $fileName;
            $fileName = str_replace(' ', '', $fileName);
            //$request->file('photo')->move($destinationPath, $fileName); 
            $request->file('imagepath')->move('media/', $fileName);
        }else{
            $input['imagepath'] = Null;    
        }

        if ($category['parentcategory'] == 1) {
            $category['parentcategory'] = "No Parent";
        }
        
        $category->fill($input)->save();

        Session::flash('message', 'Category successfully created!');
        return redirect()->back();
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
