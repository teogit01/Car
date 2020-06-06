<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\CarDetail;
use Illuminate\Support\Str;
class InvoiceController extends Controller
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
            'model' => new Invoice(),
            'request' => $request,
        ];
        $this->config($config);
        $data = $this->model->web_index($this->request);

        return view('admin.invoice.index', ['data' => $data]);
    }


    // get data đổ ra car detail
    public function getData (Request $request) {

        $config = [
            'model' => new Invoice(),
            'request' => $request,
        ];
        $this->config($config);
        
        $data = $this->model->web_index($this->request);

        return $data;
    }

    public function getUpdate ($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('admin.invoice.update', ['invoice' => $invoice]);
    }

    public function postUpdate(Request $request)
    {
        //return $request->status;
        $invoice = Invoice::find($request->invoiceId);
        $invoice->status = $request->status;
        $invoice->save();

        if ($request->status == 'hoàn thành'){
            //return $request->invoiceId;
            $invoice_dt = InvoiceDetail::where('invoice_id','=',$request->invoiceId)->get();
            foreach($invoice_dt as $tl) {
                $car = CarDetail::where('id', '=' ,$tl->car_detail_id)->get();
                $car[0]->status = 0;
                $car[0]->save();

            }
           
        }
       
        //return redirect('admin/invoice')->with('success', 'Cập nhật thành công');
        return $invoice->status;
    }
    // invoice detail
    public function getDetail(Request $request) {
        $invoice = Invoice::find($request->id);
        $invoice_dt = InvoiceDetail::where('invoice_id','=',$request->id)->get();
        foreach($invoice_dt as $tl) {
            $cars[] = CarDetail::where('id', '=' ,$tl->car_detail_id)->get();
        }
        
        //return $invoice_dt;
        return view('admin.invoice.detail',['data'=>$invoice_dt, 'cars'=>$cars,'invoice'=>$invoice]);
       
    }

   
}
