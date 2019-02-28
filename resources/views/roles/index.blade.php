@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Roles</li>
  </ol>
</nav>

<!-- Add User -->
<a class="btn btn-secondary btn-md" href="{{ route('roles.create') }}">+Add</a>
<br>
<br>

<!-- Role List Datatable -->
<div class="card">
    <div class="card-header">
        <h2 class="title">Roles</h2>
    </div>
    <div class="card-body">
        <table id="roles_table" class="table table-hover">
            @if(count($roles) > 0)
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Title</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr class="tr">
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->title }}</td>
                    <td>
                        <button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view">View</button>
                    </td> 
                </tr>
                @endforeach
            @else
                <p>No roles found</p>
            @endif
        </table>
    </div>
</div>
@endsection
