<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method = "POST">
    {!! csrf_field() !!}

    <label>Name<input type ="text" name="bandName" placeholder="Band Name"</label>
    <br>
    <label>Location<input type ="text" name="location" placeholder="Location"</label>
    <br>
    <label>Start Date<input type ="text" name="startDate" placeholder="Start Date"</label>
    <br>
    <label>IsActive<input type ="text" name="isActive" placeholder="Is Active"</label>
    <br>
    <button type="submit" name="save">Save </button>
    <a href="/bands">Cancel</a>

</form>
    
</body>
</html>