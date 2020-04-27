@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('cartype.postadd')}}" method="POST">
                @csrf
                 <div class="form-group">
                        <label for="name" class="control-label">Code:</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Xe 2 bánh">
                </div>
                <div class="form-group">
                        <label for="name" class="control-label">Tên:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Xe 2 bánh">
                </div>
                <div class="form-group">
                    <?php $seating = [2, 4, 7] ?>
                    <label for="seating" class="control-label">Chỗ ngồi:</label>
                    <select name="seating"  class="form-control pull-right">
                        @foreach($seating as $key => $value)
                            <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="form-group">
                    <label for="model" class="control-label">Nhãn hiệu:</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="Toyota">
                </div>    
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('cartype.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection