@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Customers</li>
  </ol>
</nav>

<!-- Add Customer -->
<a class="btn btn-secondary btn-md" href="{{ route('customers.create') }}">+Add</a>
<br>
<br>

<!-- Customer List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="title">Customers</h2>
    </div>
    <div class="card-body">
        <table id="customers_table" class="table table-hover">
            @if(count($customers) > 0)
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Name</th>
                    <th width="">Email</th>
                    <th width="">Company</th>
                    <th width="">Customer Type</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr class="tr">
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->users->first_name }} {{ $customer->users->last_name }} </td>
                    <td>{{ $customer->users->email }}</td>
                    <td>{{ $customer->company }}</td>
                    <td>{{ $customer->customer_types->type }}</td>
                    <td>
                        <a href="/customers/{{$customer->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="/customers/{{$customer->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            @else
                <p>No customers found</p>
            @endif
        </table>
    </div>
</div>
@endsection
