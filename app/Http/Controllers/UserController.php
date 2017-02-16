<?php

namespace ShopCart\Http\Controllers;


use Illuminate\Http\Request;
use ShopCart\Http\Requests;
use ShopCart\User;
use ShopCart\States;
use ShopCart\Settings;
use ShopCart\Order;
use Session;
use Auth;
use Mail;



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


        // If Checked for Change Image for L
        if ($request->cbox1 == '1') {

            // Validate File Ok
            if ($request->hasFile('salestax') && $request->file('salestax')->isvalid()){




                $array['salestax'] = $request->file('salestax');

                $file=$request->file('salestax');
                $imgrealpath= $file->getRealPath(); 
                $nameonly=preg_replace('/\..+$/', '', $file->getClientOriginalName());
                $nameonly = str_replace(' ', '_', $nameonly);            
                $fullname=$nameonly.'.'.$file->getClientOriginalExtension();

                

                $fileName = 'salestax_'.$user->id.'.'.$file->getClientOriginalExtension();

                $array['salestax'] = $fileName;


                //$request->file('photo')->move($destinationPath, $fileName); 
                $request->file('salestax')->move('media/documents/', $fileName);

            }else{
                //$input['imagepath'] = Null; 
                $array['salestax'] = $user->salestax;    
                
            }         

        }else{
            $array['salestax'] = $user->salestax;   

        } 


        $user->fill($array)->save();


        $id=1;
        $setting = Settings::find($id);  

        //Send Email 
        $data = array(
            'email_site' => $setting->email_site, 
            'name_site' => $setting->name_site, 
            'costumer' => $array['name'],
            'email' => $array['email']
        );

        $data['name_site'] = str_replace("&#039;","'",$data['name_site']);         


        //dd($data);

        Mail::send('emails.userupdate', $data, function ($message) use ($data){
          
            $message->from($data['email_site'], $data['name_site']);
            //$message->from('herbnkulture@gmail.com', 'Info HerbnKulture');
            $message->to($data['email']);
            $message->subject('You Info account has been updated !!!');

        }); 

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

    public function getOrders($id){

        //$orders = Auth::user()->orders;

        $order = Order::find($id);
        $order->cart = unserialize($order->cart);

/*
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            //$order->cart = var_dump(unserialize($order->cart));
            //print_r ($order->cart);
            //$order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });

*/

        //return view('user.myorders', ['orders' => $orders]);
        return view('user.myorders', ['order' => $order]);
    } 


    public function getListOrders(){

        $orders = Auth::user()->orders;

        $orders = Order::orderBy('id', 'desc')->paginate(20);

        return view('user.mylistorders', ['orders' => $orders]);

    } 

    public function getUsers(){

        //$users = User::all();
        $users = User::paginate(20);
        
        return view('admin.users', ['users' => $users]);

    }       

    public function getRemoveUser($id)
    {
        $user = User::find($id)->delete();
        //$user->find($id)->delete();
        Session::flash('message', 'User successfully Deleted!');
        
        $users = User::paginate(20);
        return view('admin.users', ['users' => $users]);
        
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
