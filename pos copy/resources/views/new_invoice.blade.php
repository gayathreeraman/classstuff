@extends('layout')

@section('main')

<a href="/customer">Home</a>



	<form method="POST">
	<br>
	<br>
	<table border="1" cellpadding="2">
	<tr>
	<th>Qty</th>
	<th>Name</th>
	<th>Cost</th>
	<th>Total</th>
	</tr>
	</tr>
	<tr>
	<td>
	</td>	
	<td>
	</td>	
	<td>
	</td>
	<td>
	</td>	
	</tr>
	<tr>
	<td colspan="2">Invoice Total</td>
	<td colspan="2"></td>
	</table>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="customer_id" value ="{{$customer_id}}">
	<input type="hidden" name="invoice_id" value ="{{$invoice_id}}">
	<label>Quantity</label><input type="text" name="quantity" placeholder="quantity">
	<br>
	<label>Item Name</label>  
	<select name="product",placeholder="name">
	@foreach($items as $item)
	<option value="{{$item->id }}">{{$item->name}}</option>
	@endforeach
	 </select>
	<br>
	<label>Cost</label><input type="text" name="price" placeholder="price">
	<br>
	<label>Total<input type="text" name="total" placeholder="total"></label>
	<br>

<button>Add</button>


@endsection