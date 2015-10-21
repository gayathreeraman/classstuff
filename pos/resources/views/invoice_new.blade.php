@extends('layout')

@section('main')
<h1>invoice of </h1>


	<table>
	    <tr>
	        <th>ID</th>
	        <th>Customer Name</th>
	        <th>Total</th>
	        <th>Invoice creation Date</th>
	        <th>Details</th>
	        
	    </tr>
		<tr>
	        <td>ID</td>
	        <td>Customer Name</td>
	        <td>Total</td>
	        <td>Invoice creation Date</td>
	        <td>Details</td>
	        
	    </tr>
	</table>

	<form method="POST">
	<input type="hidden" value="{{csrf_token()}}" name="_token">
	<br>
	<label>Customer Name</label><input type="name" name="first_name">
	
	

	</form>






