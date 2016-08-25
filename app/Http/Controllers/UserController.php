<?php

namespace ShopCart\Http\Controllers;


use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\User;
use Session;



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

        //dd($user);

        return view('user.form', ['user' => $user]);

    }

    public function updateAccount(Request $request, $id)
{

        dd($request->input('name'));
        
        $price = $request->name;
        dd($price);        

        dd($request->all());        

        $name = $request->input('name');
        dd($name);
        
        $user = User::find($id);
        $input = $request->all();

        dd($input);
        $user->fill($input)->save();
         
        //dd($user->fill($input));

        Session::flash('message', 'User successfully updated!');

        return redirect()->back();

        /*


        $user = User::find($id);
        $user->name = $request->get('name');
        $user->address = $request->get('address');
        dd($user->name);
        $user->save();   

        $input = Request::all();
        $input ['published_at'] = Carbon::now();
        $input['slug'] =  str_slug($input ['name'], '-');


        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        $user = User::FindOrFail(1);

        $input = $request->all();
        $user->fill($input)->save();
        return view('user.form', array('user' => $user));
        //return Redirect::to('user.form');  

        */
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
