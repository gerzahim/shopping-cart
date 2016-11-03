<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Product;
use ShopCart\Settings;
use ShopCart\ImagesProduct;
use Session;
use Auth;


class ImagesProductController extends Controller
{

    public function editGallery(Request $request, $id)
    {
        $imgproducts = ImagesProduct::where('product_id', '=', $id)->get();

        return view('admin.imagesproducts', ['imgproducts' => $imgproducts, 'id' => $id]);

    }

    public function addImgGallery(Request $request, $id)
    {
        $imgproduct = ImagesProduct::find($id);
        //dd($imgproduct);

        //$product = Product::find($imgproduct->product_id);
        $product = Product::find($id);

        return view('admin.addimagesproducts', ['imgproduct' => $imgproduct, 'id' => $id, 'sku' => $product->sku, 'product_id' => $product->id]);

    }

    public function imagesEdit(Request $request, $id)
    {
      
        $imgproduct = ImagesProduct::find($id);

        //dd($imgproduct->product_id);

        $product = Product::find($imgproduct->product_id);
        //dd($product->sku);

        return view('admin.editimagesproducts', ['imgproduct' => $imgproduct, 'id' => $id, 'sku' => $product->sku, 'product_id' => $product->id]);

    }    

    public function updateGallery(Request $request, $id)
    {

        $imgproduct = ImagesProduct::find($id);

        $input = $request->all();
        $input['sku'] = strtoupper($input['sku']);

        // If Checked for Change Image
        if ($request->cbox2 == '1') {


            
            // Validate File Ok
            if ($request->hasFile('imagepath1') && $request->file('imagepath1')->isvalid()){


            $input['imagepath1'] = $request->file('imagepath1');

            $file=$request->file('imagepath1');
            $imgrealpath= $file->getRealPath(); 
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $nameonly = str_replace(' ', '_', $nameonly);            
            $fullname=$nameonly.'.'.$file->getClientOriginalExtension();

            $fileName = $input['sku'].'_'.$id.'.'.$file->getClientOriginalExtension();
            $input['imagepath1'] = $fileName; 
            //dd($fileName);           

            //$request->file('photo')->move($destinationPath, $fileName); 
            $request->file('imagepath1')->move('media/', $fileName);
            }else{
                //$input['imagepath'] = Null; 
                $input['imagepath1'] = $imgproduct->imagepath1;    
                
            }         

        }else{
            $input['imagepath1'] = $imgproduct->imagepath1;   

        }
      

        $imgproduct->fill($input)->save();  

        Session::flash('message', 'Image on Gallery successfully Updated!');

		$imgproducts = ImagesProduct::where('product_id', '=', $input['product_id'])->get();
        return view('admin.imagesproducts', ['imgproducts' => $imgproducts, 'id' => $id]); 
        //return redirect('editgallery', ['id' => $input['product_id']]);


    }

    public function storeGallery(Request $request, $id)
    {

        $imgproduct = new ImagesProduct();

        $input = $request->all();
        $input['sku'] = strtoupper($input['sku']);

         if ($request->hasFile('imagepath1') && $request->file('imagepath1')->isvalid()){

            $input['imagepath1'] = $request->file('imagepath1');

            $file=$request->file('imagepath1');
            $imgrealpath= $file->getRealPath(); 
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $nameonly = str_replace(' ', '_', $nameonly);            
            $fullname=$nameonly.'.'.$file->getClientOriginalExtension();


            try {
                $lastInsertId = ImagesProduct::orderBy('id', 'desc')->first();
                $lastInsertId = $lastInsertId->id+1;    
                
            } catch(\Exception $e){
                $lastInsertId = 1;
            }

            //$lastInsertId = $lastInsertId->id+1;            

            $fileName = $input['sku'].'_'.$lastInsertId.'.'.$file->getClientOriginalExtension();

            $input['imagepath1'] = $fileName;


            //$request->file('photo')->move($destinationPath, $fileName); 
            $request->file('imagepath1')->move('media/', $fileName);	        

	        $imgproduct->fill($input)->save();  

	        Session::flash('message', 'Image on Gallery successfully Added!');
       
   			$imgproducts = ImagesProduct::where('product_id', '=', $input['product_id'])->get();
	        return view('admin.imagesproducts', ['imgproducts' => $imgproducts, 'id' => $id]);          

        }else{
            $input['imagepath1'] = Null;    
        }
     

        Session::flash('message', 'Image on Gallery No Added!');
        return redirect()->back();
        //return redirect('editgallery', ['id' => $input['product_id']]);


    }    

    public function imagesDelete($id)
    {
        
        $imgproduct = ImagesProduct::find($id);

        //dd($imgproduct);
        
		try { 
		    unlink('media/'.$imgproduct->imagepath1);
		} catch(Exception $e) { 
		    //print "whoops!"; 
		}        
        
        $imgproduct->delete();
		
        Session::flash('message', 'Image on Gallery Deleted!');
        //return redirect()->back();
        $imgproducts = ImagesProduct::where('product_id', '=', $imgproduct->product_id)->get();
        return view('admin.imagesproducts', ['imgproducts' => $imgproducts, 'id' => $imgproduct->product_id]);

        
    }   



}
