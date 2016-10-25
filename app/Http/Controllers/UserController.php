<?php

namespace ShopCart\Http\Controllers;


use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\User;
use ShopCart\States;
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
        $states = States::all();

        return view('user.form', ['user' => $user, 'states' => $states]);

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

    public function getUsers(){

        //$users = User::all();
        $users = User::paginate(20);
        
        return view('admin.users', ['users' => $users]);

    }       

    public function getRemoveUser($id)
    {
        $user->find($id)->delete();
        Session::flash('message', 'User successfully Deleted!');
        return redirect()->route('categories.index');
        
    }


    public function editUser($id)
    {

        $user = User::find($id);
        $states = States::all();

        //return view('admin.editproducts', ['product' => $product], compact('categories'), compact('brands'));
        return view('admin.editusers', compact('user', 'states'));

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
    public function getSignup()
    {
        return view('user.signup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postSignup(Request $request)
    {
        //
        $this->validate($request, [
            //'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        /*
        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        return redirect()->route('/principal');
        */

        $user = User::create($request->all());
        //$mailer->sendEmailConfirmationTo($user);
        flash('We will Notify you by email Authorization to Login.');
        return redirect()->back();
    }

    /**
     * Confirm a user's email address.
     *
     * @param  string $token
     * @return mixed
     */
    public function confirmEmail($token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        flash('You are now confirmed. Please login.');
        return redirect('login');
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSignin()
    {
        //
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postSignin(Request $request)
    {
        //
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        if ($this->signIn($request)) {
            flash('Welcome back!');
            return redirect()->intended('/principal');
        }
        flash('Could not sign you in.');
        return redirect()->back();        
    }

    /**
     * Destroy the user's current session.
     *
     * @return \Redirect
     */
    public function logout()
    {
        Auth::logout();
        flash('You have now been signed out. See ya.');
        return redirect('login');
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
            'password' => $request->input('password'),
            'verified' => true
        ];
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
