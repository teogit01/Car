<?php

namespace App\Http\Controllers\Master;
use Analytics;
use Spatie\Analytics\Period;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Invoice;
use App\Models\CarDetail;

class StatisticController extends Controller
{
    // Hàm khởi tạo.
    public function __construct()
    {
        parent::__construct();
    }

    // Thống kê doanh thu
    public function sales() 
    {
        $data = [];
        for($i=0; $i<12; $i++) $data[$i] = 0;
        foreach($data as $key => $value) {
            $invoice = Invoice::where('status', 'hoàn thành')->whereMonth('date', $key+1)->get();
            $data[$key] = $invoice->sum('grand_total');
        }

        return $data;
    }

    // Thống  kê lượt truy cập
    public function visits() 
    {
        $data = [];
        $totalVisitorsAndPageViews = Analytics::fetchTotalVisitorsAndPageViews(Period::days(29));
        $data['date'] = $totalVisitorsAndPageViews->pluck('date');
        $data['visitors'] = $totalVisitorsAndPageViews->pluck('visitors');
        $data['pageViews'] = $totalVisitorsAndPageViews->pluck('pageViews');

        $data['fetchTopReferrers'] = Analytics::fetchTopReferrers(Period::days(29));
        
        return $data;
    }

    // Hàm đỗ dữ liệu của một Khoa ra trang index
    public function index ()
    {
        $sales = $this->sales();
        $visits = $this->visits();
        
        return view('admin.statistic.index', compact('sales', 'visits'));
    }
    
}
