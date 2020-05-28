<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountType;

class DiscountTypeController extends Controller
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
            'model' => new DiscountType(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('admin.discounttype.index', ['data' => $data]);
    }

    public function getAdd (Request $request)
    {
        return view('admin.discounttype.add');
    }

    public function PostAdd (Request $request)
    {
        $config = [
            'model' => new DiscountType(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_insert($this->request);
        
        return redirect('admin/discounttype')->with('success', 'Thêm thành công');
    }

    public function getUpdate ($id)
    {
        $discountType = DiscountType::findOrFail($id);

        return view('admin.discounttype.update', ['discountType' => $discountType]);
    }

    public function postUpdate(Request $request, $id)
    {
        $discountType = DiscountType::find($id);
        $discountType->name = $request->get('name');
        $discountType->save();
        
        return redirect('admin/discounttype')->with('success', 'Cập nhật thành công');
    }


    public function delete(Request $request){
        
        $id =  $request->id;    
        $data = DiscountType::findOrFail($id);

        $data->delete();

        $data = DiscountType::all();
        
        return view('admin.discounttype.getdata', ['data' => $data]);
    }
}
