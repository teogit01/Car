<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;

use Cookie;
//use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
 
	 public function __construct()
    {
        //parent::__construct();
    }

    public function index(){
      if (!$this->checkLogin){
        return view('login.index');
      } else {
        return back();
      }
    }

    public function register(){
    	return view('login.register');
    }

    public function postRegister(Request $request){

      $values = $request;
      
      $values['password'] = Hash::make($request->password);
      
      $config = [
    		'model' => new User()
    	];
    	
      $this->config($config);
    
      $data = $this->model->web_insert($values);
   		
      return back();

    }

    public function postLogin(Request $request){

      $username = $request->user;
      $password = $request->pass;
      if( Auth::attempt(['username' => $username, 'password' =>$password])) {
        return redirect('admin');
      } else {
          return redirect('login');
        }
      }
    public function logout(){
      Auth::logout();
      return redirect('login');
    }
}




















