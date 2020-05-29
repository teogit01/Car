@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('coupon.postupdate', $coupon->id)}}" method="POST">
                @csrf
            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="" value="{{$coupon->id}}" disabled>
            </div>
            <div class="form-group">
                <label for="name" class="control-label">Tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$coupon->name}}">
            </div> 
            <div class="form-group">
                <label for="code" class="control-label">Mã</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="" value="{{$coupon->code}}">
            </div>   
            <div class="form-group">
                <label for="type" class="control-label">Loại</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="" value="{{$coupon->type}}">
            </div> 
            <div class="form-group">
                <label for="value" class="control-label">Giá trị</label>
                <input type="text" class="form-control" id="value" name="value" placeholder="" value="{{$coupon->value}}">
            </div>
            <div class="form-group">
                <label for="description" class="control-label">Miêu tả</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="" value="{{$coupon->description}}">
            </div>              
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="{{route('coupon.index')}}" class="btn btn-default">Trờ lại</a>
            </div>
            </form>
        </div>
    </div>    
@endsection