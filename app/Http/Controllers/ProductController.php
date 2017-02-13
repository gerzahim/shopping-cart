<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Cart;
use ShopCart\Product;
use ShopCart\Order;
use ShopCart\Categories;
use ShopCart\Brand;
use ShopCart\Banner;
use ShopCart\User;
use ShopCart\Subscriber;
use ShopCart\Settings;
use ShopCart\ShippingCost;
use ShopCart\ImagesProduct;
use ShopCart\States;
use ShopCart\Attributes;
use ShopCart\AttributesValues;
use ShopCart\ProductAttributeValues;
use ShopCart\AssociatesAttributes;
use ShopCart\AssociateProductsAttributes;
use DB;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use Mail;
use Validator;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        //Get Current Path
        //$url = $request->url();
        
        //get original path
        $url = str_replace($request->path(), '', $request->url());
        $url = str_replace('cart', 'shopcart', $url);

        // Get info for Banner Section
        $categories = Categories::all();


        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);    

        //$products = Product::all();
        $id=1;
        $setting = Settings::find($id);
        //dd($setting->pagination_shop); 



        //$products = Product::paginate($setting->pagination_shop);
        //$products = Product::where('status', '=', 1)->paginate($setting->pagination_shop);
        $products = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate($setting->pagination_shop);

        $products =$this->getSortTitle($products);

        
        return view('shop.index', compact('products', 'categories', 'tree', 'tree1'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearch(Request $request)
    {
        //Get Current Path
        //$url = $request->url();
        
        $input = $request->all();


        //get original path
        $url = str_replace($request->path(), '', $request->url());
        $url = str_replace('cart', 'shopcart', $url);

        // Get info for Banner Section
        $categories = Categories::all();


        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);    

        //$products = Product::all();
        $id=1;
        $setting = Settings::find($id);
        //dd($setting->pagination_shop);        


        $search=$input['search'];

        $searche = explode(" ", $search);

        //dd($pieces_search);

        //$products = Product::where('status', '=', 1)->whereIn('title', $pieces_search)->orWhereIn('description', $pieces_search)->paginate($setting->pagination_shop);

        $products = DB::Table('products')
        ->select('*')                
        ->Where(function ($query) use($searche) {
             for ($i = 0; $i < count($searche); $i++){
                $query->orwhere('title', 'like',  '%' . $searche[$i] .'%');
                $query->orwhere('description', 'like',  '%' . $searche[$i] .'%');
                $query->orwhere('sku', 'like',  '%' . $searche[$i] .'%');
             }      
        })->where('status', '=', 1)->paginate($setting->pagination_shop);

        //$products = Product::paginate($setting->pagination_shop);
        //$products = Product::where('status', '=', 1)->paginate($setting->pagination_shop);
        //$products = Product::where('status', '=', 1)->where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', "%$search%")->paginate($setting->pagination_shop);
        /*
        $products = array();

        foreach ($pieces_search as $pc_search) {
            # code...
            $products = Product::where('status', '=', 1)->where('title', 'LIKE', '%'.$pc_search.'%')->orwhere('description', 'LIKE', '%'.$pc_search.'%')->paginate($setting->pagination_shop);            
        }
    */
        //dd($products);

        $products =$this->getSortTitle($products);       

        return view('shop.search', compact('products', 'categories', 'tree', 'tree1', 'search'));
    }               


    public function getByCategory(Request $request, $categories_id)
    {
        //Get Current Path
        //$url = $request->url();
        
        //get original path
        $url = str_replace($request->path(), '', $request->url());

        // Get info for Banner Section
        $categories = Categories::all();

        $id=1;
        $setting = Settings::find($id);
        //dd($setting->pagination_shop);            

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);    

        //$products = Product::all();
        $products = Product::where('categories_id', '=', $categories_id)->where('status', '=', 1)->paginate($setting->pagination_shop);

        $products =$this->getSortTitle($products);
        
        return view('shop.index', compact('products', 'categories', 'tree', 'tree1'));
    }  

    public function getByBrand(Request $request, $brand_id)
    {
        //Get Current Path
        //$url = $request->url();
        
        //get original path
        $url = str_replace($request->path(), '', $request->url());

        // Get info for Banner Section
        $categories = Categories::all();

        $id=1;
        $setting = Settings::find($id);
        //dd($setting->pagination_shop);    

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);    

        //$products = Product::all();
        $products = Product::where('brand_id', '=', $brand_id)->where('status', '=', 1)->paginate($setting->pagination_shop);

        $products =$this->getSortTitle($products);
        
        return view('shop.index', compact('products', 'categories', 'tree', 'tree1'));
    }        

    public function getHome(Request $request)
    {
        //Get Current Path
        //$url = $request->url();
        //Session::forget('modal_ask');
        
        //get original path
        $url = str_replace($request->path(), '', $request->url());

        // Get info for Banner Section
        $banners = Banner::all();

        // Get info for Banner Section
        $categories = Categories::all();

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);         

        //DEFINE SELECT MODE HOME
        $id=1;
        $setting = Settings::find($id);
        //dd($setting->pagination_shop);
        //dd($setting->pagination_home);
        

        if ($setting->select_home_prod == '1') {
            # New Arrivals
            //$products = Product::orderBy('id', 'desc')->paginate($setting->pagination_home);
            //$products = Product::orderBy('created_at', 'desc')->paginate(6);
            $products = Product::where('status', '=', 1)->orderBy('id', 'desc')->paginate($setting->pagination_shop);

            
        }elseif ($setting->select_home_prod == '2') {
            # Random Products
            //$products = Product::orderByRaw('RAND()')->paginate($setting->pagination_home);
            $products = Product::where('status', '=', 1)->orderByRaw('RAND()')->paginate($setting->pagination_home);
            //dd($products);
            //$questions = Question::orderByRaw('RAND()')->take(10)->get();
        }else{
            # Select Especial Products 
            $skus = array();
            $skus[] .= $setting->especial_prod_sku1;
            $skus[] .= $setting->especial_prod_sku2;
            $skus[] .= $setting->especial_prod_sku3;
            $skus[] .= $setting->especial_prod_sku4;
            $skus[] .= $setting->especial_prod_sku5;
            $skus[] .= $setting->especial_prod_sku6;


            //especial_prod_sku1
            //$products = Product::whereIn('sku', $skus)->paginate($setting->pagination_home);
            $products = Product::whereIn('sku', $skus)->where('status', '=', 1)->paginate($setting->pagination_home);
                                                                    
            //$products = Product::whereIn('sku', [$setting->especial_prod_sku1,$setting->especial_prod_sku2,$setting->especial_prod_sku3,$setting->especial_prod_sku4,$setting->especial_prod_sku5,$setting->especial_prod_sku6])->paginate(6);

            //dd($products);
        }

        $products =$this->getSortTitle($products);
        

        // Get info for Content Section Shop
        //$products = Product::all();


        return view('shop.home', compact('products', 'categories', 'banners', 'tree', 'tree1'));
        //return view('shop.home', ['products' => $products], ['banners' => $banners]);
    }

    public function getProductsByFilter(Request $request){

        //Get Current Path
        $url = $request->url();
        
        //get original path
        $url = str_replace('filterProducts', 'product', $request->url());
        

        $categories = Categories::all();
        $categories1 = $categories;
        $brands = Brand::all();
        $brands1 = $brands;

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);         


        //$products = new Product();
        
        $input = $request->all();

        


        $categories_id= $input['categories_id'];
        $brand_id=$input['brand_id'];
        $ShowEntries = $input['ShowEntries'];


        /*
        $products = Product::where('brand_id', '!=', $brand_id)
                ->where('categories_id', '!=', $categories_id)
                ->paginate($ShowEntries);  
        */  


         if ($categories_id != '0' && $brand_id == '0') {
            //dd('CAT #  - BRA 0');
            $products = Product::where('brand_id', '!=', $brand_id)
                ->where('categories_id', '=', $categories_id)
                ->paginate($ShowEntries); 

        }elseif($categories_id == '0' && $brand_id != '0'){
            //dd('CAT 0  - BRA #');
            $products = Product::where('brand_id', '=', $brand_id)
                ->where('categories_id', '!=', $categories_id)
                ->paginate($ShowEntries); 
        }elseif($categories_id != '0' && $brand_id != '0'){
            //dd('CAT 0  - BRA #');
            $products = Product::where('brand_id', '=', $brand_id)
                ->where('categories_id', '=', $categories_id)
                ->paginate($ShowEntries); 
        }else{
            $products = Product::where('brand_id', '!=', $brand_id)
                ->where('categories_id', '!=', $categories_id)
                ->paginate($ShowEntries); 
        }               


        $tree='';  
        foreach ($products as $product ) {
            $tree.='<tr>';
            $tree.='<td class="cart_description"><input type="checkbox" id="checkbox_'.$product->id.'" name="checkboxes['.$product->id.']"></td>';
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
            if ($product->status == 1) {
                $tree.='<td class="cart_description"> Active </td>';
            }else{
                $tree.='<td class="cart_description"> Inactive </td>';                }
            
            $tree.='<td class="cart_description">';
            $tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$product->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            $tree.='</td>';
            $tree.='<td class="cart_description">';
            $tree.='<a class="cart_quantity_delete" href="'.$url.'/removeProduct/'.$product->id.'"><i class="fa fa-times" aria-hidden="true"></i></a>';
            $tree.='</td>';
            $tree.='</tr>';           
            
        }                 

        return view('admin.filterproducts', compact('products', 'brands1', 'categories1', 'tree', 'categories_id', 'brand_id', 'ShowEntries'));
        

    }


    public function getProductsBySearch(Request $request){


       //Get Current Path
        $url = $request->url();
        
        //get original path
        $url = str_replace('filterProducts', 'product', $request->url());
        

        $categories = Categories::all();
        $categories1 = $categories;
        $brands = Brand::all();
        $brands1 = $brands;

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);         


        //$products = new Product();
        
        $input = $request->all();

        
        $search=$input['search'];
        $search = explode(" ", $search);


        $products = DB::Table('products')
        ->select('*')                
        ->Where(function ($query) use($search) {
             for ($i = 0; $i < count($search); $i++){
                $query->orwhere('title', 'like',  '%' . $search[$i] .'%');
                $query->orwhere('description', 'like',  '%' . $search[$i] .'%');
                $query->orwhere('sku', 'like',  '%' . $search[$i] .'%');
             }      
        })->where('status', '=', 1)->paginate(100);


        $products =$this->getSortTitle($products);       
        
        $tree='';  
        foreach ($products as $product ) {
            $tree.='<tr>';
            $tree.='<td class="cart_description"><input type="checkbox" id="checkbox_'.$product->id.'" name="checkboxes['.$product->id.']"></td>';
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
            if ($product->status == 1) {
                $tree.='<td class="cart_description"> Active </td>';
            }else{
                $tree.='<td class="cart_description"> Inactive </td>';                }
            
            $tree.='<td class="cart_description">';
            $tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$product->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            $tree.='</td>';
            $tree.='<td class="cart_description">';
            $tree.='<a class="cart_quantity_delete" href="'.$url.'/removeProduct/'.$product->id.'"><i class="fa fa-times" aria-hidden="true"></i></a>';
            $tree.='</td>';
            $tree.='</tr>';           
            
        }                 

        return view('admin.products', compact('products', 'brands1', 'categories1', 'tree'));       

    }    

    public function getSortTitle($products){

        foreach ($products as $product) {            
            //dd($product->title);
            # Explode title by Spaces
            $keywords = preg_split('/\s+/', $product->title);

            $product->title= "";
            $flag_br= 0;
            foreach ($keywords as $keyword) {
                # Get lenght title                  
                $lenght_title = strlen($product->title);
                if($lenght_title < 25){
                    $product->title.= " ";
                    $product->title.= $keyword;
                }elseif($lenght_title > 55){
                    break;
                }else{
                    if ($flag_br == 0) {
                        $product->title.= "<br>";
                        //$product->title.= "<br>";
                        $flag_br= 1;
                    }
                    $product->title.= " ";
                    $product->title.= $keyword;                    
                }

           } # End Second Foreach
               if ($flag_br == 0) {
                    $product->title.= "<br>.";
                } 

        }
        
        return $products;

    }    

    public function getOrders(){

        //$users = User::all();
        $orders = Order::paginate(20);
        
        return view('admin.orders', ['orders' => $orders]);

    }

    public function editOrder($id)
    {

        $order = Order::find($id);
        $order->cart = unserialize($order->cart);
        //$order->cart = unserialize(base64_decode($order->cart));

        return view('admin.editorders', compact('order'));
    }

    public function seePicturesOrder($id)
    {

        $order = Order::find($id);
        $order->cart = unserialize($order->cart);
        //$order->cart = unserialize(base64_decode($order->cart));

        return view('admin.seepicturesorders', compact('order'));
    }    

    public function updateOrder(Request $request, $id){

        $order = Order::find($id);

        $array = $request->all();


        $order->fill($array)->save();

 
        $order->cart = unserialize($order->cart);
        //$order->cart = unserialize(base64_decode($order->cart));

        $id=1;
        $settings = Settings::find($id);  


        //Send Email 
        $data = array(
            'email' => $order->email,
            'costumer' => $order->name,
            'idorder' => $order->id,
            'name_site' => $settings->name_site,
            'order' => $order->cart,
            'shipcompany' => $order->shipcompany,
            'tracking' => $order->tracking
        );         

        Mail::send('emails.orderupdate', $data, function ($message) use ($data){

            $id=1;
            $setting = Settings::find($id);                

            $message->from($setting->email_site, $setting->name_site);
            //$message->from('herbnkulture@gmail.com', 'Info HerbnKulture');
            $message->to($data['email']);
            $message->subject('You Order has been shipped !!!');

        });          

        Session::flash('message', 'Order successfully updated!');
        return redirect()->back();

    }                 


    public function getMultipleAction(Request $request){

        
        $input = $request->all();



        $action=$input['bulks_id'];
        

        if(isset($input['checkboxes'])){
            
            $ids=$input['checkboxes'];

            //Figure Out if Delete or Update        
            if ($action == '2') {
                /* Mean it's Delete*/


                $products = Product::whereIn('id', array_keys($ids))
                ->delete();

                Session::flash('message', 'Products successfully Deleted!');
                return redirect()->route('product.index');

            }else{


                $categories = Categories::all();   
                $brands = Brand::all();


                $products = Product::whereIn('id', array_keys($ids))
                ->get();

                //Session::flash('message', 'Products successfully updated!');
                return view('admin.multipleupdateproducts', compact('products', 'categories', 'brands', 'ids')); 
            }            

        }else{

            Session::flash('message', 'No Select items!');
            return redirect()->route('product.index');            

        }






    }    


    public function getMultipleUpdate(Request $request){

        
        $input = $request->all();

        
        $status = $input['status'];
        $categories_id = $input['categories_id'];
        $brand_id = $input['brand_id'];
        $description = $input['description'];
        $price = $input['price'];
        $quantity = $input['quantity'];
        $ids = $input['ids'];

        /*
        "status" => "0"
        "categories_id" => "0"
        "brand_id" => "0"
        "description" => ""
        "price" => ""
        "quantity" => ""
        */
        $values=array();
        
        if ($status != "0") {
            $values['status']=$status;
        }if ($categories_id != "0") {
            $values['categories_id']=$categories_id;

        }if ($brand_id != "0") {
            $values['brand_id']=$brand_id;

        }if ($description != "") {
            $values['description']=$description;

        }if ($price != "") {
            $values['price']=$price;

        }if ($quantity != "") {
            $values['quantity']=$quantity;

        }

        $products = Product::whereIn('id', array_keys($ids))->update($values);  

        //dd($products);
        //$values=array('column1'=>'value','column2'=>'value2');
        
        Session::flash('message', 'Products successfully updated!');
        return redirect()->route('product.index');

    }     


    public function ParentView($url){


            //$Categorys = Categories::where('parent_id', '=', 0)->get();
            $categories = Categories::with('children')->whereNull('parent_id')->orderBy('name', 'asc')->get();
/*
            $tree='
 <div id="MainMenu">
  <div class="list-group panel">

    <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Parent</a>
    <div class="collapse" id="demo3">
      <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Child Subitem 1 <i class="fa fa-caret-down"></i></a>
      <div class="collapse list-group-submenu" id="SubMenu1">
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Grandson Subitem 1 a</a>
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Grandson Subitem 2 b</a>
        <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
        <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
          <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
          <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
          <a href="'.$url.'selectByCategory/1" class="list-group-item">Sub sub item 3</a>
        </div>
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
      </div>
      <a href="javascript:;" class="list-group-item">Subitem 2</a>
      <a href="javascript:;" class="list-group-item">Subitem 3</a>
    </div>

    <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 4</a>
    <div class="collapse" id="demo4">
      <a href="" class="list-group-item">Subitem 1</a>
      <a href="" class="list-group-item">Subitem 2</a>
      <a href="'.$url.'selectByCategory/1" class="list-group-item">Subitem 3</a>
    </div>

  </div>
</div> ';
        */

$tree='';
            $tree.='<div id="MainMenu">';
            $tree.='<div class="list-group panel cat-prod ">';
            foreach ($categories as $parent) {
                if ($parent->children->count()) {
                    # code...
                    $tree.='<a href="#menu'.$parent->id.'" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu" >'.
                        $parent->name.'
                    </a>';
                    $tree.='<div class="collapse" id="menu'.$parent->id.'">';
                    foreach ($parent->children as $child) {
                        if ($child->children->count()) {
                            $tree.='<a href="#submenu'.$child->id.'" class="list-group-item" data-toggle="collapse" data-parent="#menu'.$parent->id.'">&nbsp;&nbsp;'.
                                $child->name.'
                            <i class="fa fa-caret-down"></i></a>';
                            $tree.='<div class="collapse" id="submenu'.$child->id.'">';
                            foreach ($child->children as $grandson) {
                                    $tree.='<a href="'.$url.'selectByCategory/'.$grandson->id.'" class="list-group-itema">&nbsp;&nbsp;&nbsp;&nbsp;'.
                                        $grandson->name.'
                                   </a>';

                            }
                            $tree.='</div>';                            
                        }else{

                            $tree.='<a href="'.$url.'selectByCategory/'.$child->id.'" class="list-group-itema">&nbsp;&nbsp;'.$child->name.'
                            </a>';                            

                        }

                    }
                    $tree.='</div>';

                }else{
                    
                    $tree.='<a href="'.$url.'selectByCategory/'.$parent->id.'" class="list-group-item">
                    '.$parent->name.'
                    </a>';                      
                }

            }

            $tree.='</div>';
            $tree.='</div>';






/*
                 $tree='';
                 $flag=0;
            foreach ($Categorys as $Category) {
                 //$tree .= $Category->name;
                

                if ($flag = 0) {
                    $flag =1;

                }else{
                    if(count($Category->childs)) {
                        $tree.='<div class="panel panel-default">';
                            $tree.='<div class="panel-heading">';
                                $tree.='<h4 class="panel-title">';
                                $tree.='<a data-toggle="collapse" data-parent="#accordian" href="#'.$Category->name.'">';
                                $tree.='<span class="badge pull-right"><i class="fa fa-plus"></i></span>'.$Category->name;
                                $tree.='</a>';
                                $tree.='</h4>';
                            $tree.='</div>';
                        $tree.='</div>';                        
                        $tree.=$this->childView($Category, $url);
                    }else{
                        $tree.='<div class="panel panel-default">';
                            $tree.='<div class="panel-heading">';
                                $tree.='<h4 class="panel-title"><a href="'.$url.'selectByCategory/'.$Category->id.'">'.$Category->name.'</a></h4>';
                            $tree.='</div>';
                        $tree.='</div>';
                    }                    
                    //$tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$Category->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';

                }
            }// End Foreach
                             
*/
            // return $tree;
            return $tree;
            
    }     

    public function childView($Category, $url){



        $html ='';
        $html.='<div id="'.$Category->name.'" class="panel-collapse collapse">';
            $html.='<div class="panel-body">';
                $html.='<ul>';        
                foreach ($Category->childs as $arr) {
                        $html.='<li><a href="'.$url.'selectByCategory/'.$arr->id.'">'.$arr->name.'</a></li>';
                }                    
                $html.='</ul>';
            $html.='</div>';
        $html.='</div>';                               
        
        return $html;
    }

    public function getBrands($url){

        $brands = Brand::all();

        $html ='';    
        foreach ($brands as $brand) {
            $count_brand = Product::where('brand_id', '=', $brand->id)->count();
            $html.='<li><a href="'.$url.'selectByBrand/'.$brand->id.'"> <span class="pull-right">('.$count_brand.')</span>'.$brand->name.'</a></li>';
        }                    
        
        return $html;
    }            

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        //dd($product);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart')); 
        return redirect()->route('product.shop');
        
    }

    public function getDetails(Request $request, $id)
    {
        //get original path
        $url = str_replace($request->path(), '', $request->url());

        $categories = Categories::all();   
        $brands = Brand::all();   

        $product = Product::find($id);


        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);

        $imgproducts = ImagesProduct::where('product_id', '=', $id)->get();


        $attributesproducts = ProductAttributeValues::where('product_id', '=', $id)->get();

        //$imgproducts = ImagesProduct::where('product_id', '=', $id)->get();
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

