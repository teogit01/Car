<meta name="csrf-token" content="{{ csrf_token() }}">

<aside id="colorlib-aside" role="complementary" class="js-fullheight">
	<nav id="colorlib-main-menu" role="navigation">
		<ul>
			<li class="colorlib-active"><a href="index.html">Home</a></li>
			<li><a href="{{route('car')}}">Car</a></li>
			<li><a href="travel.html">Page</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="contact.html">Contact</a></li>
			<li><a href="contact.html">
				<img style="width: 30px;height: 30px" src="{{asset('src/user/img/cart.png')}}">
			</a><span>[0]</span></li>
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

