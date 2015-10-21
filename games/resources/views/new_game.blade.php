<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	body{
		background-image: url("https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQqqwONFxyT4ATSXIFP-JJ1GUfFumHPi5JEjg8u5zK2vVI2BNYd");
		background-repeat: no-repeat;
		background-size:100%;
	}
	</style>
</head>
<body>

<form  method="POST">
	<input type = "hidden" name = "_token" value = "{{ csrf_token() }}">

	<label>Name<input type="text" name="name" placeholder="Name"></label>
	<br>
	<label>Year<input type="text" name="year" placeholder="Year"></label>
	<br>
	<button type="submit">Add Game</button>
</form>
</body>
</html>