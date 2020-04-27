@if (!empty($Images))
@foreach($Images as $image)
<div class="image_sub" style="">
	<div class="outlay" style="">
		<p class="btn btn-danger" onclick='delImage({{$data->id}},"{{$image}}")' style="width: 100%;">Delete</p>
	</div>
	<div style="width: 100%; height: 100%;padding: 5px">
		<img src='{{asset("img/cardetail/")}}/{{$image}}' style="">
	</div>
</div>
@endforeach
@endif
<div class="image_sub" style=" z-index: 1">
	<div style="width: 100%; height: 100%;padding: 5px;display: flex;flex-direction: column;justify-content:center;">
		<input type="file" name="images[]" multiple class="btn btn-info" style="width: 100%;;justify-content: center;">
	</div>
</div>
