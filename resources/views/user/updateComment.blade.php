<div id='load-comment'>
	@if (isset($comments))
	@foreach ($comments as $comment)
	<div style="display: flex;">
		
		<div style="width: 15%;">
			{{$comment->user->name}} :
		</div>


		<div style="width: 85%">
			{{$comment->content}}
		</div>
		@if($comment->user_id == Auth::id())
		<div style="text-align: right;width: 10%" class="delComment" onclick='delComment({{$comment->user_id}},{{$comment->id}})'><img style="width: 20px; height: 20px" src="{{asset('icon/eraser.png')}}">
		</div>
		@else
		<div style="text-align: right;width: 10%"></div>
		@endif
	</div>
	<hr style="margin-top: -3px;color: #eee">
	@endforeach
	@endif
</div>