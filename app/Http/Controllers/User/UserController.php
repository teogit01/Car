<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarDetail;

class UserController extends Controller
{
	public function __construct(){
    	parent::__construct();
        $this->middleware('auth');
    }

    public function index() {
        
        $cars = CarDetail::all();

    	return view('user.index',['cars'=>$cars]);
    }

    public function car(Request $request) {

    	$cars = CarDetail::all();
    	return view('user.car',['cars'=>$cars]);
    }
}
