@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('cartype.postupdate', $cartype->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id" class="control-label">ID:</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="" value="{{$cartype->id}}" disabled>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Tên:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$cartype->name}}">
                </div>
                <div class="form-group">
                    <?php $seating = [2, 4, 7] ?>
                    <label for="seating" class="control-label">Chỗ ngồi:</label>
                    <select name="seating"  class="form-control pull-right">
                        @foreach($seating as $key => $value)
                            <option value="{{$value}}" @if($value == $cartype->seating) selected @endif>{{$value}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="form-group">
                    <label for="model" class="control-label">Nhãn hiệu:</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="" value="{{$cartype->model}}">
                </div>    
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('cartype.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection