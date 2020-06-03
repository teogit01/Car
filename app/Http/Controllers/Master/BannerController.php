<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
	public function index(){
		return view('admin.banner.index');
	}
}
