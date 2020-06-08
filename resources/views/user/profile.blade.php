@extends('user.layouts.index')
@section('banner')
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
		<form method="post" action="{{route('profile.edit',Auth::id())}}" enctype="multipart/form-data">
		@csrf
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
							<th>Your name:</th>
							<td><input type="text" class="open" name="name" placeholder="{{$user->name}}" value="{{$user->name}}" disabled autocomplete="off"></td>
						</tr>
						<tr>
							<th>Email:</th>
							<td><input type="text" class="open" name="email" value="{{$user->email}}" placeholder="{{$user->email}}" disabled autocomplete="off"></td>
						</tr>
						<tr>
							<th>Phone:</th>
							<td><input type="text" class="open" name="tel" value="{{$user->tel}}" disabled placeholder="{{$user->tel}}" autocomplete="off"></td>
						</tr>
						<tr>
							<th>Address:</th>
							<td><input type="text" class="open" name="address" value="{{$user->address}}" placeholder="{{$user->address}}" disabled autocomplete="off"></td>
						</tr>
					</table>
					<br>
					<div style="text-align: right;margin-right: 100px;">
						<a class="btn btn-info" style="border-radius: 0px;color: #fff" id='edit'>Edit</a>
						<button class="btn btn-primary" style="border-radius: 0px;">Save</button>
					</div>
				
				</div>
			</div>
		</form>
	</div>	
	<script type="text/javascript">

		$('#edit').on('click',function(){
			$('.open').removeAttr("disabled");
			$('.open')[0].focus();
		})
		$(document).ready(function(){
            setTimeout(function(){
                $('#showMessage').hide()            
            },2000)
        })
	</script>
@endsection
@section('main')
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

@endsection
