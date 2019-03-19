@extends('layouts.app')


@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/orders') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
</ol>
</nav>

<!-- Add Planned Crop -->
{{-- @if (count($seasons) == count($statuses))
    <a class="btn btn-secondary btn-md" href="{{ route('seasons.create') }}">+Add</a>
@else
@endif --}}
    
<br>
<br>

<!-- Pending Orders Datatable -->
<div class="card shadow mb-4 border-left-warning">
    <div class="card-header py-3">
        <h2 class="title">Pending Orders</h2>
    </div>
    <div class="card-body">
        <table id="orders_table" class="table table-hover track_tbl">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pending as $p)
                    {{-- @if ($p->order_products->product_lists->users_id == auth()->user()->id) --}}
                    <tr class="active">
                        <td>{{$p->tracking_id}}</td>
                        <td>{{$p->created_at->toFormattedDateString()}}</td>
                        <td>{{$p->total_price}}</td>
                        <td>
                            <a href="/orders/{{$p->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                            <a href="/orders/confirm_order/{{$p->id}}" class="btn btn-success"><i class="fas fa-check"></i></a>
                            <a href="/orders/cancel_order/{{$p->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>




<!-- Confirmed Orders Datatable -->
<div class="card shadow mb-4 border-left-primary">
    <div class="card-header py-3 ">
        <h2 class="title">Confirmed Orders</h2>
    </div>
    <div class="card-body">
        <table id="orders_table" class="table table-hover track_tbl">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($done as $order)
                <tr class="active">
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at->toFormattedDateString()}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>
                        <a href="/orders/{{$order->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




<!-- Cancelled Orders Datatable -->
<div class="card shadow mb-4 border-left-danger">
    <div class="card-header py-3">
        <h2 class="title">Cancelled Orders</h2>
    </div>
    <div class="card-body">
        <table id="orders_table" class="table table-hover track_tbl">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cancelled as $order)
                <tr class="active">
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at->toFormattedDateString()}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>
                        <a href="/orders/{{$order->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection