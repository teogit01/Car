<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarDetail;
use App\Models\Comment;

class UserController extends Controller
{
	public function __construct(){
    	parent::__construct();
        $this->middleware('auth');
    }

    public function index() {
        
        $cars = CarDetail::all();

    	return view('user.index',['cars'=>$cars]);
    }

    public function car(Request $request) {

    	$cars = CarDetail::paginate(1);
        $comments = Comment::all();
    	return view('user.car',['cars'=>$cars,'comments'=>$comments]);
    }

    // Comment
    public function comment(Request $request){

        $comment = new Comment();
        $comment->content = $request->comment;
        $comment->user_id = $request->idUser;
        $comment->car_id = $request->idCar;
        $comment->save();
        $comments = Comment::all();
        //return $comments;
        //return view('user.car');
        return view('user.updateComment',['comments'=>$comments]);
    }
}
