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
        
        // Get info for Banner Section
        $categories = Categories::all();

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);    

        //$products = Product::all();

        $products = Product::paginate(6);

        
        return view('shop.index', compact('products', 'categories', 'tree', 'tree1'));
    }


    public function getByCategory(Request $request, $categories_id)
    {
        //Get Current Path
        //$url = $request->url();
        
        //get original path
        $url = str_replace($request->path(), '', $request->url());

        // Get info for Banner Section
        $categories = Categories::all();

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);    

        //$products = Product::all();
        $products = Product::where('categories_id', '=', $categories_id)->paginate(6);
        
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

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);    

        //$products = Product::all();
        $products = Product::where('brand_id', '=', $brand_id)->paginate(6);
        
        return view('shop.index', compact('products', 'categories', 'tree', 'tree1'));
    }        

    public function getHome(Request $request)
    {
        //Get Current Path
        //$url = $request->url();
        
        //get original path
        $url = str_replace($request->path(), '', $request->url());

        // Get info for Banner Section
        $banners = Banner::all();

        // Get info for Banner Section
        $categories = Categories::all();

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);         



        // Get info for Content Section Shop
        //$products = Product::all();
        $products = Product::paginate(6);

        return view('shop.home', compact('products', 'categories', 'banners', 'tree', 'tree1'));
        //return view('shop.home', ['products' => $products], ['banners' => $banners]);
    }

    public function ParentView($url){


            $Categorys = Categories::where('parent_id', '=', 0)->get();
            //dd($Categorys);
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
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart')); 
        return redirect()->route('product.shop');
        
    }

    public function getDetails(Request $request, $id)
    {

        $url = $request->url();

        $categories = Categories::all();   
        $brands = Brand::all();   

        $product = Product::find($id);

        //Get Categories for SideBar        
        $tree =$this->ParentView($url);
        $tree1 =$this->getBrands($url);         

        return view('shop.product_details', compact('product', 'categories', 'brands', 'tree', 'tree1'));        
    }

    public function getContact(){

        return view('shop.contact');        
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
            $message->from($data['email']);
            $message->to('herbnkulture@gmail.com', 'Info HerbnKulture');
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
            $nsubscriber = new Subscriber();
            $nsubscriber->fill($input)->save();


            //Send Email 
            $data = array(
                'email' => $request->email, 
                );
     
            Mail::send('emails.subscriber', $data, function ($message) use ($data){
                $message->from('herbnkulture@gmail.com', 'Info HerbnKulture');
                $message->to($data['email']);
                $message->subject('Welcome New Subcriber');

            }); 

            Session::flash('message', 'Your was subscribed successfully!');
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
        if (!Session::has('cart')) {
            return view('shop.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $total = $cart->totalPrice;

        return view('shop.checkout', ['total' => $total, 'products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }


    public function postCheckout(Request $request){
        if (!Session::has('cart')) {
            return redirect('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_HlLliwLgXEFhdQv4WQQamLii');

      

        try {
            $charge = Charge::create(array(
              "amount" => $cart->totalPrice * 100,
              "currency" => "usd",
              "source" => $request->input('stripeToken'), // obtained with Stripe.js
              "description" => "Charge for ShopCart"
            ));     
            
            // Saving Order on Database
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);

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
                   
                    $product->save();
                }
            }


        } catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

    
        //delete cart session
        Session::forget('cart');
        
        return redirect()->route('product.shop')->with('success', 'Successfully Purchased Products!');
    }    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

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

        //return view('admin.editproducts', ['product' => $product], compact('categories'), compact('brands'));
        return view('admin.editproducts', compact('product', 'categories', 'brands'));
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
}
