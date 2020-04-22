@extends('admin/index')
@section('content')
<style type="text/css">
    .main { width: 100% }
    .title { color: blue; padding-top: 10px }
    .main-content { display: flex; justify-content:flex-start; }
    .left { width: 60%; box-shadow: 1px 1px 10px #ddd; border-radius: 10px; line-height: 45px; padding: 5px 20px;}
    .left table { width: 100%; }
    .left table tr ,.left table td { border-bottom: 1px solid #ddd; }
    input { border: none; width: 80% }
    input:focus { outline: none }
    .right { width: 40% }
    .btn { width: 30%; }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main">
        <div class="title">
            <h3>Thông tin chi tiêt <span style="color: black">{{$data->name}}</span></h3>
        </div>
        <hr>
        <div class="main-content">
            <div class="left">
                <table class="">
                    <tr  ondblclick='edit("nameCar")'>
                        <th>Tên Xe</th>
                        <td>
                            <input type="text" id="nameCar" placeholder="{{$data->name}}" disabled>
                        </td>
                    </tr>

                    <tr>
                        <th>Mã xe</th>
                        <td>code</td>
                    </tr>

                    <tr  ondblclick='edit("typeCar")'>
                        <th>Loại xe</th>
                        <td>
                            <input type="text" id="typeCar" placeholder="{{$data->car_type_id}}" disabled>
                        </td>
                    </tr>
                    
                    <tr  ondblclick='edit("rentalCar")'>
                        <th>Giá Thuê</th>
                        <td>
                            <input type="text" id="rentalCar" placeholder="{{$data->rental}}" disabled>
                        </td>
                    </tr>
                  

                    <tr  ondblclick='edit("numberCar")'>
                        <th>Biển Số</th>
                        <td>
                            <input type="text" id="numberCar" placeholder="{{$data->number}}" disabled>
                        </td>
                    </tr>
                    <tr  ondblclick='edit("statusCar")'>
                        <th>Trạng Thái</th>
                        <td>
                            <input type="text" id="statusCar" placeholder="{{$data->status}}" disabled>
                        </td>
                    </tr>
                    <tr  ondblclick='edit("descriptionCar")'>
                        <th>Mô Tả</th>
                        <td>
                            <input type="text" id="descriptionCar" placeholder="{{$data->description}}" disabled>
                        </td>
                    </tr>
                </table>

                <div style="display:flex;flex-direction:row;justify-content: space-between;">
                    <button class="btn btn-light btn-outline-secondary">Quay Lại</button>
                    <button class="btn btn-info ">Huỷ</button>
                    <button class="btn btn-primary">Lưu</button>
                </div>
            </div>
            <div class="right">
                
            </div>
        </div>
    </div>    
@endsection
@section('js')    
    <script>
        function edit(id){
            //alert(id);
            //$('#'+id).css('display','none')
            $('#'+id).removeAttr("disabled");
            $('#'+id).focus();
        }
        function tet() {
            alert('ye');
        }
    </script>
    <script src="{{asset('js/car_detail.js')}}"></script>
@endsection
