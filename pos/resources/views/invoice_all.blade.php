@extends('layout')

@section('main')
<h1>All invoices</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Total</th>
        <th>Invoice creation Date</th>
        <th>Details</th>
        
    </tr>

    @foreach($invoices as $invoice)
    <tr>

        <td>{{ $invoice->id }}</td>
        <td><a href="customer/{{$invoice->c_id}}">{{$invoice->first_name}}{{$invoice->last_name}}</a></td>
        
         <td>{{$invoice->total}}</td>
        <td>{{ $invoice->created_at }}</td>
        <td><a href="invoice/{{ $invoice->id }}">Detail</a></td>
        {{-- <td><a class="edit" href="invoice/{{$invoice->id}}/edit">Edit</a></td> --}}
    </tr>
    @endforeach

</table>

<a href= "{{ URL::to('invoice/new') }}">New Invoice</a>
@endsection