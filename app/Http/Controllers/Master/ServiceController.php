<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
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
            'model' => new Service(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('admin.service.index', ['data' => $data]);
    }

    public function getAdd (Request $request)
    {
        return view('admin.service.add');
    }

    public function PostAdd (Request $request)
    {
        $config = [
            'model' => new Service(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('admin/service')->with('success', 'Thêm thành công');
    }

    public function getUpdate ($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.service.update', ['service' => $service]);
    }

    public function postUpdate(Request $request, $id)
    {
        $service = Service::find($id);
        $service->name = $request->get('name');
        $service->price = $request->get('price');
        $service->save();
        
        return redirect('admin/service')->with('success', 'Cập nhật thành công');
    }


    public function delete(Request $request){
        
        $id =  $request->id;    
        $data = Service::findOrFail($id);

        $data->delete();

        $data = Service::all();
        
        return view('admin.service.getdata', ['data' => $data]);
    }
}
