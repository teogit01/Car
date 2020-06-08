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
      $this->request['password'] =  Hash::make($request->password);
      $this->request['role'] = 'Cus';
    
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
           if ( $user->role== 'Admin' ){
            //return view('admin.index');
            return redirect('admin');
            } else {
            //custom
                // return view('user');
              return redirect('user');
             }
          }
        }
      }
    }


    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
