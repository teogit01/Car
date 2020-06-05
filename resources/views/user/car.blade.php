@extends('user.layouts.index')
@section('banner')
	@include('user.layouts.banner')
@endsection
@section('main')
	<style type="text/css">
		input { --border: none;--height: 30px; border: 1px solid #ddd; padding-left: 20px; border-radius: 10px }
		input:focus { outline: none; }
		.delComment { cursor: pointer; }
	</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
	<div id="colorlib-main">
		<section class="ftco-section">
			
			@if (isset($amount))
				<div style="margin-top: -50px;"><h3>có '{{ $amount }}' kết quả tìm kím {{ $key }}</h3></div>
			@endif

			<div class="container">
				<div class="row px-md-4">
					@if((count($cars) > 0))
						@foreach($cars as $index => $car)
							<table>
								<tr>
									<td>
										<div class="col-md-12">
											<div class="blog-entry ftco-animate d-md-flex">
												<a href="single.html" class="img img-2" style="background-image: url({{asset('src/user/images/image_1.jpg')}});"></a>
												<div class="text text-2 pl-md-4">
													<h3 class="mb-2"><a href="single.html">{{$car->name}}</a></h3>
													<p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
													<p>{{__('Price') }} : {{$car->rental}}/h</p>
													<p>{{__('Available') }} : 10</p>
													<div class="meta-wrap">
														<p class="meta">
															<!-- <span><i class="icon-calendar mr-2"></i>June 28, 2019</span> -->
															<span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{__('Type') }}</a></span>
															<span><a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="icon-comment2 mr-2"></i>Comment</span></a><input style="border: none;padding-left: 0;background-color: #fff; color: black" disabled type="number" id='count-comment'value='{{count($comments)}}'>
														</p>
														<div class="collapse" id="collapseExample">
															<div class="card card-body" style="border: none;margin-left: 50px;margin-top: -20px">
																<div id='load-comment'>
																@if ($comments)
																@foreach ($comments as $comment)
																<div style="display: flex;">

																	<div style="width: 90%">
																		{{$comment->content}}
																	</div>
		
																	<div style="text-align: right;width: 10%" class="delComment" onclick='delComment()'>. . .</div>
																</div>
																<hr style="margin-top: -3px;color: #eee">
																@endforeach
																@endif
																</div>

																<div style="display: flex;">

																	<input type="text" style="width: 95%" id='comment' name="comment">
																	&nbsp;&nbsp;&nbsp;
																	<img style="width: 25px;height: 25px" src="{{asset('icon/send.png')}}">
																</div>
															</div>
															<div style="text-align: right;margin-right: 20px ">
																<button id='submit' class="btn btn-info btn-light" onclick='comment({{Auth::id()}},{{$car->id}})'>Comment</button>
															</div>
														</div>
													</div>
													<span><a href="{{route('cart.add', $car->id)}}" class="btn btn-info" role="button">Add to cart</a></span>
													<!-- <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p> -->
												</div>
											</div>
										</div>
									</td>
								</tr>
							</table>
						@endforeach
					
					@endif
					
				</div>
				<div class="row">
					<div class="col text-center text-md-left">
						<div class="block-27">
							<ul>
								<li><a href="#">&lt;</a></li>
								<li class="active"><span>1</span></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&gt;</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div><!-- END COLORLIB-MAIN -->
	<script type="text/javascript">
		$('#car').attr("class", "colorlib-active")
		// submit comment
		function comment(idUser,idCar){
			//alert($('#comment').val())
			var comment = $('#comment').val()
			var countComment = parseInt($('#count-comment').val())	
			// var idUser = idUser
			// var idCar = idCar
			$.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: path +'user/car/comment',
                    data : {comment: comment,idUser: idUser, idCar: idCar},
                    success : function(data) {

                        $('#load-comment').html(data)
                        $('#comment').val('')
                        $('#count-comment').val(countComment+1)
                        //alert(data)
                    },
                    error : function(error) {
                        alert('error')
                        //console.log(error)
                    }
                })     
			}
		// Detele comment
		function delComment(){
			alert('delete')
		}
	</script>
@endsection