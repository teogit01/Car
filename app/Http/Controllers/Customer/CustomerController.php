<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarDetail;

class CustomerController extends Controller
{
    public function index() {
        $data = CarDetail::orderBy('id', 'DESC')->get();

    	return view('customer.home', compact('data'));
    }
}
