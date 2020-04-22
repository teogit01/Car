@extends('admin.index')
@section('content')

<style type="text/css">
    *{
        font-family: sans-serif;
    }
    .form {
        box-shadow: 1px 1px 10px #ddd;
        padding: 5px 20px;
        border-radius: 10px; 
    } 
    label {
        opacity: 0.8;
        --font-style: italic;
    }
    .form-control{
        border: none;
        border-bottom: 1px solid #eee;
        padding-left: 50px
    }
    .form-control::placeholder{
        font-style: italic;
        font-size: 13px;
    }
</style>

    <div class="row">
        <h3>Form thêm xe...</h3>
        <div class="col-sm-11 m-auto form">
            <form action="{{route('cardetail.postadd')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label for="name" class="control-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="VIOS..." autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="rental" class="control-label">Giá</label>
                    <input type="text" class="form-control" id="rental" name="rental" placeholder="99.000 đ" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="number" class="control-label">Biển số</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="83C1-99999" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="frame" class="control-label">Số khung</label>
                    <input type="text" class="form-control" id="frame" name="frame" placeholder="1" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="car_type_id" class="control-label">Loại xe</label>
                    <select name="car_type_id"  class="form-control pull-right">
                        @foreach($cartype as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="control-label">Ảnh</label>
                    <input type="file" id="image" name="images[]" multiple>
                </div>
                <!-- <div class="form-group">
                    <input type="radio" id="0" name="status" value="0" checked>
                    <label for="male">Trống</label>
                    <input type="radio" id="1" name="status" value="1">
                    <label for="female">Đã đặt</label><br>
                </div> -->
                <div class="form-group">
                    <label for="description" class="control-label">Miêu tả</label>
                    <textarea id="description" name="description" rows="4" cols="50">
                    </textarea>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('cardetail.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection