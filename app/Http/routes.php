<?php
use ShopCart\Settings;
use ShopCart\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('prueba', function(){
	return view('welcome');
});

Route::get('home', function(){
	return redirect('principal');
});

Route::get('/', function(){
	return redirect('principal');
});


//View::share('settings', $users = DB::table('settings')->get()) ;
Route::get('ajax',function(){
   return view('message');
});


Route::get('/getRequest', function(){

	
	if (Request::ajax()){
		return 'getRequest has loaded';
	}
/*
	  $user = User::find(1);
	  $user->name = "Mamalo";
	  $user->save();

*/ 
});

//Route::post('/getmsg','AjaxController@index');




Route::get('/public_html', [
	'uses' => 'ProductController@getHome',
	'as' => 'principal3'
]);

Route::get('/principal', [
	'uses' => 'ProductController@getHome',
	'as' => 'principal2'
]);

Route::auth();


Route::get('/shop', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.shop'
]);

Route::get('/selectByCategory/{id}', [
	'uses' => 'ProductController@getByCategory',
	'as' => 'selectByCategory'
]);

Route::get('/selectByBrand/{id}', [
	'uses' => 'ProductController@getByBrand',
	'as' => 'selectByBrand'
]);

Route::post('/postsubscribers', 'ProductController@postSubscriber');

Route::get('/contact', 'ProductController@getContact');
Route::post('/contact', 'ProductController@postContact');

Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart'
]);

Route::get('/see-details/{id}', [
	'uses' => 'ProductController@getDetails',
	'as' => 'product.seeDetails'
]);

Route::get('/shopping-cart', [
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart'
]);

Route::get('/wishlist', [
	'uses' => 'WishListController@getWishList',
	'as' => 'product.wishlist'
]);


Route::get('/add-to-wishlist/{id}', [
	'uses' => 'WishListController@getAddToWishList',
	'as' => 'product.addToWishlist'
]);

Route::get('/getAddByOneWishlist/{id}', [
	'uses' => 'WishListController@getAddByOne',
	'as' => 'wishlist.addByOne'
]);

Route::get('/reduceByOneWishlist/{id}', [
	'uses' => 'WishListController@getReduceByOne',
	'as' => 'wishlist.reduceByOne'
]);

Route::get('/removeItemWishlist/{id}', [
	'uses' => 'WishListController@getRemoveItem',
	'as' => 'wishlist.removeItem'
]);

Route::get('/movetoCart/{id}', [
	'uses' => 'WishListController@getMovetoCart',
	'as' => 'wishlist.MovetoCart'
]);

Route::get('/movetoWishList/{id}', [
	'uses' => 'WishListController@getMovetoWishList',
	'as' => 'wishlist.MovetoWishList'
]);


