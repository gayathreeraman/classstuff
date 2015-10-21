


@extends('layout')

@section('main')

<h1>Invoices #{{$id}}:</h1>

<table>
    <tr>
        <th>Quantity</th>
        <th>Item</th>
        <th>Cost</th>
        <th>Sub-Total</th>
        <th>Remove</th>
    </tr>

    @foreach($invoice as $lineItem)
    <tr>
        <td>{{$lineItem->quantity}}</td> 
        <td>{{$lineItem->name}}</td>
        <td>{{$lineItem->price}}</td>
        <td>{{$lineItem->subtotal}}</td>
        <td><a href="/invoice/{{ $id}}/deleteItem/{{ $lineItem->itemId}}">Remove</a></td>
    </tr>
    @endforeach

</table>
<h3>Add Below</h3>
<div>
    <form method="POST" action ="{{$id}}/addItem">
    <input type="hidden" value="{{csrf_token()}}" name="_token">
        <br>
        <label>Quantity:</label>
        <input type="number" min="0" name="quantity" style="width:60px"></input>
         <br>
        <label>
        Choose Items:
        </label>
       
        <select name="items" id="">
        @foreach($items as  $item)
        <option value="{{$item->id }}">{{$item->name}}</option>
        @endforeach
        </select>
           <br>
        <button>submit</button> 
    </form>
 
</div>


@endsection