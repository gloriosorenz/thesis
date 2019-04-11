@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Products</li>
  </ol>
</nav>

<br>
<br>


<!-- Product List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
    <h2 class="title">Products for Season {{$season->id}}</h2>
    </div>
    <div class="card-body">
        <table id="product_lists_table" class="table table-bordered">
            @if(count($product_lists) > 0)
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Product Type</th>
                    <th width="">Rice Farmer</th>
                    <th width="">Original Quantity</th>
                    <th width="">Current Quantity</th>
                    <th width="">Harvest Date</th>
                    <th width="">Price per Kaban</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product_lists as $list)
                <tr class="tr">
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->orig_products->type }}</td>
                    <td>{{ $list->users->first_name}} {{ $list->users->last_name}}</td>
                    <td>{{ $list->orig_quantity }}</td>
                    <td>{{ $list->curr_quantity }}</td>
                    <td>{{ $list->harvest_date }}</td>
                    <td>{{ $list->presentPrice() }}</td>
                    <td>
                        @if(!Auth::guest())
                            @if(Auth::user()->id == $list->users->id)
                                <a href="/product_lists/{{$list->id}}" class="btn btn-secondary">Edit</a>
                            @elseif(Auth::user()->roles_id == 1)
                                <a href="/product_lists/{{$list->id}}" class="btn btn-secondary">Edit</a>
                            @endif
                        @endif
                    </td>
                </tr>
                @endforeach
            @else
                <p>No products found</p>
            @endif
        </table>
    </div>
</div>

{{-- @if(!Auth::guest())
@if(Auth::user()->id == $product_lists->rice_farmers->users->id)

@endif
@endif --}}
@endsection
