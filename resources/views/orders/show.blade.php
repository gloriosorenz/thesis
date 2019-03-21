@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('orders.index') }}">Orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>

<!-- Seasons List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
    <h2 class="title">Order {{ $order->id }}</h2>
    </div>
    <div class="card-body">
        <table id="orders_table" class="table table-bordered">
            {{-- @if(count($order) > 0) --}}
            <thead>
                <tr>
                    <th width="">Product Type</th>
                    <th width="">Seller/Producer</th>
                    <th width="">Quantity</th>
                    <th width="">Price</th>
                    <th width="">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                <tr class="tr">
                    <td>{{ $p->product_lists->products->type }}</td>
                    <td>{{ $p->product_lists->users->company }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>{{ $p->product_lists->price }}</td>
                    <td>{{ presentPrice($p->product_lists->price *  $p->quantity)}}</td>
                    {{-- <td>
                        <a href="/product_lists/{{$list->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="/season_lists/{{$list->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('season_lists.destroy', $list->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            {{-- @else --}}
                {{-- <p>No seasons found</p>
            @endif --}}
        </table>
    </div>
</div>
@endsection