<?php

namespace ShopCart\Http\Controllers;

use ShopCart\Http\Requests;
use Illuminate\Http\Request;
use ShopCart\User;



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

        //$user = User::find(1);
        $user = User::FindOrFail(1);

        //print_r($user);
        //return $user."usuario"; 
        //return view('usuario.edit', compact('user'));
        
        //return view('user.form', compact('user'));
        return view('user.form', array('user' => $user));

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
        /*
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario Actualizado Correctamente');*/

        $user = User::FindOrFail(1);
        $input = $request->all();
        $user->fill($input)->save();
        return view('user.form', array('user' => $user));
        //return Redirect::to('user.form');  
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
