@extends('admin.index')
@section('content')
<style type="text/css">
    #wrapper-content { width: 100%; }
    table { width: 100%; color: black }
    table td, table th{
        border-bottom: 1px solid #ddd;
        line-height: 40px;
        padding-left: 15px;
    }   
    .th { width:20%}
    .td { width: 75%}
    table thead { background-color:#fff; border-radius: 10px; }
    .showContent{ box-shadow: 1px 1px 10px #ddd; }
    .action { visibility: hidden; }
    table tr:hover .action { visibility: visible; }
    table tbody tr:hover { background-color: #fff; box-shadow: 1px 1px 20px #ddd; color: green }
    span:hover { cursor: pointer; }

</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="page-wrapper">
    @if($message = Session::get('success'))
        <div id='showMessage' class="alert alert-success" role="alert">
            <p>{{$message}}</p>
            <p class="mb-0"></p>
        </div>
    @endif
    <br>    
    <div style="text-align:center"><h3 style="color:green">Thông Tin Phiếu Đặt</h3></div>
    

    <form method="post" action="#">
        @csrf
        <div class="container-fluid">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <br>
                            <div class="table-responsive" style="box-shadow: 1px 1px 10px #ddd;">
                                <div class="main">
                                    <div class="showContent" style="width: 100%;">
                                    <table class="">
                                            <thead class="">
                                                <tr>
                                                    <th class='th'>Tên Khách Hàng</th>
                                                    <td class='td'>{{$invoice->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th  class='th'>SĐT</th>
                                                    <td class='td'>{{$invoice->phone}}</td>
</tr>
                                                <tr>
                                                    <th class='th'>Ngày Nhận</th>
                                                    <td class='td'>{{$invoice->date}}</td>
</tr>
                                                <tr>
                                                    <th class='th'>Thời Gian Nhận</th>
                                                    <td class='td'>{{$invoice->time}}</td>
</tr>
                                                <tr>
                                                    <th class='th'>Dịch Vụ</th>
                                                    <td class='td'>{{$invoice->service}}</td>
</tr>
                                                <tr>
                                                    <th class='th'>Trạng Thái</th>
                                                    <!-- <td class='td' id='status'>{{$invoice->status}}</td> -->
                                                    <td>
                                                        <select class='form-control' style="width:20%" id='edit-status'>
                                                            <option id='status'>{{$invoice->status}}</option>
                                                            <option> đã nhận cọc</option>
                                                            <option> hoàn thành</option>
                                                            <option> hủy</option>
                                                            
                                                        </select>
                                                        <input style='display:none' type='text' id='invoiceId' value={{$invoice->id}}>
                                                    </td>
</tr>
                                            </thead>
                                            
                                        </table>
                                        <br>
                                        <div style="text-align:center;"><h3 style="color:green">Chi Tiết</h3></div>
                                        <table class="">
                                            <thead class="">
                                                <tr>
                                                    <th>Tên Xe</th>
                                                    <th>Giá Thuê</th>
                                                    <th>Thời Gian</th>
                                                </tr>
                                                @foreach($cars as $index => $car)
                                                <tr>
                                                    <td>{{$car[0]->name}}</td>
                                                    <td>{{$data[$index]->price}}</td>
                                                    <td>{{$data[$index]->quantity}}</td>
                                                </tr>
                                                @endforeach
                                            </thead>
                                        </table>
                                    </div>
                                    
                                </div>    
                            </div>
                            <br>    
                                 <div style="text-align:right;--margin-right:100px">
                                 <a href='{{route("invoice.index")}}' class='btn btn-info' >Quay lại</a>
                                    <!-- <a class='btn btn-info'onclick='duyet({{$invoice->id}},"đã liên hệ")' >Duyệt</a> -->
                                  
                                </div>
                        </div>
                    </div>
                {{-- end div col-sm-6 --}}
                </div> 
            {{-- end div row --}}
            </div>
        {{-- end div white-box --}}
        </div>
    {{-- end div container-fluid --}}
</div>
    {{-- end div page-wrapper --}}
@endsection
    
@section('js')    
    <script>
        $('#edit-status').on('change',function(){
            const status = $('#edit-status').val()
            const invoiceId = $('#invoiceId').val()
        
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/invoice/edit',
                    data : {invoiceId:invoiceId,status:status},
                    success : function(data) {
                        //console.log(data)
                        $('#status').html(data)
                        //alert(data)
                    },
                    error : function() {
                        alert('error')
                    }
                })     
        })
        function duyet(id,status) {
        
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/invoice/edit',
                    data : {invoiceId:id,status:status},
                    success : function(data) {
                        $('#status').html(data)
                        //alert(data)
                    },
                    error : function() {
                        alert('error')
                    }
                })     
        }
    </script>
@endsection

@section('js')
<script>
$(function () 
    $('[data-toggle="tooltip"]').tooltip();
</script>
@endsection
