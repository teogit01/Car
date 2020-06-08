<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	
    return redirect('user');
});
Route::get('/about', function () {
	
    return view('about');
})->name('about');
// Route::get('/', 'Customer\MapController@index');

Route::get('/login','login@index')->name('login');
Route::post('/login','login@postLogin')->name('postLogin');
route::get('/register','login@register');
route::post('/register','login@postRegister')->name('postRegister');
Route::get('/logout','login@logout')->name('logout');

route::prefix('/admin')->group(function(){
	route::get('/','adminController@index');	


	route::prefix('/cartype')->group(function(){
		route::get('/','Master\CarTypeController@index')->name('cartype.index');
		route::get('/add','Master\CarTypeController@getAdd')->name('cartype.add');
		route::post('/add_tc','Master\CarTypeController@postAdd')->name('cartype.postadd');
		Route::get('/update/{id}', 'Master\CarTypeController@getUpdate')->name('cartype.getupdate');
    	Route::post('/update/{id}', 'Master\CarTypeController@postUpdate')->name('cartype.postupdate');
    	Route::post('/delete/{id}', "Master\CarTypeController@delete")->name('cartype.delete');

    	//ajax
    	route::post('/getData',"Master\CarTypeController@getData")->name('cartype.getData');
	});
// car DETAIL
	route::prefix('/cardetail')->group(function(){
		route::get('/','Master\CarDetailController@index')->name('cardetail.index');
		route::get('/add','Master\CarDetailController@getAdd')->name('cardetail.add');
		route::post('/add','Master\CarDetailController@postAdd')->name('cardetail.postadd');
		Route::get('/update/{id}', 'Master\CarDetailController@getUpdate')->name('cardetail.getupdate');
    	Route::post('/update/{id}', 'Master\CarDetailController@postUpdate')->name('cardetail.postupdate');
    	Route::post('/delete', "Master\CarDetailController@delete")->name('cardetail.delete');
    	
    	//ajax
    	route::post('/getDataFromTypeCar',"Master\CarDetailController@getDataFromTypeCar");

    	//Xem chi tiet xe cu the
    	route::get('/{id}','Master\CarDetailController@detail')->name('cardetail');

    	//EDIT
    	route::post('/edit/{id}','Master\CarDetailController@edit')->name('cardetail.edit');    	
  		route::post('/image/edit','Master\CarDetailController@imageEdit');  		
  		route::post('/image/add','Master\CarDetailController@imageAdd');  		
  		// reset image delete
  		route::post('/image/edit/resetimagedel','Master\CarDetailController@resetImageDel');
	});
//	Test File
	route::get('/file','adminController@file');

	// SERVICE
	route::prefix('/service')->group(function(){
		route::get('/','Master\ServiceController@index')->name('service.index');
		route::get('/add','Master\ServiceController@getAdd')->name('service.add');
		route::post('/add','Master\ServiceController@postAdd')->name('service.postadd');
		Route::get('/{id}', 'Master\ServiceController@getUpdate')->name('service.getupdate');
    	Route::post('/edit/{id}', 'Master\ServiceController@postUpdate')->name('service.postupdate');
    	Route::post('/delete', "Master\ServiceController@delete")->name('service.delete');
	});
	// INVOICE
	route::prefix('/invoice')->group(function(){
		route::get('/','Master\InvoiceController@index')->name('invoice.index');
		Route::get('/{id}', 'Master\InvoiceController@getUpdate')->name('invoice.getupdate');
		
		Route::post('/edit', 'Master\InvoiceController@postUpdate')->name('invoice.postupdate');
		
		Route::get('/detail/{id}', 'Master\InvoiceController@getDetail');
		// Cap nhat Trang Thai Don Hang
		
	});

	// COUPON
	route::prefix('/coupon')->group(function(){
		route::get('/','Master\CouponController@index')->name('coupon.index');
		route::get('/add','Master\CouponController@getAdd')->name('coupon.add');
		route::post('/add','Master\CouponController@postAdd')->name('coupon.postadd');
		Route::get('/{id}', 'Master\CouponController@getUpdate')->name('coupon.getupdate');
    	Route::post('/edit/{id}', 'Master\CouponController@postUpdate')->name('coupon.postupdate');
    	Route::post('/delete', "Master\CouponController@delete")->name('coupon.delete');
	});
	// ACCOUNT
	route::prefix('/account')->group(function(){
		route::get('/','Master\AccountController@index')->name('account.index');
		
	});
	
	// DISCOUNTTYPE
	route::prefix('/discounttype')->group(function(){
		route::get('/','Master\DiscountTypeController@index')->name('discounttype.index');
		route::get('/add','Master\DiscountTypeController@getAdd')->name('discounttype.add');
		route::post('/add','Master\DiscountTypeController@postAdd')->name('discounttype.postadd');
		Route::get('/{id}', 'Master\DiscountTypeController@getUpdate')->name('discounttype.getupdate');
    	Route::post('/edit/{id}', 'Master\DiscountTypeController@postUpdate')->name('discounttype.postupdate');
    	Route::post('/delete', "Master\DiscountTypeController@delete")->name('discounttype.delete');
	});
	/////////////////////  Banner ////////////////////////////////
	route::prefix('/banner')->group(function(){
		route::get('/','Master\BannerController@index');
	});

	route::prefix('/statistic')->group(function(){
		route::get('/','Master\StatisticController@index')->name('statistic.index');
	});
});

route::prefix('/customer')->group(function(){
	Route::get('language/{language}', 'Customer\LanguageController@index')->name('language.index');
	route::get('/','Customer\CustomerController@index');
	Route::get('/add-to-cart/{cars_detail}', 'Customer\CartController@add')->name('cart.add')->middleware('auth');
	Route::get('/cart', 'Customer\CartController@index')->name('cart.index');
	Route::get('/cart/destroy/{itemID}', 'Customer\CartController@destroy')->name('cart.destroy')->middleware('auth');
	Route::get('/cart/update/{itemID}', 'Customer\CartController@update')->name('cart.update')->middleware('auth');
	Route::get('/cart/checkout', 'Customer\CartController@checkout')->name('cart.checkout')->middleware('auth');
	Route::get('/cart/apply-coupon', 'Customer\CartController@applyCoupon')->name('cart.coupon')->middleware('auth');
	Route::resource('orders', 'Customer\OrderController')->middleware('auth');

	Route::get('paypal/checkout/{order}', 'Customer\PayPalController@getExpressCheckout')->name('paypal.checkout');
	Route::get('paypal/checkout-success/{order}', 'Customer\PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
	Route::get('paypal/checkout-cancel', 'Customer\PayPalController@cancelPage')->name('paypal.cancel');
});

/////////////////////  User ////////////////////////////////

route::prefix('/user')->group(function(){
	route::get('/','User\UserController@index')->name('home');
	route::get('/car','User\UserController@car')->name('car');
  
	route::post('/car/comment','User\UserController@comment')->name('car.comment');
	route::post('/car/comment/delete','User\UserController@commentDel')->name('car.comment.delete');

	// profile user
	route::get('/profile/{id}','User\UserController@profile')->name('profile');

});

/////////////////////  Search ////////////////////////////////
//route::post('/search','SearchController@car')->name('search.car');
//route::get('/search','SearchController@getSearch')->name('get.search');
route::post('/search','SearchController@search')->name('search');

// route::get('/search','SearchController@test');

route::get('/test',function(){
	return view("test");
});

