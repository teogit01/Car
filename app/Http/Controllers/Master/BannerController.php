<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
	public function __construct(){
    	parent::__construct();
        //$this->middleware('auth');
    }

	public function index(){
		$data = json_decode(Storage::get('public/banners.txt'));
		//$data ='ok';
		return view('admin.banner.index',['data'=>$data]);
	}

	public function add(Request $request){
		if ($request->has('file')){
			$bn = json_decode(Storage::get('public/banners.txt'));
			if (!empty($bn)){
				foreach ($bn as $banner ){
					$banners[] = $banner;	
				}
			} else {
				$banners=[];
			}
			
			$path = public_path('img/banners');
			$name = Str::random(5).'_'.$request->file->getClientOriginalName();
			$banners[] = $name;
			Storage::put('public/banners.txt',json_encode($banners));
			//return (Storage::get('public/banners.txt'));
			//return $banners;
			//return $name;
			//Storage::put('public/imageDels.txt','');
			$request->file->move($path,$name);
			
			return back();
			//Storage::get('public/imageRemain.txt')
			//File::delete(public_path('img/carDetail').'/'.$img);    
			//Storage::put('public/imageDels.txt','');
		} else { return 'ko';}
		
	}

	public function delete(Request $request){
		//return $request->name;
		$bn = json_decode(Storage::get('public/banners.txt'));
		$banners = [];
		foreach ($bn as $banner){
			if ($banner != $request->name){
				$banners[] = $banner;
			} else {
				File::delete(public_path('img/banners').'/'.$request->name);
			}
		}
		Storage::put('public/banners.txt',json_encode($banners));
		return back();
	}
}
