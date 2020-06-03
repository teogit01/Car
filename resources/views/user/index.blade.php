
@extends('user.layouts.index')

@section('main')
	@section('main-car')      
	@if (!empty($cars))
		@foreach ($cars as $car)

		<table>
			<tr>
				<td>
					<div class="col-md-12">
						<div class="blog-entry ftco-animate d-md-flex">
							<a href="single.html" class="img img-2" style="background-image: url({{asset('src/user/images/image_1.jpg')}});"></a>
							<div class="text text-2 pl-md-4">
								<h3 class="mb-2"><a href="single.html">{{$car->name}}</a></h3>
								<p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<p>Price : {{$car->rental}}/h</p>
								<p>Available : 10</p>
								<div class="meta-wrap">
									<p class="meta">
										<!-- <span><i class="icon-calendar mr-2"></i>June 28, 2019</span> -->
										<span><a href="single.html"><i class="icon-folder-o mr-2"></i>Type</a></span>
										<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
									</p>
								</div>
								<span><button class="btn btn-info">Add to cart</button></span>
								<!-- <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p> -->
							</div>
						</div>
					</div>
				</td>
			</tr>
		</table>
		@endforeach
	@endif
	@endsection
	
	@include('user.layouts.main')
	
@endsection
