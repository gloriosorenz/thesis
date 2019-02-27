@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Farmers</li>
  </ol>
</nav>

<!-- Add User -->
<a class="btn btn-secondary btn-md" href="{{ route('rice_farmers.create') }}">+Add</a>
<br>
<br>

<!-- User List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="title">Farmers</h2>
    </div>
    <div class="card-body">
        <table id="farmers_table" class="table table-hover">
            @if(count($rice_farmers) > 0)
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Name</th>
                    <th width="">Email</th>
                    <th width="">Phone</th>
                    <th width="">Company</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rice_farmers as $rice_farmer)
                <tr class="tr">
                    <td>{{ $rice_farmer->id }}</td>
                    <td>{{ $rice_farmer->first_name }} {{ $rice_farmer->last_name }}</td>
                    <td>{{ $rice_farmer->email }}</td>
                    <td>{{ $rice_farmer->phone }}</td>
                    <td>{{ $rice_farmer->company }}</td>
                    <td>
                        <a href="/rice_farmers/{{$rice_farmer->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="/rice_farmers/{{$rice_farmer->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
