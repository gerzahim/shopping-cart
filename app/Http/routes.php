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

Route::get('home', function(){
	return redirect('principal');
});

Route::get('/', function(){
	return redirect('principal');
});


/*
Route::get('/', [
	'uses' => 'ProductController@getHome',
	'as' => 'principal'
]);

*/
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

Route::post('/subscribers', 'ProductController@postSubscriber');

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

Route::get('/filterProducts', [
	'uses' => 'ProductController@getProductsByFilter',
	'as' => 'product.filter'
]);


Route::get('/products_Serverprocessing', function(){

	//return $dedo;
	return Datatables::eloquent(ShopCart\Product::query())->make(true);
});

//auth routes
Route::group(['middleware' => 'auth'], function () {

	Route::get('admin', function(){
		return view('admin.home');
	});
  
});


Route::resource('/categories', 'CategoriesController');
Route::resource('/brands', 'BrandsController');
Route::resource('/product', 'ProductController');
Route::resource('/banners', 'BannerController');


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

Route::get('jquery-tree-view',array('as'=>'jquery.treeview','uses'=>'TreeController@treeView'));

/*

Route::get('/categories', [
	'uses' => 'CategoriesController@index',
	'as' => 'admin.categories'
]);

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