//            ->join('attributes', 'associates_attributes.attributes_id', '=', 'attributes.id')

            $associates = DB::table('associates')
            ->join('attributes', 'associates.attributes_id', '=', 'attributes.id')
            ->join('associate_products', 'associates.id', '=', 'associate_products.associates_id')
            ->join('products_attributes', 'associate_products.products_attributes_id', '=', 'products_attributes.id')
            ->where('products_attributes.product_id', '=', $id)
            ->select('associates.*', 'attributes.name')
            ->get();

            //dd($associates);

/*

            dd($associates);          
*/


            $listassociates = array();
            $i=0;
            foreach ($associates as $associate) {
                # code...
                //dd($associate); 
                $listassociates[$i]['name'] = $associate->name;

                $products = DB::table('products')
                ->join('products_attributes', 'products_attributes.product_id', '=', 'products.id')
                ->join('associate_products', 'associate_products.products_attributes_id', '=', 'products_attributes.id')
                ->join('associates', 'associate_products.associates_id', '=', 'associates.id')
                ->join('attributes', 'associates.attributes_id', '=', 'attributes.id')
                ->where('associates.id', '=', $associate->id)
                ->where('products.id', '!=', $id)
                ->select('products.*', 'attributes.name')
                //->select('products.*')
                ->get();



                $listassociates[$i]['ids'] = $products;
                
                $i++;                    
            }           

            //dd($listassociates);    



        return view('shop.product_details', compact('product', 'categories', 'brands', 'tree', 'tree1', 'imgproducts', 'attributesproducts', 'productAttributeValues', 'id', 'attributeName', 'attributeId', 'attributeValueName', 'listassociates'));        
    }

    public function getContact(){

        $id=1;
        $setting = Settings::find($id);        

        return view('shop.contact', compact('setting'));        
    }   

    public function postContact(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'subject' => 'min:4|max:50',
            'message' => 'min:10|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('contact')
                        ->withErrors($validator)
                        ->withInput();
        }     

        $data = array(
            'email' => $request->email, 
            'subject' => $request->subject,
            'bodyMessage' => $request->message
            );

        //dd($data);
        /*
        Mail::send('emails.contact', $data, function ($message) use ($data){
            $message->from($data['email']);
            $message->to('info@crowntradingmiami.com', 'Info Crown Trading Miami');
            $message->subject($data['subject']);

        });
        */   
        Mail::send('emails.contact', $data, function ($message) use ($data){
            $id=1;
            $setting = Settings::find($id);


            $message->from($data['email']);
            $message->to($setting->email_site, $setting->name_site);
            //$message->to('herbnkulture@gmail.com', 'Info HerbnKulture');
            $message->subject($data['subject']);

        }); 
            


        Session::flash('message', 'Your message was sent successfully!');
        return redirect('contact');

        /*        
        $user = User::findOrFail($id);
        Mail::send('emails.contact', ['user' => $user], function ($m) use ($user){

            $m->from('hello@app.com','App.com');
            //$message->from('no-reply@scotch.io', 'Scotch.IO');
            $m->to($user->email, $user->name)->subject('Your Reminder');
        });

        //Mail::send('view', $data, function(){ });
        //Mail::to($request->user())->send(new OrderShipped($order));

        Mail::send('emails.contact', ['title' => $title, 'message' => $message], function ($message){
            $message->from('no-reply@scotch.io', 'Scotch.IO');
            $message->to('batman@batcave.io');
        });
        */
    
    } 

    public function postSubscriber(Request $request){
  

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('principal')
                        ->withErrors($validator)
                        ->withInput();
        }   

        $user = User::where('email', $request->email)->get();
        $subscriber = Subscriber::where('email', $request->email)->get();

        if(count($user) > 0 || count($subscriber) > 0 ){
            //If Found register on User Table or Suscriber Table
            Session::flash('message', ' You are Already Subscribed!');
            return redirect('principal');
        }
        else{
            // No Found Previus Register

            //Save on Subscriber Table
            $input = $request->all();
            $input['status'] = '1';
            $nsubscriber = new Subscriber();
            $nsubscriber->fill($input)->save();


            //Send Email 
            $data = array(
                'email' => $request->email, 
                );



            //dd($setting->email_site, $setting->name_site);

            Mail::send('emails.subscriber', $data, function ($message) use ($data){

                $id=1;
                $setting = Settings::find($id);                

                $message->from($setting->email_site, $setting->name_site);
                //$message->from('herbnkulture@gmail.com', 'Info HerbnKulture');
                $message->to($data['email']);
                $message->subject('Welcome New Subcriber');

            }); 

            Session::flash('message_header', 'Your was subscribed successfully!');
            return redirect('principal');               
          
        }            
    }     

    public function getAddByOne($id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        Session::put('cart', $cart);

        return redirect()->route('product.shoppingCart');
        
    } 

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->reduceByOne($id);

        if ( count($cart->items) > 0) {
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
        
    }    

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->removeItem($id);

        if ( count($cart->items) > 0) {
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
        
    }     

    public function getCart(){
        if (!Session::has('cart')) {
            return view('shop.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shop.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }



    public function getCheckout(){

        $setting = Settings::find(1);
        if ($setting->buylikeguess == 0) {
            if (Auth::guest()){
                Session::flash('message', 'Please Login to Order !!!');     
                return redirect('principal');                  
            }          
        }

        if (!Session::has('cart')) {
            return view('shop.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $total = $cart->totalPrice;

        $shippings = ShippingCost::all();
        $states = States::all();

        //dd($shippings);
        $setting = Settings::find(1);


        return view('shop.checkout', ['total' => $total, 'products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty, 'shippings' => $shippings, 'payment_toorder' => $setting->payment_toorder, 'modal_pay' => $setting->modal_pay, 'states' => $states]);
    }


    public function postCheckout(Request $request){


        $setting = Settings::find(1);
        if ($setting->buylikeguess == 0) {

            if (Auth::guest()){
                Session::flash('message', 'Please Login to Order !!!');     
                return redirect('principal');                  
            }
          
        }
                
        if (!Session::has('cart')) {
            return redirect()->route('product.shoppingCart');
        }

        $state = $request->input('state');
        if ($state == '0') {
            Session::flash('alert-danger', 'Please Select State !');
            return redirect()->route('checkout');
        }

        $shipping_id = $request->input('shipping_id');
        if ($shipping_id == '0') {
            Session::flash('alert-danger', 'Please Select Delivey Option!');
            return redirect()->route('checkout');
        }


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //$setting->apisecretkey;
        //Stripe::setApiKey('sk_test_HlLliwLgXEFhdQv4WQQamLii');
        
        $setting = Settings::find(1);

        
        # Select if payment to Order
        if ($setting->payment_toorder == '1') {
            # code...

            if ($setting->modal_pay == '1') {
                // Select Paypal

                # Don't do anything here, call by javascript paypal Controller

            }else{
                // Select Stripe
                Stripe::setApiKey($setting->apisecretkey);

                try {
                    $charge = Charge::create(array(
                      "amount" => $cart->totalCost * 100,
                      "currency" => "usd",
                      "source" => $request->input('stripeToken'), // obtained with Stripe.js
                      "description" => "Charge for ShopCart"
                    ));     
                    
                } catch(\Exception $e){
                    //DD("HELLAAAAA");
                    return redirect()->route('checkout')->with('error', $e->getMessage());
                }
            }





            /*

            Stripe::setApiKey($setting->apisecretkey);

            try {
                $charge = Charge::create(array(
                  "amount" => $cart->totalCost * 100,
                  "currency" => "usd",
                  "source" => $request->input('stripeToken'), // obtained with Stripe.js
                  "description" => "Charge for ShopCart"
                ));     
                
            } catch(\Exception $e){
                //DD("HELLAAAAA");
                return redirect()->route('checkout')->with('error', $e->getMessage());
            }*/

        }
                        
            // Saving Order on Database
            $order = new Order();
            $order->cart = serialize($cart);            
            //$order->cart = base64_encode(serialize($cart));

            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->state = $request->input('state');
            $order->zip = $request->input('zip');
            $order->country = $request->input('country');
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->companyname = $request->input('companyname');
            
            //$order->payment_id = $charge->id;




            // Define ID Payment
            if ($setting->payment_toorder == '1') {
                # code...
                $order->payment_id = $charge->id;                
            } else {
                # code...
                $order->payment_id = "No Payment";
            }

            // Set order_status to Pick Up Order
            if ($shipping_id == '1') {
                $order->status = "0";
            }            
            
            // Save like Guess or Id_user
            if (Auth::check()) {
                // The user is logged in...
                Auth::user()->orders()->save($order);
            }else{
                // Save user like guess
                $order->user_id = "1";
                //orders()->save($order);
                $order->save();
            }

            //Unserialize to email format
            $order->cart = unserialize($order->cart);
            //$order->cart = unserialize(base64_decode($order->cart));

            // Get General Parameters
            $id=1;
            $settings = Settings::find($id);  


            $shipping_id = $request->input('shipping_id');

            switch ($shipping_id) {
                case '1':
                    $shipping_id = "Pick up Store";
                    break;
                case '2':
                    $shipping_id = "Ground Shipping";
                    break;
                case '3':
                    $shipping_id = "2nd-Day Shipping";
                    break;
                case '4':
                    $shipping_id = "Next-Day Shipping";
                    break;                                                            
                
                default:
                    # code...
                    break;
            }


            //Data Email Format
            $data = array(

                'email_site' => $setting->email_site, 
                'name_site' => $setting->name_site,                
                'email' => $order->email,
                'costumer' => $order->name,
                'idorder' => $order->id,
                'order_placed' => date('F d, Y h:i:s A'),
                'order' => $order->cart,
                'phone' => $order->phone,
                'companyname' => $order->companyname,
                'address' => $order->address,
                'city' => $order->city,
                'state' => $order->state,
                'zip' => $order->zip,
                'country' => $order->country,
                'shipping' => $shipping_id
            ); 

                     

            $data['name_site'] = str_replace("&#039;","'",$data['name_site']);
            //dd($data['name_site']);  
            //dd($setting->email_site, $setting->name_site);

            // Send Email to Client
            Mail::send('emails.order', $data, function ($message) use ($data){              

                $message->from($data['email_site'], $data['name_site']);
                //$message->from('herbnkulture@gmail.com', 'Info HerbnKulture');
                $message->to($data['email']);
                $message->subject('You have a New Order on '.$data['name_site'].'');

            });


            // Send Email to Administrator
            Mail::send('emails.neworder', $data, function ($message) use ($data){

                $message->from($data['email']);
                $message->to($data['email_site'], $data['name_site']);
                //$message->to('herbnkulture@gmail.com', 'Info HerbnKulture');
                $message->subject('New Order Pending on '.$data['name_site'].'');
            });            
        

            // Delete Product From Stock 
            //dd($cart);
            $cart = is_array($cart) ? $cart : array($cart);

            
            //dd($cart);
            foreach ($cart as $items) {
                //dd($items->totalQty);
                //dd($items->items);
                foreach ($items->items as $item) {
                    //dd($item['item']['id']);
                    //dd($item['qty']);                    
                    
                    $product = Product::find($item['item']['id']);
                    //dd($product->quantity);
                    
                    $product->quantity = $product->quantity - $item['qty'];

                    // Check if qty = 0 
                    // Send Email to Administrator , Stock it's Over
                    // Product Status = 0
                    if ($product->quantity == 0) {

                        //Send Email 
                        $data = array(

                            'email_site' => $setting->email_site,              
                            'name_site' => $settings->name_site,
                            'item' => $product->title,
                            'sku' => $product->sku
                        );

                        $data['name_site'] = str_replace("&#039;","'",$data['name_site']);

                        Mail::send('emails.stockover', $data, function ($message) use ($data){
                            $message->from($data['email_site']);
                            $message->to($data['email_site'], $data['name_site']);
                            $message->subject(' this item it is over on '.$data['name_site'].'');
                        });
                        $product->status = 0;                           
                    }

                    
                    $product->save();


                }
            }

    
        //delete cart session
        Session::forget('cart');
        
        return redirect()->route('product.shop')->with('success', 'Successfully Purchased Products!');
    }

    public function getPolicy(){
        $id=1;
        $setting = Settings::find($id);        
      
        return view('shop.policy', compact('setting')); 
    }        


    public function getTerms(){
        $id=1;
        $setting = Settings::find($id);    
        return view('shop.terms', compact('setting'));
    } 

    public function getRefunds(){
        $id=1;
        $setting = Settings::find($id);    
        return view('shop.returns', compact('setting') ); 
    } 

    public function getShipping(){

        $shippings = ShippingCost::all();

        //dd($shippings);

        return view('shop.shipping', ['shippings' => $shippings]);        


    }     

    public function getAboutUs(){
        $id=1;
        $setting = Settings::find($id);    
        return view('shop.aboutus', compact('setting')); 
    }

    public function getFaqs(){
        $id=1;
        $setting = Settings::find($id);    
        return view('shop.faqs', compact('setting')); 
    }        


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

            $url = $request->url();

            //$products = Product::all();
            $products = Product::paginate(10);
            $categories = Categories::all();
            $categories1 = $categories;
            $brands = Brand::all();
            $brands1 = $brands;

            $tree='';  
            foreach ($products as $product ) {
                $tree.='<tr>';
                $tree.='<td class="cart_description"><input type="checkbox" id="checkbox_'.$product->id.'" name="checkboxes['.$product->id.']"></td>';
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
                if ($product->status == 1) {
                    $tree.='<td class="cart_description"> Active </td>';
                }else{
                    $tree.='<td class="cart_description"> Inactive </td>';                }
                
                $tree.='<td class="cart_description">';
                $tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$product->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                $tree.='</td>';
                $tree.='<td class="cart_description">';
                $tree.='<a class="cart_quantity_delete" href="'.$url.'/removeProduct/'.$product->id.'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                $tree.='</td>';
                $tree.='</tr>';           
                
            }                             

            // return $tree;
            return view('admin.products', compact('products', 'brands1', 'categories1', 'tree'));
            //return view('admin.products', compact('tree'));


            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $brands = Brand::all();           

        return view('admin.createproducts', compact('categories'), compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product();
        
        $input = $request->all();

        //dd($input); 
        $input['sku'] = strtoupper($input['sku']);

        if ($request->hasFile('imagepath') && $request->file('imagepath')->isvalid()){

            $input['imagepath'] = $request->file('imagepath');


            $file=$request->file('imagepath');
            $imgrealpath= $file->getRealPath(); 
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $nameonly = str_replace(' ', '_', $nameonly);            
            $fullname=$nameonly.'.'.$file->getClientOriginalExtension();


            $fileName = $input['sku'].'.'.$file->getClientOriginalExtension();

            $input['imagepath'] = $fileName;

            //$request->file('photo')->move($destinationPath, $fileName); 
            $request->file('imagepath')->move('media/', $fileName);
        }else{
            $input['imagepath'] = Null;    
        }
         

        $products->fill($input)->save();

        Session::flash('message', 'Product successfully created!');
        return redirect()->route('product.index');
    }

    public function getRemoveProduct($id)
    {
        $product = new Product();
        $product->find($id)->delete();
        return redirect()->route('product.index');
        
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

        $categories = Categories::all();   
        $brands = Brand::all();   

        $product = Product::find($id);
        $imgproducts = ImagesProduct::where('product_id', '=', $id)->get();

        $attributesproducts = ProductAttributeValues::where('product_id', '=', $id)->get();

        //$imgproducts = ImagesProduct::where('product_id', '=', $id)->get();
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

        //return view('admin.editproducts', ['product' => $product], compact('categories'), compact('brands'));
        return view('admin.editproducts', compact('product', 'categories', 'brands', 'imgproducts', 'attributesproducts', 'productAttributeValues', 'id', 'attributeName', 'attributeId', 'attributeValueName'));

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
        $product = Product::find($id);
        $input = $request->all();

        $input['sku'] = strtoupper($input['sku']);

        // If Checked for Change Image for L
        if ($request->cbox1 == '1') {
            
            // Validate File Ok
            if ($request->hasFile('imagepath') && $request->file('imagepath')->isvalid()){

                $input['imagepath'] = $request->file('imagepath');

                $file=$request->file('imagepath');
                $imgrealpath= $file->getRealPath(); 
                $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
                $nameonly = str_replace(' ', '_', $nameonly);            
                $fullname=$nameonly.'.'.$file->getClientOriginalExtension();


                $fileName = $input['sku'].'.'.$file->getClientOriginalExtension();

                $input['imagepath'] = $fileName;

                //$request->file('photo')->move($destinationPath, $fileName); 
                $request->file('imagepath')->move('media/', $fileName);
            }else{
                //$input['imagepath'] = Null; 
                $input['imagepath'] = $product->imagepath;    
                
            }         

        }else{
            $input['imagepath'] = $product->imagepath;   

        }         



        //dd($product);

        $product->fill($input)->save();  

        Session::flash('message', 'Product successfully Updated!');
        return redirect()->route('product.index');
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



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postWholesale(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required|confirmed',
            'phone' => 'required',
            'companyname' => 'required',
            'salestax' => 'required',
        ]);


        $user = new User();
        
        $input = $request->all();

        //dd($input);
                            
        $input['password'] = bcrypt($request->input('password'));
   
        $id=1;
        $setting = Settings::find($id);
        if($setting->approve_user == 1){
            $input['status'] = 0;
        }                    
        
        
        //$input['salestax'] = strtoupper($input['salestax']);

        if ($request->hasFile('salestax') && $request->file('salestax')->isvalid()){


            $input['salestax'] = $request->file('salestax');

            $file=$request->file('salestax');
            $imgrealpath= $file->getRealPath(); 
            $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
            $nameonly = str_replace(' ', '_', $nameonly);            
            $fullname=$nameonly.'.'.$file->getClientOriginalExtension();

            $lastInsertId = User::orderBy('id', 'desc')->first();

            $lastInsertId = $lastInsertId->id+1;            

            $fileName = 'salestax_'.$lastInsertId.'.'.$file->getClientOriginalExtension();

            $input['salestax'] = $fileName;

            //$request->file('photo')->move($destinationPath, $fileName); 
            $request->file('salestax')->move('media/documents/', $fileName);

        }else{
            $input['salestax'] = Null;    
        }


        
        $url = str_replace($request->path(), '', $request->url() );
        $path_salestax = $url.'media/documents/'.$input['salestax'];
         

        $user->fill($input)->save();

        //Send Email to Notify Admin New Costumer
        $data = array(

            'email_site' => $setting->email_site, 
            'name_site' => $setting->name_site,
            'name' => $request->name,
            'email' => $request->email,  
            'phone' => $request->phone, 
            'companyname' => $request->companyname,
            'salestax' => $path_salestax,
            'subject' => "New Costumer Waiting for Authorization"

            );

        //dd($data);
        /*
        Mail::send('emails.contact', $data, function ($message) use ($data){
            $message->from($data['email']);
            $message->to('info@crowntradingmiami.com', 'Info Crown Trading Miami');
            $message->subject($data['subject']);
            $message->attach($path[$url.'media/documents/'.)]);

        });
        */   
        Mail::send('emails.newcostumer', $data, function ($message) use ($data){

            $message->from($data['email']);
            $message->to($data['email_site'], $data['name_site']);
            //$message->to('herbnkulture@gmail.com', 'Info HerbnKulture');
            $message->subject($data['subject']);
            $message->attach($data['salestax']);

        }); 



        //$user = User::create($request->all());
        Session::flash('message', 'Thank you for registering, We will Notify by email Authorization to Login.!');
        return redirect('principal');


        //return redirect()->back();

        //return dd($request);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postLoginw(Request $request)
    {
        //
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);

        $id=1;
        $setting = Settings::find($id);
        if($setting->approve_user == 1){
            //$input['status'] = 0;
        } 

        $input['email'] = $request->input('email');
        try {
            $product_update = User::where('email',$input['email'])->first();  

            if ($product_update != null) {
                # code...
                if($product_update->status == 0){
                    Session::flash('alert-danger', 'No Authorization to access!');
                    return redirect('principal');
                }    

            }             
        } catch(\Exception $e){
            // 
        }
        
        if ($this->signIn($request)) {
            //Session::flash('message', 'Sucessfully Login.!');
            return redirect('principal');
        }

        Session::flash('message', 'Email/Password do not match our records.!');
        return redirect('principal');
    } 
    
    /**
     * Attempt to sign in the user.
     *
     * @param  Request $request
     * @return boolean
     */
    protected function signIn(Request $request)
    {
        return Auth::attempt($this->getCredentials($request), $request->has('remember'));
    }


    /**
     * Get the login credentials and requirements.
     *
     * @param  Request $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ];
    }          




}
