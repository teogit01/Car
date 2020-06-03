<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


        $user = User::where('username',$username)->first();
        if ($user){
          if ( Hash::check($password,$user->password) ){
           if ( $user->user_type_id == 0 ){
            return view('admin.index');
            } else {
            //custom
                return view('custom');
             }
          }
        }
      }
    }


    public function logout(){
      Auth::logout();
      return redirect('login');
    }
}
