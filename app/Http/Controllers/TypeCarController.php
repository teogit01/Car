<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeCarController extends Controller
{
    public function getAdd(){
    	return view('admin.typeCar.getAdd');
    }
}
