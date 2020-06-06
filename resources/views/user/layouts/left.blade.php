<meta name="csrf-token" content="{{ csrf_token() }}">

<aside id="colorlib-aside" role="complementary" class="js-fullheight">
	<nav id="colorlib-main-menu" role="navigation">
		<ul>
			<li class="home colorlib" id='home'><a href="{{route('home')}}">{{__('Home') }}</a></li>
			<li class="car colorlib" id='car'><a href="{{route('car')}}">{{__('Car') }}</a></li>
			<li class="about colorlib"><a href="{{route('about')}}">{{__('About') }}</a></li>
			<li class="contact"><a href="contact.html">{{__('Contact') }}</a></li>
			<li><a href="{{route('cart.index')}}">
				<img style="width: 30px;height: 30px" src="{{asset('src/user/img/cart.png')}}">
			</a>
				<span>
					<div class="badge badge-danger">
                        @auth
                            {{Cart::session(auth()->id())->getContent()->count()}}
                        @else
                            0
                        @endauth
                    </div></span></li>
			<li>
			<div class="dropdown" style="margin-top: 20px">
				<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{__('Language')}}
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="--text-align: center;border: none;margin-left: 20px;">
					<a class="dropdown-item" style="background-color: #fff" href="{{route('language.index', ['en'])}}">US-UK</a>
					<a class="dropdown-item" style="background-color: #fff" href="{{route('language.index', ['vi'])}}">VN</a>
				</div>
				</div>
			</li>
		</ul>
		
	</nav>

	<div class="colorlib-footer">
		<h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Andrea <span>Moore</span></a></h1>
		<div class="mb-4">
			<h3>Tìm kiếm</h3>
			<form action="{{route('search')}}" class="colorlib-subscribe-form" method="post">
				@csrf
				<div class="form-group d-flex">
					<label for='sm'><div class="icon"><span class="icon-paper-plane"></span></div></label>
					<input type="text" class="form-control" name='key' placeholder="">
					<button style="display: none" type="submit" id='sm' value="{{isset($key) ? $key : ''}}"></button>
				</div>
				<!-- <input class="form-control" id="search" onclick="test()"> -->
			</form>
		</div>
		<p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	</div>
</aside> <!-- END COLORLIB-ASIDE -->
<script type="text/javascript">
	function cli(){
		$('#car').attr('class','active')

	}
	$('.colorlib').each(item=>function(){
		$(this).attr('colorlib-active')
	})
</script>
