<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CarDetail;
use App\Models\Comment;

class SearchController extends Controller
{
    public function car(){
    	$cars = CarDetail::all();
    	$name  = [];
    	foreach ($cars as $car)
    		$name[] = $car->name;
    	return $name;
    }	
    public function test(){
    	return view('test');
    }
    // public function getSearch(Request $request){
    //     return $request->key;
    // }
    public function search(Request $request){
        //$cars = CarDetail::where('name','like','%'.$request->key.'%')->orWhere('price',$request->key)->get();
        $cars = CarDetail::where('name','like','%'.$request->key.'%')->paginate(10);
        $comments = Comment::all();
        

        return view('user.car',['cars'=>$cars,'amount'=>count($cars),'key'=>$request->key,'comments'=>$comments]);


    }
}

