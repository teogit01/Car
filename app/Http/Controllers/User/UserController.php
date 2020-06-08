<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\CarDetail;
use App\Models\Comment;

class UserController extends Controller
{
	public function __construct(){
    	parent::__construct();
        //$this->middleware('auth');
    }

    public function index() {
        
        $cars = CarDetail::all();
        $comments = Comment::all();

    	return view('user.index',['cars'=>$cars,'comments'=>$comments]);
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
    // Delete Comment
    public function commentDel(Request $request){
        //return $request->userId;
        $comment = Comment::find($request->commentId);
        if ($request->userId == Auth::id()){
            $comment->delete();
            $comments = Comment::all();
            return view('user.updateComment',['comments'=>$comments]);
        } else {
            $comments = Comment::all();
            return view('user.updateComment',['comments'=>$comments]);
        }
    }
    // Profile
    public function profile(){
        return 'ok';
    }
}
