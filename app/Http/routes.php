<?php

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


Route::auth();

Route::get('/', function () {
	return view('master');
});


Route::get('/home', 'HomeController@index');

Route::get('/shop', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);


Route::get('/add-to-cart/{id}', [
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart'
]);



Route::get('/shopping-cart', [
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart'
]);


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


//auth routes
Route::group(['middleware' => 'auth'], function () {

	Route::get('admin', function(){
		return view('admin.index');
	});
  
});



/*

Route::get('/', function () {
	return view('master');
});

Route::get('/useredit', 'UserController@edit');

	
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