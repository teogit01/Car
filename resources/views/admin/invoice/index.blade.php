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
    <div class="d-flex" style="justify-content: flex-end;margin: 5px;">
            <div>
                <a href="{{route('cartype.add')}}"><button class="btn btn-primary" style="width: 90px;color: black;"> Thêm</button>
                </a>
            </div>
    </div>

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
                                                    <th>Mã</th>
                                                    <th>Tên Người Đặt</th>
                                                    <th>Số Điện Thoại</th>
                                                    <th>Ngày Nhận</th>
                                                    <th>Thời Gian Nhận</th>
                                                    <th>Dịch Vụ</th>
                                                    <th>Trạng Thái</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            @if (isset($data))
                                            @foreach ($data as $item)
                                            <tr ondblclick="detail({{$item->id}})">
                                                <td>{{$item['id']}}</td>
                                                <td>{{$item['name']}}</td>
                                                
                                                <td>{{$item['phone']}}</td>
                                                <td>{{$item['date']}}</td>
                                                <td>{{$item['time']}}</td>
                                                <td>{{$item['service']}}</td>
                                                <td>{{$item['status']}}</td>
                                                
                                                {{-- @if (Auth::user()->hasRole('Admin')) --}}
                                                <td>
                                                    <div class="">
                                                        <form action="{{ route('cartype.delete', $item->id) }}" method="post" class="delete_form">
                                                            <a  href="{{ action('Master\CarTypeController@getUpdate',$item->id) }}" data-toggle="toolytip" data-placement="top" title="Chỉnh sửa">&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil text-inverse m-r-10 fa-lg"></i></a>

                                                            
                                                        </form>
                                                    </div>
                                                </td>
                                                {{-- @else --}}
                                                {{-- <td></td> --}}
                                                {{-- @endif --}}
                                            </tr>
                                            @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>    
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
 <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){ 
                $('#showMessage').hide()
            }, 2000);
        });
</script>
    <script>
        // Sắp xếp
        // $(document).ready(function() {
        //     $('#myTable').DataTable();
            
        // });
        // Họp thoại cảnh báo xóa
        $(document).ready(function () {
            $('.delete_form').on('submit',function(){
                if(confirm('Bạn có muốn xóa loại xe này không?'))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });
// detail invoice
function detail(id) {
    window.location= path+'admin/invoice/detail/'+id;
}
    </script>
@endsection

@section('js')
<script>
$(function () 
    $('[data-toggle="tooltip"]').tooltip();
</script>
@endsection
