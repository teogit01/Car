<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarDetail;

class UserController extends Controller
{
    public function index() {
    	return view('user.index');
    }

    public function car(Request $request) {

    	$cars = CarDetail::all();
    	return view('user.car',['cars'=>$cars]);
    }
}
