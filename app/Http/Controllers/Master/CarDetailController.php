<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarDetail;
use App\Models\CarType;
use Illuminate\Support\Arr;

class CarDetailController extends Controller
{
    // Hàm khởi tạo.
    public function __construct()
    {
        parent::__construct();
    }

    // Hàm đỗ dữ liệu của một Khoa ra trang index
    public function index (Request $request)
    {
   
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
        $record->delete();
        
        if ($TypeCarId == 0 ){
            $CarDetail = CarDetail::all();
        } else {
            $CarDetail = CarDetail::where('car_type_id',$TypeCarId)->get();
        }
        $CarDetail = CarDetail::where('car_type_id',10)->get();
        return view('admin.cardetail.getDataFromTypeCar',['data' => $CarDetail ? $CarDetail : '']);
    }
    // Function xem chi tiet xe cu the
    public function detail(Request $request) {
        $CarId = $request->id;
        $CarDetail = CarDetail::find($CarId);
        return view('admin.cardetail.detail',['data'=>$CarDetail]);
    }
}
