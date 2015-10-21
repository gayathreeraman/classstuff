@extends('layout')

@section('main')
<h1>View User</h1>
<!-- output the user data -->

<p> {{$user->first_name}} {{$user->last_name}} </p>
<p> {{$user->email}} </p>
<p> {{$user->phone}} </p>

<a href="/users/{{$user->id}}/update">edit</a>
<a href="/users/{{$user->id}}/delete">delete</a>

@endsection

