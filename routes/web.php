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

	route::get('/typecar_add','TypeCarController@getAdd');
	route::post('/typecar_add','TypeCarController@getAdd');


});
