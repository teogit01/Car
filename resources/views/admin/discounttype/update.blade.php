@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('discounttype.postupdate', $discountType->id)}}" method="POST">
                @csrf
            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="" value="{{$discountType->id}}" disabled>
            </div>
            <div class="form-group">
                <label for="name" class="control-label">Tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$discountType->name}}">
            </div>              
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="{{route('discounttype.index')}}" class="btn btn-default">Trờ lại</a>
            </div>
            </form>
        </div>
    </div>    
@endsection