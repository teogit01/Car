@extends('user.layouts.index')

@section('main')
	<div id="colorlib-main">
		<section class="ftco-section">
			<div class="container">
				<div class="row px-md-4">
					@if(!empty($cars))
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
															<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
														</p>
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
		function test(){
			alert('ok')
		}
	</script>
@endsection