@extends('admin/index')
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

<div id="wrapper-content">
    @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert" id='showMessage'
            style="position: fixed;width: 50%;padding: 7px">
            <span>{{$message}}</span>
        </div>
    @endif
    <div class="d-flex" style="justify-content: flex-end;margin: 5px;">
            <div>
                <a href="{{route('cardetail.add')}}"><button class="btn btn-primary" style="width: 90px;color: black;"> Thêm</button>
                </a>
            </div>
    </div>
    <div>
        <div class="d-flex">
            <select class="form-control" id='select_car'>
                <option value="0">All</option>
            </select>
        </div>
    </div>
    <br>
    <div class="main">
        <div class="showContent" style="width: 100%">
                <table class="">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Biển số</th>
                            <th>Giá</th>
                            <th>Số lượng : {{$data->count()}}</th>
                        </tr>
                    </thead>
                        @if (isset($data))
                            @foreach($data as $index => $item)
                                <tr ondblclick='detail({{$item->id}})'>
                                    <td>{{$index + 1}}</td>
                                    <td>Ảnh</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->number}}</td>
                                    <td>{{$item->rental}}</td>
                                    <td>
                                        <div class="action">
                                            <span onclick='del({{$item->id}})'>Xoá</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                </table>

        </div>
    </div>    
</div>
    
@endsection
    
@section('js')    
    <script>
        // Sắp xếp
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        // Họp thoại cảnh báo xóa
        $(document).ready(function () {
            $('.delete_form').on('submit',function(){
                if(confirm('Bạn có muốn xóa xe này không?'))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });

        $(document).ready(function(){
            setTimeout(function(){
                $('#showMessage').hide()            
            },1000)
        })
        // Function Delete
        function del(id) {
            const TypeCarId = $('#select_car').val()
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url:'http://127.0.0.1:8000/admin/cardetail/delete',
                data : {CarId: id,TypeCarId: TypeCarId},
                success : function(data) {
                    $('.showContent').html(data)
                    //alert(data)
                },
                error : function() {
                    alert('error')
                }
            })
        }
        //Function Detail
        function detail(id) {
            window.location='http://127.0.0.1:8000/admin/cardetail/'+id;
        }
    </script> 

    <script src="{{asset('js/car_detail.js')}}"></script>
@endsection






