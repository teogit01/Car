
@extends('admin/index')
@section('content')
<style type="text/css">
    .main { width: 100%; display: flex;flex-direction:column;}
    .title { color: blue; padding-top: 10px;}
    .main-content { display: flex; flex-direction: row; width: 100%; height: 100%;  }
    .left { width: 59%; box-shadow: 1px 1px 10px #ddd; border-radius: 10px; line-height: 45px; padding: 5px 20px;max-height: 410px; height: 410px}
    .left table { width: 100%;}
    .left table tr ,.left table td { border-bottom: 1px solid #ddd; }
    input, textarea { border: none; width: 80 color:green; }
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
        <div class="title">
            <h3>Thông tin chi tiêt <span style="color: black">{{$data->name}}</span></h3>

            @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert" id='showMessage'
                style="position: fixed;width: 50%;padding: 7px; right: 0;top: 9%;">
                <span>{{$message}}</span>
            </div>
            @endif        
        </div>
            <hr>
        <div class="main-content">
            <div class="left">
                <form action="{{route('cardetail.edit',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="">
                    <tr  ondblclick='edit("nameCar")'>
                        <th>Tên Xe</th>
                        <td>
                            <input type="text" id="nameCar" name='name'placeholder="{{$data->name}}" disabled>
                        </td>
                    </tr>
                    <tr  ondblclick='edit("codeCar")'>
                        <th>Mã xe</th>
                        <td><input type="text" id="codeCar" name='code'placeholder="{{$data->code}}" disabled></td>
                    </tr>

                    <tr  ondblclick='edit("typeCar")'>
                        <th>Loại xe</th>
                        <td>
                            <select name="car_type_id" class="form-control" id="typeCar">
                                <option value="{{$data->car_type_id}}">{{$data->car_type_id}}</option>
                                @foreach($TypeCar as $index => $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    
                    <tr  ondblclick='edit("rentalCar")'>
                        <th>Giá Thuê</th>
                        <td>
                            <input type="text" id="rentalCar" name='rental' placeholder="{{$data->rental}}" disabled>
                        </td>
                    </tr>
                  

                    <tr  ondblclick='edit("numberCar")'>
                        <th>Biển Số</th>
                        <td>
                            <input type="text" id="numberCar" name='number' placeholder="{{$data->number}}" disabled>
                        </td>
                    </tr>
                    <tr  ondblclick='edit("statusCar")'>
                        <th>Trạng Thái</th>
                        <td>
                            <input type="text" id="statusCar" name='status' placeholder="{{$data->status}}" disabled>
                        </td>
                    </tr>
                    <tr  ondblclick='edit("descriptionCar")'>
                        <th>Mô tả</th>
                        <td>
                            <textarea id="descriptionCar" name="description" disabled style="font-size: 14px; line-height: 15px; height: 100px; width: 100%">
                                {{$data->description}}
                            </textarea>
                        </td>
                    </tr>
                </table>

                <div style="display:flex;flex-direction:row;justify-content: space-between;">
                    <a href="{{route('cardetail.index')}}" class="btn btn-light btn-outline-secondary">Quay Lại</a>
                    <button type="reset" class="btn btn-info" id='cancel' onclick='delImage({{$data->id}},"null")' >Huỷ</button>
                    <button class="btn btn-primary">Lưu</button>
                </div>

            </div>
            <div class="right">                
               <div class="image showImage" style="">
                    @if (!empty($Images))
                    @foreach($Images as $index => $image)
                    <div class="image_sub" style="">
                        <div class="outlay" style="">
                            <!-- <p class="btn btn-danger" onclick="delImage({{$data->id}},'{{$image}}')" style="width: 100%;">Delete</p> -->
                            <p class="btn btn-danger" onclick='delImage({{$data->id}},"{{$image}}")' style="width: 100%;">Delete</p>
                        </div>
                        <div style="width: 100%; height: 100%;padding: 5px;">
                            <img src='{{asset("img/cardetail/")}}/{{$image}}' style="">
                        </div>
                    </div>
                    @endforeach
                    @endif

                

                    <div class="image_sub" style=" z-index: 1">
                        <div style="width: 100%; height: 100%;padding: 5px;display: flex;flex-direction: column;justify-content:center;">                            
                            <input id='' type="file" name="images[]" multiple class="btn btn-info" style="width: 100%;justify-content: center;">

                        </div>
                   </div>
               </div>
            </div>
            </form>
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
        $(document).ready(function(){
            setTimeout(function(){
                $('#showMessage').hide()            
            },1000)
        })
        // CKEDITOR.replace( 'description' );
        $(document).ready(function(){
            $('.outlay').on('mouseover',function(){
                $(this).css('opacity', '0.4')
                $(this).css('transition','0.3s')
            })
            $('.outlay').on('mouseout',function(){
                $(this).css('opacity','0')
                $(this).css('transition','0.3s')
            })
        })
        // Function delete
        function delImage(id,image) {
            //if (confirm('Bạn có muốn xóa xe này không?')){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'admin/cardetail/image/edit',
                    data : {CarId: id,Image: image},
                    success : function(data) {
                        $('.showImage').html(data)
                        //alert(data)
                    },
                    error : function(error) {
                        alert(error)
                        // console.log(error)
                    }
                })     
            //}
        }
       //  Function add new image
        $('#imageAdd').on('change',function(){
            //alert($('#imageAdd').val())
            //alert(i);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: path +'admin/cardetail/image/add',
                data : {id: $('#imageAdd').val()},
                success : function(data) {
                    //$('.showImage').html(data)
                    alert(data)
                },
                error : function(error) {
                    alert(error)
                }
            })         
        })

        // function reset image delete
        const resetImageDel = function (){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: path +'admin/cardetail/image/edit/resetimagedel',
                success : function(data) {
                        return 
                },
                error : function(error) {
                    alert(error)
                }
            })     
        }
        // $('#cancel').on('click',reload());
        $( window ).on('load',resetImageDel);

    </script>
    <script src="{{asset('js/car_detail.js')}}"></script>
@endsection
