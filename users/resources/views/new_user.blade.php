@extends('layout')

@section('main')
<h1>New User</h1>
<form action="/users/create" method="POST">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

	 <label> First Name <input type="text"  name="first_name" placeholder="First Name"> </label>
	 <br>
	 <label> Last Name <input type = "text" name="last_name" placeholder = "Last Name"> </label>
	  <br>
	 <label> Email <input type = "text" name="email" placeholder = "Email"> </label>
	  <br>
	 <label> Phone <input type = "text" name="phone" placeholder = "Phone"> </label>
	 <br>

	 <button type="submit" name="adduser">Add User</button>
</form>
@endsection