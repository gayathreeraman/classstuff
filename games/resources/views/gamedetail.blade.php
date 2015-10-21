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
	table{
		background-color: orange;
		border: solid 15px black;
		padding:15px;
	}

	
	</style>
</head>
<body>
<div>

	<div><h1>Game Detail<h1></div>



	<table>
	
	<tr>
	    	<td><p>{{$game->id}}</p></td>
	        <td><p>{{$game->name}}</p></td>
	        <td><p>{{$game->year}}</p></td>
	        
	        <br>
	    </tr>

	 
	</table>
	</div>

	
</body>
</html>