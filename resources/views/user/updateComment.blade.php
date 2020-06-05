<div id='load-comment'>
	@if ($comments)
	@foreach ($comments as $comment)
	<div style="display: flex;">

		<div style="width: 90%">
			{{$comment->content}}
		</div>
		
		<div style="text-align: right;width: 10%">. . .</div>
	</div>
	<hr style="margin-top: -3px;color: #eee">
	@endforeach
	@endif
</div>