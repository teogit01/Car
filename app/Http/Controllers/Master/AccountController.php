<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
class AccountController extends Controller
{
    // Hàm khởi tạo.
    public function __construct(){
        
        parent::__construct();
        $this->middleware('auth');
    }

    // Hàm đỗ dữ liệu của một Khoa ra trang index
    public function index (Request $request)
    {
        $config = [
            'model' => new User(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('admin.account.index', ['data' => $data]);
    }


    // get data đổ ra car detail
    public function getData (Request $request) {

        $config = [
            'model' => new CarType(),
            'request' => $request,
        ];
        $this->config($config);
        
        $data = $this->model->web_index($this->request);

        return $data;
    }
    // Detail account

    public function detail(Request $request){
        $user = User::find($request->id);
        return view('admin.account.detail',['user'=>$user]);
    }

    
}
