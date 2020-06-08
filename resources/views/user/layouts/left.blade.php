
<!--Form Login Register-->
<!-- Modal -->

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="main">
					<div class="main-content">
						<form method="post" action="{{route('postLogin')}}">
							@csrf
							<label>UserName:</label>
							<input type="text" name="user" class="form-contro" style="width: 100%;height: 40px;border:1px solid #ddd;border-radius: 5px" placeholder="" autocomplete="off">
							<label>Password:</label>
							<input type="password" style="width: 100%;height: 40px;border:1px solid #ddd;border-radius: 5px" name="pass" class="form-contro" placeholder="" autocomplete="off">

							<br>

							<input type="checkbox" name="remember" value="">
							<span>Remember Me</span>

							<br>
							<br>
							<button type="submit" class="btn btn-block btn-info">Login</button>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!--Register-->
<style type="text/css">
	.t { color: red }
</style>
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Register</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form">
				<form method="post" action="{{route('postRegister')}}">
					@csrf
					<label>Your Name</label> &nbsp;<span class="t">*</span>
					<input type="text" style="width: 100%;height: 40px;border:1px solid #ddd;border-radius: 5px" name="name" placeholder="" autocomplete="off">
					<br>
					<label>Username</label> &nbsp;<span class="t">*</span>
					<input type="text" style="width: 100%;height: 40px;border:1px solid #ddd;border-radius: 5px" name="username" placeholder="" autocomplete="off">
					<br>
					<label>Password</label> &nbsp;<span class="t">*</span>

					<input type="password" style="width: 100%;height: 40px;border:1px solid #ddd;border-radius: 5px" name="password" placeholder="" autocomplete="off">
					<br>
					<label>Comfirm Password</label> &nbsp;<span class="t">*</span>

					<input type="password" style="width: 100%;height: 40px;border:1px solid #ddd;border-radius: 5px" name="confirmPass" placeholder="" autocomplete="off">
	
					<br>
					<br>
					<button class="btn btn-block btn-secondary">Register</button>
					
				</form>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>




<aside id="colorlib-aside" role="complementary" class="js-fullheight">

	<nav id="colorlib-main-menu" role="navigation">
		<ul>
			@if(Auth::check())
			<div style="display: flex; font-size:20px">
				<!-- <img src="https://via.placeholder.com/20" style="width: 40px;height: 40px">&nbsp; -->
				<li class="user colorlib" id='user'><img style="width: 20px; height: 20px;" src="{{asset('icon/person.png')}}"><a style="font-weight: bold;" href="{{route('profile',Auth::id())}}">{{ Auth::user()->name }}</a></li>&nbsp;/&nbsp;
				<li class="user colorlib" id=''><a style="font-size: 15px" href="{{route('logout')}}">{{__('Logout') }}</a></li>
			</div>
			@else 
			<div style="display: flex; font-size:20px">
				<li style="font-size: 20px;" class="user colorlib"><a data-toggle="modal" data-target="#login" href="">{{__('Login') }}</a></li>&nbsp;/&nbsp;

				<li style="font-size: 20px;" class="user colorlib"><a data-toggle="modal" data-target="#register" href="">{{__('Register') }}</a></li>
			</div>
			@endif
			<li class="home colorlib" id='home'><a href="{{route('home')}}">{{__('Home') }}</a></li>
			<li class="car colorlib" id='car'><a href="{{route('car')}}">{{__('Car') }}</a></li>
			<li class="about colorlib"><a href="about.html">{{__('About') }}</a></li>
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
