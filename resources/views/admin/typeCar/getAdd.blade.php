<!DOCTYPE html>
<html>
<head>
	<title>Add type car</title>

	<link rel="stylesheet" type="text/css" href="{{asset('/css/login/styles.cs')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<style type="text/css">

	</style>
</head>
<body>
	<h2>Add</h2>
	<hr>
	<div class="main col-11 d-flex">		
		<div class="left col-8">
		<table class="table table-hover">
			<thead>
				<tr style="font-weight: bold;">
					<td>ID:</td>
					<td colspan="3">Name:</td>
					<td>Action</tb>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>01</td>
					<td>2 Banh</td>
					<td></td>
					<td></td>
					<td>
						<a href="#">edit,</a>
						<a href="#">delete</a>
					</td>
				</tr>
				<tr>
					<td>01</td>
					<td>2 Banh</td>
					<td></td>
					<td></td>
					<td>
						<a href="#">edit,</a>
						<a href="#">delete</a>
					</td>
				</tr>
				<tr>
					<td>01</td>
					<td>2 Banh</td>
					<td></td>
					<td></td>
					<td>
						<a href="#">edit,</a>
						<a href="#">delete</a>
					</td>
				</tr>
				<tr>
					<td>01</td>
					<td>2 Banh</td>
					<td></td>
					<td></td>
					<td>
						<a href="#">edit,</a>
						<a href="#">delete</a>
					</td>
				</tr>
			</tbody>
			
		</table>
		</div>
		<div class="right col-4">
			<form class="">
				<label>Name: </label>
				<input class="form-control" type="text" name="name" autocomplete="off">
				<label>Model: </label>
				<input class="form-control" type="text" name="model" autocomplete="off">
				<label>Seating: </label>
				<select name="seating" class="form-control">
					<option value="2">2</option>
					<option value="4">4</option>
					<option value="7">7</option>
				</select>
				<br>
				<button class="btn btn-secondary" style="width: 100px;">Back</button>
				<button class="btn btn-primary" style="width: 100px;">Add</button>
			</form>
		</div>
	</div>
</body>
</html>