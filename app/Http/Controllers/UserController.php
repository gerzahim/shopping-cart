<?php

namespace ShopCart\Http\Controllers;


use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\User;
use Session;
use Auth;




class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }    


    public function editAccount(Request $request)
    {

        $user_id = (auth()->check()) ? auth()->user()->id : null;

        $user = User::find($user_id);

        return view('user.form', ['user' => $user]);

    }

    public function updateAccount(Request $request, $id){

        $user = User::find($id);

        $array = $request->all();

        //dd($array);

        while ( ($fruit_name = current($array)) !== FALSE ) {
            //echo key($array).'<br />';
            $keya = key($array);
            // If Field Password
            if ($keya == 'password') {
                if ($fruit_name == '') {
                    // if field coming empty asign the same value from DB
                    $array[$keya] = $user->$keya;
                }else{
                    $array[$keya] = bcrypt($array[$keya]);        
                }
            }else{
            // Another No Password
                if ($fruit_name == '') {
                    // if field coming empty asign the same value from DB
                    $array[$keya] = $user->$keya;
                }                                
            }

                
               next($array);
        }

        $user->fill($array)->save();

        Session::flash('message', 'User successfully updated!');
        return redirect()->back();

    }


    public function ignoreIfBlank($input, $user){
        if ($input == '') {
            // if field coming empty asign the same value from DB
            $input = $user->name;
        }

        return $input;
    }

    public function nullIfBlank($field)
    {
        return trim($field) !== '' ? $field : null;
    }    

    public function getOrders(){

        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('user.myorders', ['orders' => $orders]);

    }    

    public function showAccount(){

        return view('user.account');

    } 

    public function index()
    {
        return view('user.form');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit()
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
    public function update(Request $request)
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
