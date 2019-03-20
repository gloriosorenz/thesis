@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
  </ol>
</nav>

<!-- Add User -->
<a class="btn btn-secondary btn-md" href="{{ route('users.create') }}">+Add</a>
<br>
<br>

<!-- User List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h2 class="title">Users</h2>
    </div>
    <div class="card-body">
        <table id="users_table" class="table table-hover">
            @if(count($users) > 0)
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Name</th>
                    <th width="">Email</th>
                    <th width="">Phone</th>
                    <th width="">Role</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="tr">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }} </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->roles->title }}</td>
                    <td>
                        <a href="/users/{{$user->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="/users/{{$user->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            @else
                <p>No users found</p>
            @endif
        </table>
    </div>
</div>
@endsection
