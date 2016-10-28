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

Route::get('signupw', function(){
	return view('user.signupwholesale');
});


Route::post('signupw', 'ProductController@postWholesale');


Route::get('/signup', [
	'uses' => 'UserController@getSignup',
	'as' => 'user.signupe'
]);

Route::post('/signup', [
	'uses' => 'UserController@postSignup',
	'as' => 'user.signupe'
]);



Route::get('loginap', function(){
	return view('user.loginw');
});


Route::post('/loginap', [
	'uses' => 'ProductController@postLoginw',
	'as' => 'postLogin'
]);

Route::get('prueba', function(){
	return view('welcome');
});

Route::get('home', function(){
	return redirect('principal');
});

Route::get('/', function(){
	return redirect('principal');
});




Route::post('/getshippingcost', [
	'uses' => 'AjaxController@index',
	'as' => 'getshippingcost'
]);

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

Route::get('/search', 'ProductController@getSearch');

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


Route::get('/checkout', [
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout',
]);

Route::post('/checkout', [
	'uses' => 'ProductController@postCheckout',
	'as' => 'checkout',
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
	'uses' => 'ShippingCostController@getShipping',
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
	Route::resource('/states', 'StatesController');
	Route::resource('/attributes', 'AttributesController');
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

	Route::get('/removeCategory/{id}', [
		'uses' => 'CategoriesController@RemoveCategory',
		'as' => 'category.removeCategory'
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

	Route::get('/showattributeproduct/{id}', [
		'uses' => 'ProductAttributeValueController@showProductAttribute',
		'as' => 'showattributeproduct'
	]);

	Route::get('/selecattributeproduct/{id}', [
		'uses' => 'ProductAttributeValueController@selectProductAttribute',
		'as' => 'selecattributeproduct'
	]);	

	Route::get('/addattributeproduct/{id}', [
		'uses' => 'ProductAttributeValueController@addProductAttribute',
		'as' => 'addattributeproduct'
	]);





	Route::get('/editgallery/{id}', [
		'uses' => 'ImagesProductController@editGallery',
		'as' => 'editgallery'
	]);

	Route::get('/addimagegallery/{id}', [
		'uses' => 'ImagesProductController@addImgGallery',
		'as' => 'addimagegallery'
	]);

	Route::post('/storegallery/{id}', [
		'uses' => 'ImagesProductController@storeGallery',
		'as' => 'imagesstoregallery'
	]);		

	Route::get('/imagesedit/{id}', [
		'uses' => 'ImagesProductController@imagesEdit',
		'as' => 'imageseditgallery'
	]);

	Route::post('/updategallery/{id}', [
		'uses' => 'ImagesProductController@updateGallery',
		'as' => 'imagesupdategallery'
	]);		

	Route::get('/imagesdelete/{id}', [
		'uses' => 'ImagesProductController@imagesDelete',
		'as' => 'imagesdeletegallery'
	]);

	Route::get('/shipping-admin', [
		'uses' => 'ShippingCostController@getShippingAdmin',
		'as' => 'getshipping'
	]);		
			
	Route::get('/shippingedit/{id}', [
		'uses' => 'ShippingCostController@editShipping',
		'as' => 'shippingedit'
	]);				

	Route::post('/shippingupdate/{id}', [
		'uses' => 'ShippingCostController@updateShipping',
		'as' => 'shippingupdate'
	]);

	Route::get('/attributesvaluescreate/{id}', [
		'uses' => 'AttributesController@createValue',
		'as' => 'attributesvalue.create'
	]);				


	Route::post('/attributesvaluesstore/{id}', [
		'uses' => 'AttributesController@storeValue',
		'as' => 'attributesvalue.store'
	]);	

	Route::get('/attributesvaluesedit/{id}/{idv}', [
		'uses' => 'AttributesController@editValue',
		'as' => 'attributesvalue.edit'
	]);

	Route::get('/attributesvaluesdestroy/{id}/{idv}', [
		'uses' => 'AttributesController@destroyValue',
		'as' => 'attributesvalue.destroy'
	]);				

	Route::post('/attributesvaluesupdate/{id}/{idv}', [
		'uses' => 'AttributesController@updateValue',
		'as' => 'attributesvalue.update'
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