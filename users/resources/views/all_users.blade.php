@extends('layout')

@section('main')
    <h1>All Users</h1>
    <table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($users as $u)
    <td>{{$u->first_name}} {{$u->last_name}}</td>
         <td>{{$u->email}}</td>
         <td>{{$u->phone}}</td>
         <td><a href="/users/{{$u->id}}/update">edit</td>
         {{-- "/users/{{$user->id}}/update" --}}
         <td><a href="/users/{{$u->id}}/delete">delete</td>
         <br>

    <tr>
    <!-- fill in the table rows here -->
    </tr>
    @endforeach
    </table>
    <div>
        <a href="/users/create">New User</a>
        <a href="/users/{{$u->id}}">View user</a>
    </div>
@endsection