<!DOCTYPE html>
<html>
<head>
	<title>Get Add Car</title>

	<link rel="stylesheet" type="text/css" href="{{asset('src/car/car.style.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

</head>
<body>
	<h2>Add Car</h2>
	<hr>
	<div class="main">
		<div class="right">
			<form>
				<div class="head-form">
					<label>Name:</label>
					<input type="text" name="name" autocomplete="off" class="form-contro">
					<label>Model:</label>
					<select>
						<option class="o"></option>
						<option>1</option>
						<option>1</option>
						<option>1</option>
					</select>
					

					<label>Rental:</label>
					<input type="text" name="name" autocomplete="off" class="form-contro">
					<label>Status:</label>
					<input type="text" name="name" autocomplete="off" class="form-contro">
				</div>

				<br>
				
				<div class="editor">
					<label>Decription:</label>
					<textarea name="editor1" class="editor"></textarea>
				</div>
			</form>
		</div>

		<div class="left">
			<h1>left</h1>	
		</div>
	</div>

	 <script>
        CKEDITOR.replace( 'editor1' );
     </script>

	</body>
</html>