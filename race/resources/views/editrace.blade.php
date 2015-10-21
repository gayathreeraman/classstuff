<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>


<form  method="POST">

{!!csrf_field() !!}
	<label>NAME:
	<input type="name" name="name"  value="{{$race['raceName']}}">
	</label>

	<label>StartDate:
	<input type="text" name="startdate" value="{{$race['startDate']}}">
	</label>

	<label>Location:
	<input type="text" name="Location" value="{{$race['location']}}">
	</label>

	<label>Length:
	<input type="text" name="Length" value="{{$race['length']}}">
	</label>
	
		
	<button type="submit" name="save">Save</button>
	<a href="/races"> Cancel</a>
	</form>
	
</body>
</html>