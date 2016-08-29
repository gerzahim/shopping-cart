<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\Cart;
use ShopCart\Product;
use ShopCart\Order;
use ShopCart\Categories;
use ShopCart\Brand;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart')); 
        return redirect()->route('product.index');
        
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

        return view('shop.checkout', ['total' => $total]);
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
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        

        //delete cart session
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully Purchased Products!');
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

http://127.0.0.1/shopcart/trunk/public/categories/removeCategory/1
http://127.0.0.1/shopcart/trunk/public/product/removeProduct/1

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
