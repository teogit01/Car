<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class login extends Controller
{
	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	return view('login.index');
    }

    public function register(){
    	return view('login.register');
    }

    public function postRegister(Request $req){
    	$config = [
    		'model' => new User(),
    		'request' => $req,
    	];
    	
   		$user = new User();

   		$user->username = $req->user ? $req->user : '';
   		$user->password = $req->password ? $req->password : '';
   		$user->name = $req->name ? $req->name : '';
  		$user->address = $req->address ? $req->address : '';
  		$user->level = 0;
  		
  		$user->save();
  		dd($user);
   		return $user;

    }
}
