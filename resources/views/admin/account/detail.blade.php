@extends('admin.index')
@section('content')
<style type="text/css">
    .main { padding: 0 20px; }
    .main-content { width: 100%; display: flex; }
    .main-left { width: 30%; }
    .main-right { width: 70%; }
    table { width: 100%; line-height: 45px }
    th { width: 30%; border-bottom: 1px solid #ddd }
    td { width: 70%; border-bottom: 1px solid #ddd }
    input { width: 100%;background-color: #fff;border: none; }
    input:focus { outline: none; }
    form { width: 100%; }
    .left-content { display: flex; }
</style>
<br>
<div class="main">
    <h2>Profile {{$user->name}}</h2>
    @if($message = Session::get('success'))
    <div class="alert alert-success" role="alert" id='showMessage'
    style="position: fixed;width: 50%;padding: 7px; right: 0;top: 5%;">
    <span>{{$message}}</span>
</div>
@endif        
<hr>
    <div class="main-content">
        <div class="main-left">
            <div class="left-content">
                @if ($user->avatar == null)

                <img src="https://via.placeholder.com/200x250">

                @else

                <img style="width: 210px;height: 250px;" src="{{asset('img/avatars')}}/{{$user->avatar}}">

                @endif
            </div>
            <br>
            <input type="file" name="avatar">
        </div>

        <div class="main-right">

            <table>
                <tr>
                    <th>Tên:</th>
                    <td><input type="text" class="open" name="name" placeholder="{{$user->name}}" value="{{$user->name}}" disabled autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input type="text" class="open" name="email" value="{{$user->email}}" placeholder="{{$user->email}}" disabled autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Sđt:</th>
                    <td><input type="text" class="open" name="tel" value="{{$user->tel}}" disabled placeholder="{{$user->tel}}" autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Địa chỉ:</th>
                    <td><input type="text" class="open" name="address" value="{{$user->address}}" placeholder="{{$user->address}}" disabled autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Tài khoản:</th>
                    <td><input type="text" class="open" name="name" placeholder="{{$user->username}}" value="{{$user->username}}" disabled autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Mật khẩu:</th>
                    <td><input type="text" class="open" name="name" placeholder="{{$user->password}}" value="{{$user->password}}" disabled autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Cấp độ:</th>
                    <td><input type="text" class="open" name="name" placeholder="{{$user->role}}" value="{{$user->role}}" disabled autocomplete="off"></td>
                </tr>
            </table>
            
        </div>
    </div>
</div>  
<script type="text/javascript">

    $('#edit').on('click',function(){
        $('.open').removeAttr("disabled");
        $('.open')[0].focus();
    })

</script>
@endsection