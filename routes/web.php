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

});
