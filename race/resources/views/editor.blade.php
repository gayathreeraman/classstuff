<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<form  method="POST">

{!!csrf_field() !!}
	<label>Name:
	<input type="text" name="raceName" placeholder="Race Name">
	</label>

	<label>StartDate:
	<input type="text" name="startDate" placeholder="Distance">
	</label>
	<label>Location:
	<input type="text" name="location" placeholder="location">
	</label>
	<label>Length:
	<input type="text" name="length" placeholder="length">
	</label>
		
	<button type="submit" name="save">Save</button>
	<a href="/races"> Cancel</a>
	
</body>
</html>