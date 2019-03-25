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

<a class="btn btn-md btn-secondary" href="{{ route('orders.index') }}">Back</a>
<br>
<br>

@if ( $order->order_statuses_id == 1)
    <a class="btn btn-success btn-md mb-2" href="/orders/confirm_order/{{$order->id}}">Confirm All Orders</a>
    <a class="btn btn-danger btn-md mb-2" href="/orders/cancel_order/{{$order->id}}">Cancel All Orders</a>
    <a class="btn btn-warning btn-md mb-2" href="">Order is incomplete</a>
@endif


<!--  Order Products Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
    <h2 class="title">Order {{ $order->id }}</h2>
    <h5> Tracking Number: {{$order->tracking_id}}</h5>
    </div>
    <div class="card-body">
        <table id="orders_table" class="table table-bordered">
            <thead>
                <tr>
                    <th width="">Product Type</th>
                    <th width="">Seller/Producer</th>
                    <th width="">Contact Person</th>
                    <th width="">Contact Number</th>
                    <th width="">Quantity</th>
                    <th width="">Price</th>
                    <th width="">Subtotal</th>
                    <th width="">Status</th>
                    <th width="20%">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                <tr class="tr">
                    <td>{{ $p->product_lists->curr_products->type }}</td>
                    <td>{{ $p->product_lists->users->company }}</td>
                    <td>{{ $p->product_lists->users->first_name}} {{ $p->product_lists->users->last_name}}</td>
                    <td>{{ $p->product_lists->users->phone }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>{{ presentPrice($p->product_lists->price) }}</td>
                    <td>{{ presentPrice($p->product_lists->price *  $p->quantity)}}</td>
                    <td>{{ $p->order_product_statuses->status}}</td>
                    <td>
                            <a href="/order_products/confirm_order/{{$p->id}}" class="btn btn-success">Confirm <i class="fas fa-check"></i></a>
                            <a href="/order_products/cancel_order/{{$p->id}}" class="btn btn-danger">Cancel <i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection