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
    return view('welcome');
});

Route::get('/login','login@index');
route::get('/register','login@register');
route::post('/register','login@postRegister')->name('postRegister');

route::prefix('/admin')->group(function(){
	route::get('/','adminController@index');	

	route::prefix('/cartype')->group(function(){
		route::get('/','Master\CarTypeController@index')->name('cartype.index');
		route::get('/add','Master\CarTypeController@getAdd')->name('cartype.add');
		route::post('/add_tc','Master\CarTypeController@postAdd')->name('cartype.postadd');
		Route::get('/update/{id}', 'Master\CarTypeController@getUpdate')->name('cartype.getupdate');
    	Route::post('/update/{id}', 'Master\CarTypeController@postUpdate')->name('cartype.postupdate');
    	Route::post('/delete/{id}', "Master\CarTypeController@delete")->name('cartype.delete');
	});

	route::prefix('/cardetail')->group(function(){
		route::get('/','Master\CarDetailController@index')->name('cardetail.index');
		route::get('/add','Master\CarDetailController@getAdd')->name('cardetail.add');
		route::post('/add_cd','Master\CarDetailController@postAdd')->name('cardetail.postadd');
		Route::get('/update/{id}', 'Master\CarDetailController@getUpdate')->name('cardetail.getupdate');
    	Route::post('/update/{id}', 'Master\CarDetailController@postUpdate')->name('cardetail.postupdate');
    	Route::post('/delete/{id}', "Master\CarDetailController@delete")->name('cardetail.delete');
	});

	route::get('/car_add','CarController@getAdd');
	route::post('/car_add','CarController@getAdd');

	


});
