<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getAdd(){
    	return view('admin.Car.getAdd');
    }
}
