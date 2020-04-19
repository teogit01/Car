<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/register/style.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>REGISTER</h1>
		<div class='layout'>
			
		</div>
		<div class="main">
			<div>
				
			</div>
			<div class="form">
				<form method="post" action="{{route('postRegister')}}">
					@csrf
					<input type="text" name="name" placeholder="Name" autocomplete="off">
					<br><br>

					<input type="text" name="username" placeholder="Username" autocomplete="off">
					<br><br>

					<input type="text" name="password" placeholder="PassWord" autocomplete="off">
					<br><br>

					<input type="text" name="confirmPass" placeholder="ConfirmPassWord" autocomplete="off">
	
					<br>
					<br>
					<button class="btn btn-block btn-dark">Register</button>
					
					<br>
					
					<img src="{{asset('css/register/icon/facebook.svg')}}">
				</form>
			</div>
		</div>
	</div>
</body>
</html>