<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarDetail;
use App\Models\CarType;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CarDetailController extends Controller
{
    // Hàm khởi tạo.
    public function __construct() {
        parent::__construct();
        $this->middleware('auth');
    }

    // Hàm đỗ dữ liệu của một Khoa ra trang index
    public function index (Request $request) {
        $CarDetail = CarDetail::all();  
        return view('admin.cardetail.index',['data' => $CarDetail ? $CarDetail : '']);
    }

    // Ajax get DATA where id = type_car_id
    public function getDataFromTypeCar(Request $request){        
        
        $idTypeCar = $request->idTypeCar;
        if ($idTypeCar == 0 ){
            $CarDetail = CarDetail::all();
        } else {
            $CarDetail = CarDetail::where('car_type_id',$idTypeCar)->get();
        }
        //return $request->idTypeCar;
        return view('admin.cardetail.getDataFromTypeCar',['data' => $CarDetail ? $CarDetail : '']);
    }

    public function getAdd (Request $request)
    {
        $cartype = CarType::all();

        return view('admin.cardetail.add', ['cartype' => $cartype]);
    }

    public function postAdd (Request $request) {
        
        $imgs = $request->file('images');
        $this->addImg($imgs);
        // Mang ten hinh
        $nameImgs = $this->nameImgs;
        //return $nameImgs;    
        $config = [
            'model' => new CarDetail(),
            'request' => $request,
        ];

        $this->config($config);

        $dataInserts = [];
        $dataInserts = $request;
        $dataInserts['image'] = json_encode($nameImgs);
    
        $data = $this->model->web_insert($dataInserts);
        
        return redirect('admin/cardetail')->with('success', 'Thêm thành công');
    }

    public function getUpdate ($id)
    {
        $cardetail = CarDetail::findOrFail($id);
        $cartype = CarType::all();

        return view('admin.cardetail.update', ['cardetail' => $cardetail, 'cartype' => $cartype]);
    }

    public function postUpdate(Request $request, $id)
    {
        $cardetail = CarDetail::find($id);
        $cardetail->name = $request->get('name');
        $cardetail->image = $request->get('image');
        $cardetail->rental = $request->get('rental');
        $cardetail->status = $request->get('status');
        $cardetail->description = $request->get('description');
        $cardetail->number = $request->get('number');
        $cardetail->frame = $request->get('frame');
        $cardetail->car_model_id = $request->get('car_model_id');
        $cardetail->save();
        
        return redirect('admin/cardetail')->with('success', 'Cập nhật thành công');
    }

    public function delete(Request $request){
        
        $CarId =  $request->CarId;    
        $TypeCarId = $request->TypeCarId;
        $record = CarDetail::findOrFail($CarId);
        $image = json_decode($record->image);
        foreach ($image as $img){
            File::delete(public_path('img/carDetail').'/'.$img);    
        }
        $record->delete();
        //return $TypeCarId;
        
        if ($TypeCarId == 0 ){
            $CarDetail = CarDetail::all();
        } else {
            $CarDetail = CarDetail::where('car_type_id',$TypeCarId)->get();
        }
        //$CarDetail = CarDetail::where('car_type_id',$TypeCarId)->get();
        return view('admin.cardetail.getDataFromTypeCar',['data' => $CarDetail ? $CarDetail : '']);
    }
    // Function xem chi tiet xe cu the
    public function detail(Request $request) {
        $CarId = $request->id;
        $CarDetail = CarDetail::find($CarId);
        $TypeCar = CarType::all();
        
            $Images = json_decode($CarDetail->image);
            // $collection = collect($Images);
            // $Images = collect($Images)->map(function($img){
                
            //     return asset('/img/cardetail').'/'.$img;
            //     //return storage_path('app/public/img/carDetail/'.$img);
            // });
            //return $Images[0];

        return view('admin.cardetail.detail',['data'=>$CarDetail,'TypeCar'=>$TypeCar,'Images'=>$Images]);
    }

    // Function edit
    public function edit(Request $request) {
        //return $request->name;
        if ($request->hasFile('images')){
            $this->addImg($request->file('images'));
            $imageNews = $this->nameImgs;
        }
        $CarId = $request->id;
        $CarDetail = CarDetail::find($CarId);
        //{ $name, $code } = $request;
        $CarDetail->name = $request->name ? $request->name : $CarDetail->name;
        $CarDetail->code = $request->code ? $request->code : $CarDetail->code;
        $CarDetail->car_type_id = $request->car_type_id;

        $CarDetail->rental = $request->rental ? $request->rental : $CarDetail->rental;
        $CarDetail->status = $request->status ? $request->status : $CarDetail->status;
        $CarDetail->number = $request->number ? $request->number : $CarDetail->number;
        $CarDetail->frame = $request->frame ? $request->frame : $CarDetail->frame;
        $CarDetail->description = $request->description;

        // edit image
        $imageDels = json_decode(Storage::get('public/imageDels.txt'));
        if (!empty($imageDels)){
            foreach ($imageDels as $img){
               File::delete(public_path('img/carDetail').'/'.$img);
            }
            Storage::put('public/imageDels.txt','');
            $imageRemain = Storage::get('public/imageRemain.txt');
            $CarDetail->image = $imageRemain;
            Storage::put('public/imageRemain.txt','');
    
        }
        // add new image
        if (!empty($imageNews)){
            $images = json_decode($CarDetail->image);
            foreach ($imageNews as $img){
                $images[] = $img;
            }
            $CarDetail->image = $images;
        }                
        $CarDetail->save();
        return back()->with('success','Sửa thành công!');
    }
    
    //Function edit Image
    public function imageEdit(Request $request) {

        $CarId = $request->CarId;
        $image = $request->Image;

        $CarDetail = CarDetail::find($CarId);
        // xu ly nut huy
        if ($image == 'null'){
            if (Storage::exists('public/imageDels.txt')) {
                //Storage::delete('public/imageDels.txt');
                Storage::put('public/imageDels.txt','');
                Storage::put('public/imageRemain.txt','');
            }
            $newImages = json_decode($CarDetail->image);
            // $newImages = collect(json_decode($CarDetail->image))->map(function($img){
            //     return asset('/img/cardetail').'/'.$img;
            // });

            return view('admin.cardetail.dataImage',['data'=>$CarDetail,'Images'=>$newImages]);
        }
        // end xu ly nut huy
        $imageOrigins = json_decode($CarDetail->image);

        // array image delete
        $imageDels = json_decode(Storage::get('public/imageDels.txt'));
        $imageDels[] = $image;
        Storage::put('public/imageDels.txt',json_encode($imageDels));

        //$imageRemain = collect($imageOrigins)->diff($imageDels)->all();;
        
        //array image remain
        $imageRemain=[];
        $collection = collect($imageOrigins)->diff($imageDels)->toArray();
        
        foreach($collection as $collect){
            $imageRemain[] = $collect;
        }
        Storage::put('public/imageRemain.txt',json_encode($imageRemain));

        // array remain only 1 image
        if (count($imageDels)==count($imageOrigins)){
            Storage::put('public/imageRemain.txt','');
        }
         
        $imageRemain = json_decode(Storage::get('public/imageRemain.txt'));

        return view('admin.cardetail.dataImage',['data'=>$CarDetail,'Images'=>$imageRemain]);
    }
    // Function add new image
    public function imageAdd(Request $request){
        //return 'd';
        //return $request->id;
        //return 'ok';
        return $im = $request->file('images');
        return $request->images;
        return view('admin.cardetail.dataImage',['Images'=>$imageRemain]);   
    }
    // Function reset Image Delete
    public function resetImageDel(){
        if (Storage::exists('public/imageDels.txt')) {
            //Storage::deleteDirectory('public/imageDels.txt');
            //Storage::delete('public/imageDels.txt');
            Storage::put('public/imageDels.txt','');
            Storage::put('public/imageRemain.txt','');
            return true;
        } 
        
    }
}
