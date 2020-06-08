{{-- {{dd($visits['date'])}} --}}
@extends('admin/index')

@section('content')
<div class="row">
  <div class="col-md-6">
    <!-- DOANH THU -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Thống kê doanh thu theo tháng</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- / KẾT THÚC DOANH THU -->
  </div>
  <!-- /.col (LEFT) -->
  <div class="col-md-6">
    <!-- TRÌNH DUYỆT TRUY CẬP -->
    <div class="card card-primary">
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Lượng trình duyệt truy cập</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col (RIGHT) -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h3 class="card-title">Lượt khách truy cập</h3>
          <a href="javascript:void(0);">Xem báo cáo</a>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex">
          <p class="d-flex flex-column">
            <span class="text-bold text-lg">1</span>
            <span>Khách truy cập theo thời gian</span>
          </p>
          <p class="ml-auto d-flex flex-column text-right">
            <span class="text-success">
              <i class="fas fa-arrow-up"></i> 0.01%
            </span>
            <span class="text-muted">kể từ tuần trước</span>
          </p>
        </div>
        <!-- /.d-flex -->
  
        <div class="position-relative mb-4">
          <canvas id="visitors-chart" height="200"></canvas>
        </div>
  
        <div class="d-flex flex-row justify-content-end">
          <span class="mr-2">
            <i class="fas fa-square text-primary"></i> Tuần này
          </span>
  
          <span>
            <i class="fas fa-square text-gray"></i> Tuần trước
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  $(function () {
    //--------------
    //- Doanh thu -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#barChart').get(0).getContext('2d')
    // alert(JSON.stringify(areaChartCanvas));
    var areaChartData = {
      labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      datasets: [
        {
          label               : 'Doanh thu',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {{ json_encode($sales) }}
        },
      ]
    }

    //-------------
    //- Doanh thu  -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp0
    // barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    // //-------------
    // //- Trình duyệt truy cập -
    // //-------------
    // // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome', 
          'IE',
          'FireFox', 
          'Safari', 
          'Opera', 
          'Navigator', 
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })

    //-------------
    //- Khách truy cập  -
    //-------------
    'use strict'

    var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
    }
    
    var mode      = 'index'
    var intersect = true
    var $visitorsChart = $('#visitors-chart')
    var visitorsChart  = new Chart($visitorsChart, {
      data   : {
        labels  : {!! json_encode($visits['date']->map(function($d){return $d->format('d/m/y');})) !!},
        datasets: [{
          type                : 'line',
          data                : {!! json_encode($visits['visitors']) !!},
          backgroundColor     : 'transparent',
          borderColor         : '#007bff',
          pointBorderColor    : '#007bff',
          pointBackgroundColor: '#007bff',
          fill                : false
          // pointHoverBackgroundColor: '#007bff',
          // pointHoverBorderColor    : '#007bff'
        },
          {
            type                : 'line',
            data                : {!! json_encode($visits['pageViews']) !!},
            backgroundColor     : 'tansparent',
            borderColor         : '#ced4da',
            pointBorderColor    : '#ced4da',
            pointBackgroundColor: '#ced4da',
            fill                : false
            // pointHoverBackgroundColor: '#ced4da',
            // pointHoverBorderColor    : '#ced4da'
          }]
      },
      options: {
        maintainAspectRatio: false,
        tooltips           : {
          mode     : mode,
          intersect: intersect
        },
        hover              : {
          mode     : mode,
          intersect: intersect
        },
        legend             : {
          display: false
        },
        scales             : {
          yAxes: [{
            // display: false,
            gridLines: {
              display      : true,
              lineWidth    : '4px',
              color        : 'rgba(0, 0, 0, .2)',
              zeroLineColor: 'transparent'
            },
            ticks    : $.extend({
              beginAtZero : true,
              suggestedMax: 200
            }, ticksStyle)
          }],
          xAxes: [{
            display  : true,
            gridLines: {
              display: false
            },
            ticks    : ticksStyle
          }]
        }
      }
    })
  })
</script>
@endsection