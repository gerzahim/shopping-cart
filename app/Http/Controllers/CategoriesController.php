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
    public function index(Request $request){

            $url = $request->url();
            //dd($url);

            $Categorys = Categories::where('parent_id', '=', 0)->get();
            //dd($Categorys);
                 $tree='';
                 $flag=0;
            foreach ($Categorys as $Category) {
                 //$tree .= $Category->name;
                if ($flag = 0) {
                    $flag =1;

                }else{

                     $tree.='<tr>';
                     $tree.='<td class="cart_product">';
                     if ($Category->imagepath == Null) {
                         $tree.='<img height="50px" width="50px" src="images/no-image.jpg"  alt="No Images">';
                     } else {
                         $tree.='<img height="50px" width="50px" src="media/'.$Category->imagepath.'" alt="No Images">';
                     }
                     $tree.='</td>';
                     $tree.='<td class="cart_description">';
                     $tree.='<i class="fa fa-circle fa-fw" aria-hidden="true"></i> '.$Category->name;
                     $tree.='</td>';
                     $tree.='<td class="cart_description">';
                     $tree.='<p>'.$Category->description.'</p>';
                     $tree.='</td>';
                     $tree.='<td class="cart_description">';
                    if ($Category->parent_id == 0) {
                        $Category_id = "No Parent";
                    }else{
                        $subcategories = Categories::Find($Category->parent_id);
                        $Category_id = $subcategories['name'];
                    }                     

                     $tree.='<p>'.$Category_id.'</p>';
                     $tree.='</td>';
                     $tree.='<td class="cart_description">';
                     $tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$Category->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                     $tree.='</td>';
                     $tree.='<td class="cart_description">';
                     $tree.='<a class="cart_quantity_delete" href="'.$url.'/removeCategory/'.$Category->id.'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                     $tree.='</td>';
                     $tree.='</tr>';

                     if(count($Category->childs)) {
                        $tree .=$this->childView($Category, $url);
                    }

                }
            }
                             

            // return $tree;
            return view('admin.categories', compact('tree'));
            
    }


    public function childView($Category, $url){ 

        $html ='';
        foreach ($Category->childs as $arr) {
            if(count($arr->childs)){

                     $html.='<tr>';
                     $html.='<td class="cart_product">';
                     if ($arr->imagepath == Null) {
                         $html.='<img height="50px" width="50px" src="media/no-image.jpg"  alt="No Images">';
                     } else {
                         $html.='<img height="50px" width="50px" src="media/'.$arr->imagepath.'" alt="No Images">';
                     }                     
                     $html.='</td>';
                     $html.='<td class="cart_description2">';
                     $html.='&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-minus fa-fw" aria-hidden="true"></i> '.$arr->name;
                     $html.='</td>';
                     $html.='<td class="cart_description">';
                     $html.='<p>'.$arr->description.'</p>';
                     $html.='</td>';
                     $html.='<td class="cart_description">';
                    if ($arr->parent_id == 0) {
                        $arr = "No Parent";
                    }else{
                        $subcategoriess = Categories::Find($arr->parent_id);
                        $Category_ids = $subcategoriess['name'];
                    }                     
                     $html.='<p>'.$Category_ids.'</p>';
                     $html.='</td>';
                     $html.='<td class="cart_description">';
                     $html.='<a class="cart_quantity_delete" href="'.$url.'/'.$arr->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                     $tree.='</td>';
                     $html.='<td class="cart_description">';
                     $html.='<a class="cart_quantity_delete" href="'.$url.'/removeCategory/'.$arr->id.'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                     $html.='</td>';
                     $html.='</tr>';                   
                    $html.= $this->childView($arr, $url);
                }else{
                     $html.='<tr>';
                     $html.='<td class="cart_product">';
                     if ($arr->imagepath == Null) {
                         $html.='<img height="50px" width="50px" src="media/no-image.jpg"  alt="No Images">';
                     } else {
                         $html.='<img height="50px" width="50px" src="media/'.$arr->imagepath.'" alt="No Images">';
                     }  
                     $html.='</td>';
                     $html.='<td class="cart_description2">';
                     $html.='&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-minus fa-fw" aria-hidden="true"></i> '.$arr->name;
                     $html.='</td>';
                     $html.='<td class="cart_description">';
                     $html.='<p>'.$arr->description.'</p>';
                     $html.='</td>';
                     $html.='<td class="cart_description">';
                    if ($arr->parent_id == 0) {
                        $arr = "No Parent";
                    }else{
                        $subcategoriess = Categories::Find($arr->parent_id);
                        $Category_ids = $subcategoriess['name'];
                    }                     
                     $html.='<p>'.$Category_ids.'</p>';
                     $html.='</td>';
                     $html.='<td class="cart_description">';
                     $html.='<a class="cart_quantity_delete" href="'.$url.'/'.$arr->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                     $html.='</td>';
                     $html.='<td class="cart_description">';
                     $html.='<a class="cart_quantity_delete" href="'.$url.'/removeCategory/'.$arr->id.'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                     $html.='</td>';
                     $html.='</tr>'; 
                }
                               
        }
        return $html;
    }   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();   

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
            $nameonly = str_replace(' ', '_', $nameonly);            
            $fullname=$nameonly.'.'.$file->getClientOriginalExtension();


            $nameimage = str_replace(' ', '_', $input['name']);  
            $fileName = "Cat_".$nameimage.'.'.$file->getClientOriginalExtension();

            $input['imagepath'] = $fileName;
            $fileName = str_replace(' ', '', $fileName);
            //$request->file('photo')->move($destinationPath, $fileName); 
            $request->file('imagepath')->move('media/', $fileName);
        }else{
            $input['imagepath'] = Null;    
        }
        
        $category->fill($input)->save();

        Session::flash('message', 'Category successfully created!');
        return redirect()->route('categories.index');
    }



    public function getRemoveCategory($id)
    {
        $category = new Categories();

        $category->find($id)->delete();

        return redirect()->route('categories.index');
        
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

        $categories = Categories::all();   
        $category = Categories::find($id);   

        return view('admin.editcategories', compact('categories'), ['category' => $category]);
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

        $category = Categories::find($id);
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
                $fileName = "Cat_".$nameimage.'.'.$file->getClientOriginalExtension();

                $input['imagepath'] = $fileName;
                $fileName = str_replace(' ', '', $fileName);
                //$request->file('photo')->move($destinationPath, $fileName); 
                $request->file('imagepath')->move('media/', $fileName);
            }else{
                //$input['imagepath'] = Null; 
                $input['imagepath'] = $category->imagepath;    
                
            }         

        }else{
            $input['imagepath'] = $category->imagepath;   

        }         


        $category->fill($input)->save();  

        Session::flash('message', 'Category successfully Updated!');
        return redirect()->route('categories.index');


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
