<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function index(){
    	return view('admin.index');
    }

    public function file(){
    	//$path = storage_path('public/img/');
    	//$contents = Storage::url()
    	//$contents = Storage::get($duongdan);
    	//Storage::disk('local')->put('file.txt', 'Contents');
    	$arr = ['a1','a2','a3'];
    	Storage::put('public/imageDel',json_encode($arr));
    	//return 'ok';
    	$files = Storage::get('public/imageDel');
    	$files = json_decode($files);
    	 $files[] = 'a4';
    	 return $files;
    	return Storage::put('public/imageDel',json_encode($arr));

    }
}
