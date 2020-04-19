<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarDetail;
use App\Models\CarType;

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
        $config = [
            'model' => new CarDetail(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('admin.cardetail.index', ['data' => $data]);
    }

    public function getAdd (Request $request)
    {
        $cartype = CarType::all();

        return view('admin.cardetail.add', ['cartype' => $cartype]);
    }

    public function PostAdd (Request $request)
    {
        $config = [
            'model' => new CarDetail(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
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

    public function delete ($id)
    {
        $data = CarDetail::findOrFail($id);
        $data->delete();
        // dd($data);
        return back()->with('success', 'Xóa thành công!');
    }
}
