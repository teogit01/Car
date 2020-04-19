<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarType;

class CarTypeController extends Controller
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
            'model' => new CarType(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('admin.cartype.index', ['data' => $data]);
    }

    public function getAdd (Request $request)
    {
        return view('admin.cartype.add');
    }

    public function PostAdd (Request $request)
    {
        $config = [
            'model' => new CarType(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('admin/cartype')->with('success', 'Thêm thành công');
    }

    public function getUpdate ($id)
    {
        $cartype = CarType::findOrFail($id);

        return view('admin.cartype.update', ['cartype' => $cartype]);
    }

    public function postUpdate(Request $request, $id)
    {
        $cartype = CarType::find($id);
        $cartype->name = $request->get('name');
        $cartype->seating = $request->get('seating');
        $cartype->model = $request->get('model');
        $cartype->save();
        
        return redirect('admin/cartype')->with('success', 'Cập nhật thành công');
    }

    public function delete ($id)
    {
        $data = CarType::findOrFail($id);
        $data->delete();
        // dd($data);
        return back()->with('success', 'Xóa thành công!');
    }
}
