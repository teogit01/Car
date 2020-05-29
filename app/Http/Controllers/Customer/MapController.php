<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Input;
use Redirect;
use Session;
use Mapper;

class MapController extends Controller
{
    public function index()
		{
			Mapper::map(10.030938, 105.769021);

			return view('map.index');
		}

}
