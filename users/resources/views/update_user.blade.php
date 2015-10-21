
@extends('layout')

@section('main')
<h1>Edit User</h1>
{{-- <form action="/users/{{ $user->id }}/update" method="POST">
    create form input fields here
    <label>First Name<input type = "text" value = {{$user['first_name']}}
</form> --}}
<form action="/users/{{$user->id}}/update" method="POST">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

	 <label> First Name <input type="text" name="first_name" value = "{{$user->first_name}}"> </label>
	 <br>
	 <label> Last Name <input type = "text" name="last_name" value = "{{$user->last_name}}"> </label>
	  <br>
	 <label> Email <input type = "text" name="email" value = "{{$user->email}}"> </label>
	  <br>
	 <label> Phone <input type = "text" name="phone" value = "{{$user->phone}}"> </label>
	 <br>

	 <button type="submit" name="edituser">Edit User</button>
</form>
@endsection