$setting = Settings::find(1);
if ($setting->buylikeguess == 0) {
	Route::get('/checkout', [
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout',
	]);

	Route::post('/checkout', [
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkout',
	]);
}else{
	Route::get('/checkout', [
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);


	Route::post('/checkout', [
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
	]);	
}


Route::get('/account', [
	'uses' => 'UserController@showAccount',
	'as' => 'product.account'
]);


Route::get('/myorders', [
	'uses' => 'UserController@getOrders',
	'as' => 'product.myorders'
]);


Route::get('/useredit', [
	'uses' => 'UserController@editAccount',
	'as' => 'useredit'
]);


Route::post('/userupdate/{id}', [
	'uses' => 'UserController@updateAccount',
	'as' => 'userupdate'
]);

Route::get('/getAddByOne/{id}', [
	'uses' => 'ProductController@getAddByOne',
	'as' => 'product.addByOne'
]);

Route::get('/reduceByOne/{id}', [
	'uses' => 'ProductController@getReduceByOne',
	'as' => 'product.reduceByOne'
]);

Route::get('/removeItem/{id}', [
	'uses' => 'ProductController@getRemoveItem',
	'as' => 'product.removeItem'
]);


Route::get('/policy', [
	'uses' => 'ProductController@getPolicy',
	'as' => 'getpolicy'
]);

Route::get('/terms', [
	'uses' => 'ProductController@getTerms',
	'as' => 'getterms'
]);

Route::get('/aboutus', [
	'uses' => 'ProductController@getAboutUs',
	'as' => 'getaboutus'
]);

Route::get('/refunds', [
	'uses' => 'ProductController@getRefunds',
	'as' => 'getrefunds'
]);


Route::get('/shipping', [
	'uses' => 'ProductController@getShipping',
	'as' => 'getshipping'
]);

Route::get('/faqs', [
	'uses' => 'ProductController@getFaqs',
	'as' => 'getfaqs'
]);

//auth routes
Route::group(['middleware' => 'auth'], function () {


	//Route::get('test', function () { $user = \Auth::user(); dd($user->role); });


	Route::get('admin', function(){

		if (Auth::check()){
			$user = \Auth::user(); 
			if ($user->role == '2') {
				return view('admin.home');
			}
			
		}
		Session::flash('message', 'You are Not Authorized to access Admin section !!!');	 
		return redirect('principal');

	});

	Route::resource('/categories', 'CategoriesController');
	Route::resource('/brands', 'BrandsController');
	Route::resource('/product', 'ProductController');
	Route::resource('/banners', 'BannerController');	
	Route::resource('/subscribers', 'SubscriberController');

	Route::get('/product/removeProduct/{id}', [
	'uses' => 'ProductController@getRemoveProduct',
	'as' => 'product.removeProduct'
	]);

	Route::get('/categories/removeCategory/{id}', [
		'uses' => 'CategoriesController@getRemoveCategory',
		'as' => 'categories.removeCategory'
	]);

	Route::get('/brands/removeBrand/{id}', [
		'uses' => 'BrandsController@getRemoveBrand',
		'as' => 'brands.removeBrand'
	]);

	Route::get('/removeSubscribers/{id}', [
		'uses' => 'SubscriberController@getRemoveSubscribers',
		'as' => 'subscribers.removesubscribers'
	]);

	Route::get('/filterProducts', [
		'uses' => 'ProductController@getProductsByFilter',
		'as' => 'productFilter'
	]);


	Route::post('/multipleupdate', [
		'uses' => 'ProductController@getMultipleUpdate',
		'as' => 'product.multipleupdate'
	]);


	Route::post('/multipleactions', [
		'uses' => 'ProductController@getMultipleAction',
		'as' => 'product.multipleactions'
	]);

	Route::get('/form-csv', [
	'uses' => 'ImportController@formImport',
	'as' => 'import.form'
	]);	

	Route::post('/upload-csv', [
	'uses' => 'ImportController@storeCSV',
	'as' => 'import.upload'
	]);

	Route::get('/import-csv', [
	'uses' => 'ImportController@getImport',
	'as' => 'import.import'
	]);

	Route::get('/users', [
		'uses' => 'UserController@getUsers',
		'as' => 'userslist'
	]);

	Route::get('/usersedit/{id}', [
		'uses' => 'UserController@editUser',
		'as' => 'user.editUser'
	]);

	Route::get('/removeuser/{id}', [
		'uses' => 'UserController@getRemoveUser',
		'as' => 'user.removeUser'
	]);

	Route::get('/orders', [
		'uses' => 'ProductController@getOrders',
		'as' => 'orderslist'
	]);

	Route::get('/ordersedit/{id}', [
		'uses' => 'ProductController@editOrder',
		'as' => 'order.editOrder'
	]);				

	Route::post('/orderupdate/{id}', [
		'uses' => 'ProductController@updateOrder',
		'as' => 'orderupdate'
	]);

	Route::get('/settingedit/{id}', [
		'uses' => 'SettingController@editSetting',
		'as' => 'settings.edit'
	]);

	Route::post('/settingupdate/{id}', [
		'uses' => 'SettingController@updateSetting',
		'as' => 'settings.update'
	]);

	Route::get('/settingeditbanner/{id}', [
		'uses' => 'SettingController@editBannerSetting',
		'as' => 'settings.editbanner'
	]);

	Route::post('/settingupdatebanner/{id}', [
		'uses' => 'SettingController@updateBannerSetting',
		'as' => 'settings.updatebanner'
	]);


  
});







Route::get('jquery-tree-view',array('as'=>'jquery.treeview','uses'=>'TreeController@treeView'));

/*



Route::get('/', function () {
	return view('master');
});

	
//Route::post('userupdate', ['as' => 'books_list', 'uses' => 'UserController@update']);


Route::post('/userupdate', 'UserController@update');

Route::get('/userupdate', function(){
	return view('user.form');
});


Route::get('/signup', [
	'uses' => 'UserController@getUser',
	'as' => 'user.signup'
]);

Route::post('/signup', [
	'uses' => 'UserController@postUser',
	'as' => 'user.signup'
]);

return view('user.signup');
Route::get('/userupdate', 'UserController@index');


Route::get('/userupdate', function(){
	return view('user.signup');
});

Route::get('/shop', function(){
	return view('shop.index');
});


//auth routes
Route::group(['middleware' => 'auth'], function () {

	Route::get('admin', function(){
		return view('admin.index');
	});

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });

	Route::get('admin', function(){
		return view('admin.index');
	});    
});

//auth routes
Route::group(['middleware' => 'guest'], function () {
	
    Route::get('/', function ()    {
        // Uses Auth Middleware
    });


});

*/