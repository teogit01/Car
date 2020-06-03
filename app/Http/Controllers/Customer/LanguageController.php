<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class LanguageController extends Controller
{
    public function index(Request $request, $language){
        if($language) 
        {
            Session::put('language', $language);
        }
        return redirect()->back();
    }
}
