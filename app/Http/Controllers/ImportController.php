<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Product;
use ShopCart\Categories;
use ShopCart\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Auth;
use Exception;



class ImportController extends Controller{


    
    public function formImport(Request $request){


    	$file_cvs = file_exists("test.txt");

    	//($url."import/test.txt");	
    	$file_found = file_exists("import/products.csv");

		return view('admin.formimport', compact('file_found'));
	}

    public function storeCSV(Request $request){


        $input = $request->all();
        $file=$request->file('import_file');

        if ($request->hasFile('import_file') && $request->file('import_file')->isvalid()){


	        $ext = $file->getClientOriginalExtension();

	        if ($ext == 'csv' || $ext == 'CSV') {

	            //$request->file('photo')->move($destinationPath, $fileName); 
	            $request->file('import_file')->move('import/', 'products.csv');
	            Session::flash('message', 'CSV File  successfully uploaded!');    

            }else{	
	        	
				Session::flash('alert-danger', 'Sorry, only CSV files are allowed !');         	
            }        

        }else{
        	Session::flash('alert-danger', 'CSV File  Upload Unsuccessful!'); 
        }
         
        return redirect()->route('import.form');
    }	
	

	public function getImport(){

		/*
    	Excel::load('products.csv', function($reader) {

     		foreach ($reader->get() as $book) {
     			Book::create([
     				'name' => $book->title,
     				'author' =>$book->author,
     				'year' =>$book->publication_year
     			]);
      		}
		});
		return Book::all();
		*/
			$insert =  array();
			$update =  array();

			$products_insert = new Product();

			$listproducts = Product::all();

			$data = Excel::load('import/products.csv', function($reader) {

			})->get();



			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					//protected $fillable = ['sku','title','description','imagepath','price','quantity','status','categories_id','brand_id'];
					//dd($listproducts);

					$flag_sku = 0;
					foreach ($listproducts as $listproduct) {
						# code...
						if ($listproduct['sku'] == $value->sku) {
							# code...
							$flag_sku = 1;
						}
					}

        			if ($flag_sku == 0) {

						$insert[] = [
						'sku' => $value->sku,
						'title' => $value->title,
						'description' => $value->description,
						'price' => $value->price,
						'quantity' => $value->quantity,
						'status' => $value->status,
						'categories_id' => $value->categories_id,
						'brand_id' => $value->brand_id
						];
        			}else{
						$update[] = [
						'sku' => $value->sku,
						'title' => $value->title,
						'description' => $value->description,
						'price' => $value->price,
						'quantity' => $value->quantity,
						'status' => $value->status,
						'categories_id' => $value->categories_id,
						'brand_id' => $value->brand_id
						];

 



        			}				
				}

				#Insert New Products
				$msg_ins = ""; 
				if(!empty($insert)){
					//$products->insert($insert);
					//Session::flash('message', 'Insert Products successfully!');
					//dd("HELLO");
					try {
						//dd($insert);
						$products_insert->insert($insert);
						$msg_ins = "Insert";
						//Session::flash('message', 'Insert Products successfully!');
						
					} catch ( \Illuminate\Database\QueryException $e) {
						Session::flash('alert-danger', $e->errorInfo[2].' !');
						return redirect()->route('product.index');
						//Session::flash('message', $e->errorInfo[2]);
					    //dd($e->errorInfo[2] );
					}
				}

				#Update Products Repeat
				$msg_upd = "";
				if(!empty($update)){
					foreach ($update as $upd) {
						# code...
						$product_update = Product::where('sku',$upd['sku'])->first();
				        $product_update->title = $upd['title'];
				        $product_update->description = $upd['description'];
				        $product_update->price = $upd['price'];
				        $product_update->quantity = $upd['quantity'];
				        $product_update->status = $upd['status'];
				        $product_update->categories_id = $upd['categories_id'];
				        $product_update->brand_id = $upd['brand_id'];
				        $product_update->save();  						

					}
					$msg_upd = "Update";

				}



