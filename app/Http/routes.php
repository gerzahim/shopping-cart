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

Route::get('/', function () {
	return view('master');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('prueba', function(){
	return view('welcome');
});


Route::get('/shop', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);


Route::get('admin', function(){
	return view('admin.index');
});


/*
Route::get('/shop', function(){
	return view('shop.index');
});
*/


