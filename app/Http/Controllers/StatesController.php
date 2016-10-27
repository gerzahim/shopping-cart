<?php

namespace ShopCart\Http\Controllers;

use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\States;
use Session;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $url = $request->url();

        $states = States::all();
        $tree='';  
        foreach ($states as $state ) {
            $tree.='<tr>';
            $tree.='<td class="cart_description">'.$state->name.'</td>';
            $tree.='<td class="cart_description">'.$state->code.'</td>';
            $tree.='<td class="cart_description">'.$state->tax.' % </td>';
            $tree.='<td class="cart_description">';
            $tree.='<a class="cart_quantity_delete" href="'.$url.'/'.$state->id.'/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            $tree.='</td>';
            $tree.='</tr>';           
            
        }
        return view('admin.states', compact('tree'));
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
    public function edit($id)
    {
        //
        $state = States::find($id);   

        return view('admin.editstates', ['state' => $state]);        
    }

    public function update(Request $request, $id){


        $state = States::find($id);  
        $input = $request->all();

        $state->fill($input)->save();  

        Session::flash('message', 'Tax State successfully Updated!');
        return redirect()->route('states.index');

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
