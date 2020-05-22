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

    public function postRegister(Request $request){
    	
      $config = [
    		'model' => new User(),
    		'request' => $request,
    	];
    	
      $this->config($config);
    
      $data = $this->model->web_insert($this->request);
   		
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
