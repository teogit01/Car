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
        <h3>Form thêm phiếu thánh toán...</h3>
        <div class="col-sm-11 m-auto form">
            <form action="{{route('coupon.postadd')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="name" class="control-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Phiếu thuê xe..." autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="code" class="control-label">Mã</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="B01" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="type" class="control-label">Loại</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="value" class="control-label">Giá trị</label>
                    <input type="text" class="form-control" id="value" name="value" placeholder="10000" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Miêu tả</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Phiếu thanh toán ..." autocomplete="off">
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('coupon.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
        </div>
    </div>    
@endsection