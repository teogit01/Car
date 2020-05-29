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
        <h3>Form thêm loại khuyến mãi...</h3>
        <div class="col-sm-11 m-auto form">
            <form action="{{route('discounttype.postadd')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="name" class="control-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Sale off 20%" autocomplete="off">
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('discounttype.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
        </div>
    </div>    
@endsection