				unlink('import/products.csv');
				Session::flash('message', $msg_ins.' / '.$msg_upd .' Products successfully!');    
				return redirect()->route('product.index');				




			}

		// DELETE products.csv FILE
		Session::flash('alert-danger', 'Problems to Import News Products!');
		//Session::flash('message', 'Problems to Import News Products!');
		return back();

	}

    public function formImportCat(Request $request){


    	$file_cvs = file_exists("test.txt");

    	//($url."import/test.txt");	
    	$file_found = file_exists("import/categories.csv");

		return view('admin.formimportcat', compact('file_found'));
	}


    public function storeCSVCat(Request $request){


        $input = $request->all();
        $file=$request->file('import_file');

        if ($request->hasFile('import_file') && $request->file('import_file')->isvalid()){


	        $ext = $file->getClientOriginalExtension();

	        if ($ext == 'csv' || $ext == 'CSV') {

	            //$request->file('photo')->move($destinationPath, $fileName); 
	            $request->file('import_file')->move('import/', 'categories.csv');
	            Session::flash('message', 'CSV File  successfully uploaded!');    

            }else{	
	        	
				Session::flash('alert-danger', 'Sorry, only CSV files are allowed !');         	
            }        

        }else{
        	Session::flash('alert-danger', 'CSV File  Upload Unsuccessful!'); 
        }
         
        return redirect()->route('import.formCat');
    }

	public function getImportCat(){

		/*
    	Excel::load('products.csv', function($reader) {

     		foreach ($reader->get() as $book) {
     			Book::create([
     				'name' => $book->title,
     				'author' =>$book->author,
     				'year' =>$book->publication_year
     			]);
      		}
		});
		return Book::all();
		*/
			$insert =  array();
			$update =  array();

			$products_insert = new Categories();

			$listproducts = Categories::all();

			$data = Excel::load('import/categories.csv', function($reader) {

			})->get();



			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					//protected $fillable = ['sku','title','description','imagepath','price','quantity','status','categories_id','brand_id'];
					//dd($listproducts);

					$flag_sku = 0;
					foreach ($listproducts as $listproduct) {
						# code...
						if ($listproduct['id'] == $value->id) {
							# code...
							$flag_sku = 1;
						}
					}

					if ($value->parent_id == 0 || $value->parent_id == "") {
						# code...
						$value->parent_id = NULL;
					}

        			if ($flag_sku == 0) {

						$insert[] = [
						'id' => $value->id,
						'name' => $value->name,
						'description' => $value->description,
						'parent_id' => $value->parent_id
						];
        			}else{
						$update[] = [
						'id' => $value->id,
						'name' => $value->name,
						'description' => $value->description,
						'parent_id' => $value->parent_id
						];


        			}				
				}

				#Insert New Products
				$msg_ins = ""; 
				if(!empty($insert)){
					//$products->insert($insert);
					//Session::flash('message', 'Insert Products successfully!');
					//dd("HELLO");
					try {
						//dd($insert);
						$products_insert->insert($insert);
						$msg_ins = "Insert";
						//Session::flash('message', 'Insert Products successfully!');
						
					} catch ( \Illuminate\Database\QueryException $e) {
						Session::flash('alert-danger', $e->errorInfo[2].' !');
						return redirect()->route('categories.index');
						//Session::flash('message', $e->errorInfo[2]);
					    //dd($e->errorInfo[2] );
					}
				}

				#Update Products Repeat
				$msg_upd = "";
				if(!empty($update)){
					foreach ($update as $upd) {
						# code...
						$product_update = Categories::where('id',$upd['id'])->first();
				        $product_update->id = $upd['id'];
				        $product_update->name = $upd['name'];
				        $product_update->description = $upd['description'];
				        $product_update->parent_id = $upd['parent_id'];
				        $product_update->save();  						

					}
					$msg_upd = "Update";

				}



				unlink('import/categories.csv');
				Session::flash('message', $msg_ins.' / '.$msg_upd .' Categories successfully!');    
				return redirect()->route('categories.index');				




			}

		// DELETE products.csv FILE
		Session::flash('alert-danger', 'Problems to Import News Categories!');
		//Session::flash('message', 'Problems to Import News Products!');
		return back();

	}    		





}


