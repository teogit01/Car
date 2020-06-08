@extends('admin/index')
@section('content')
<style type="text/css">
	.main { margin-top: 30px; }
	.img:hover: .del { display: none; }
</style>
<div class="main">
	<form action="{{route('admin.banner.add')}}" method="post" enctype="multipart/form-data">
		@csrf
		<label><button class="btn btn-info">Thêm banner</button></label>
		<input type="file" name="file" class="form-contro">
	</form>
	<hr>
	<div class="" style="width: 100%; display: flex;justify-content: space-around;">
		@if($data)
		@foreach ($data as $banner)
		<div class="" style="width: 30%; position: relative;">
			<div style="text-align: right;">
				<form action="{{route('admin.banner.delete')}}" method="post">
					@csrf
					<button class="btn btn-danger" style="position: absolute;right: 0px;">Delete</button>
					<input style="display: none;" type="text" name="name" value="{{$banner}}">
				</form>
			</div>
			
			<div class="img" style="width: 100%">
				<img style="width: 100%;" src="{{asset('img/banners')}}/{{$banner}}">
			</div>
		</div>
		@endforeach
		@endif

	</div>
</div>
@endsection
    
@section('js')    
    
@endsection






