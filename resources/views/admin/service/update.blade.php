@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('service.postupdate', $service->id)}}" method="POST">
                @csrf
            <div class="form-group">
                <label for="id" class="control-label">ID:</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="" value="{{$service->id}}" disabled>
            </div>
            <div class="form-group">
                <label for="name" class="control-label">Tên:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$service->name}}">
            </div>
            <div class="form-group">
                <label for="price" class="control-label">Giá:</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="" value="{{$service->price}}">
            </div>               
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="{{route('service.index')}}" class="btn btn-default">Trờ lại</a>
            </div>
            </form>
        </div>
    </div>    
@endsection