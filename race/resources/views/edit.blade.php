<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<div>Edit racer</div>

<form  method="POST" action="/racers/{{$racer['racerId']}}/edit">

{!!csrf_field() !!}
	<label>Age:
	<input type="number" name="age" value="{{$racer['age']}}">
	</label>

	<label>Name:
	<input type="text" name="name" value="{{$racer['name']}}">
	</label>
	
		
	<button type="submit" name="update">Update</button>
	<a href="/racers"> Cancel</a>
	</form>
	
</body>
</html>