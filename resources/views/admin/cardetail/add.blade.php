@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('cardetail.postadd')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="name" class="control-label">Tên:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="VIOS">
                </div>
                <div class="form-group">
                    <label for="rental" class="control-label">Giá:</label>
                    <input type="text" class="form-control" id="rental" name="rental" placeholder="99.000 đ">
                </div>
                <div class="form-group">
                    <label for="number" class="control-label">Biển số:</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="83C1-99999">
                </div>
                <div class="form-group">
                    <label for="frame" class="control-label">Số khung:</label>
                    <input type="text" class="form-control" id="frame" name="frame" placeholder="1">
                </div>
                <div class="form-group">
                    <label for="car_type_id" class="control-label">Loại xe:</label>
                    <select name="car_type_id"  class="form-control pull-right">
                        @foreach($cartype as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="control-label">Ảnh:</label>
                    <input type="file" id="image" name="image">
                </div>
                <div class="form-group">
                    <input type="radio" id="0" name="status" value="0" checked>
                    <label for="male">Trống</label>
                    <input type="radio" id="1" name="status" value="1">
                    <label for="female">Đã đặt</label><br>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Ảnh:</label>
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