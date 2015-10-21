<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<form  method="POST">

{!!csrf_field() !!}
	<label>Age:
	<input type="number" name="age" placeholder="Age">
	</label>

	<label>Name:
	<input type="text" name="name" placeholder="Name">
	</label>
	
		
	<button type="submit" name="save">Save</button>
	<a href="/racers"> Cancel</a>
	</form>
	
</body>
</html>