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
	table {
		background-color: orange;
		border: solid 15px black;
		padding:15px;
		margin-top:-75px;
	}
	h1 {
		background-color:orange;
		text-align: center;
		width:300px;
		border:solid black 2px;
	}
	</style>
</head>
<body>
	<div>
		<h1>Best Games</h1>
		<table>
		    <tr>
		        <th>ID</th>
		        <th>Name</th>
		        <th>Year</th>
		        <th>Edit</th>
		        <th>Delete</th>
		    </tr>
		    @foreach($games as $game)
			<tr>
		    	<td>{{$game->id}} </td>
		        <td><a href="games/{{$game->id}}">{{$game->name}}</a></td>
		        <td>{{$game->year}}</td>
		        <td><a href=" ">Edit</a></td> 
		        <td><a href=" ">Delete</a></td>
		        <br>
		    </tr>
		    @endforeach
		</table>
	</div>
</body>
</html>