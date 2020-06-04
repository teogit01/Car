<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Str;
class CouponController extends Controller
{
    /// Hàm khởi tạo.
    public function __construct(){
        
        parent::__construct();
        $this->middleware('auth');
    }

    // Hàm đỗ dữ liệu của một Khoa ra trang index
    public function index (Request $request)
    {
        $config = [
            'model' => new Coupon(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('admin.coupon.index', ['data' => $data]);
    }


    // get data đổ ra car detail
    public function getData (Request $request) {

        $config = [
            'model' => new Coupon(),
            'request' => $request,
        ];
        $this->config($config);
        
        $data = $this->model->web_index($this->request);

        return $data;
    }


    public function getAdd (Request $request)
    {
        return view('admin.coupon.add');
    }

    public function PostAdd (Request $request)
    {
        $config = [
            'model' => new Coupon(),
            'request' => $request,
        ];
        $this->config($config);
        $this->request['code'] = Str::random(5);
        $data = $this->model->web_insert($this->request);
        
        return redirect('admin/coupon')->with('success', 'Thêm thành công');
    }

    public function getUpdate ($id)
    {
        $coupon =Coupon::findOrFail($id);

        return view('admin.coupon.update', ['coupon' => $coupon]);
    }

    public function postUpdate(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->name = $request->get('name');
        $coupon->code = $request->get('code');
        $coupon->type = $request->get('type');
        $coupon->value = $request->get('value');
        $coupon->description = $request->get('description');
        $coupon->save();
        
        return redirect('admin/coupon')->with('success', 'Cập nhật thành công');
    }

    public function delete(Request $request){
        
        $id =  $request->id;    
        $data = Coupon::findOrFail($id);

        $data->delete();

        $data = Coupon::all();
        
        return view('admin.coupon.getdata', ['data' => $data]);
    }
}
