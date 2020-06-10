@extends('user.layouts.index')
@section('banner')
<style type="text/css">
    .main { width: 100%; display: flex;flex-direction:column;}
    .title { color: blue; padding-top: 10px;}
    .main-content { display: flex; flex-direction: row; width: 100%; height: 100%;  }
    .left { width: 59%; box-shadow: 1px 1px 10px #ddd; border-radius: 10px; line-height: 45px; padding: 5px 20px;max-height: 410px; height: 410px}
    .left table { width: 100%;}
    .left table tr ,.left table td { border-bottom: 1px solid #ddd; }
    input, textarea { border: none; width: 80 color:green; background-color: #fff }
    input:focus { outline: none; color: green }
    .main-content .right { width: 40%; box-shadow: 1px 1px 10px #ddd; border-radius: 0px; margin-left: 1%; max-height: 500px;overflow: scroll; }
    .btn { width: 30%; }
    .image { width: 100%; height: 100%;display: flex;flex-wrap: wrap; align-content: stretch;padding: 5px; }
    img { filter: drop-shadow(1px 1px 10px #ddd);object-fit: fill; width: 100%; height: 100%;}
    .image_sub { background-color:;width: 50%;height: 50%;padding: ;position: relative; }
    .outlay { background-color: black; width: 100%; height: 100%;position: absolute; opacity: 0;padding: 10px;z-index: 1 }
    .outlay:hover { opacity: 0.4;transition: 0.3s; }
    img:hover { transform: scale(0.9); transition: 0.3s; }

</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="main">
        <div class="title" style=>
            <h3>Thông tin chi tiêt <span style="color: black">{{$car->name}}</span></h3>
    <hr>
        </div>
            
            <br>
        <div class="main-content">
            <div class="left">
                <form action="{{route('cardetail.edit',$car->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="">
                    <tr  ondblclick='edit("nameCar")'>
                        <th>Tên Xe</th>
                        <td>
                            <input type="text" id="nameCar" name='name'placeholder="{{$car->name}}" disabled>
                        </td>
                    </tr>
                    <tr  ondblclick='edit("codeCar")'>
                        <th>Mã xe</th>
                        <td><input type="text" id="codeCar" name='code'placeholder="{{$car->code}}" disabled></td>
                    </tr>

                    <tr  ondblclick='edit("typeCar")'>
                        <th>Loại xe</th>
                     
                        <td><input type="text" id="typeCar" name='car_type_id'placeholder="{{$car->cartype->name}}" disabled></td>
                    </tr>
                    
                    <tr  ondblclick='edit("rentalCar")'>
                        <th>Giá Thuê</th>
                        <td>
                            <input type="text" id="rentalCar" name='rental' placeholder="{{$car->rental}}" disabled>
                        </td>
                    </tr>
                  

                    <tr  ondblclick='edit("numberCar")'>
                        <th>Biển Số</th>
                        <td>
                            <input type="text" id="numberCar" name='number' placeholder="{{$car->number}}" disabled>
                        </td>
                    </tr>
                    <tr  ondblclick='edit("statusCar")'>
                        <th>Trạng Thái</th>
                        <td>
                            <input type="text" id="statusCar" name='status' placeholder="{{$car->status}}" disabled>
                        </td>
                    </tr>
                    <tr  ondblclick='edit("descriptionCar")'>
                        <th>Mô tả</th>
                        <td>
                            <textarea id="descriptionCar" name="description" disabled style="font-size: 14px; line-height: 15px; height: 100px; width: 100%">
                                {{$car->description}}
                            </textarea>
                        </td>
                    </tr>
                   
                </table>
           
            </div>
            <div class="right">                
               <div class="image showImage" style="">
                    @if (!empty($Images))
                    @foreach($Images as $index => $image)
                    
                    <div class="image_sub" style="">
                       
                        <div style="width: 100%; height: 100%;padding: 5px;">
                            <img src='{{asset("img/cardetail/")}}/{{$image}}' style="">
                        </div>
                    </div>
                    @endforeach
                    @endif

                

                  
               </div>
            </div>
            </form>
        </div>
    </div>    
    <div>
    <a href="{{route('cart.add', $car->id)}}" class="btn btn-secondary" style="border-radius:4px" role="button">{{__('Add to cart') }}</a>
    </div>
@endsection
@section('main')

@endsection