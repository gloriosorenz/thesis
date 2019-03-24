@extends('layouts.web')

@section('content')


<div class="container">

<!-- Pending Orders Datatable -->
<div class="card shadow mt-5 mb-4 ">
    <div class="card-header py-3 bg-warning text-white">
        <h2 class="title font-weight-bold">Pending Orders</h2>
    </div>
    <div class="card-body">
        @if (count($pending) > 0)
        <table id="orders_table" class="table table-hover track_tbl">
            <thead>
                <tr>
                    <th>Tracking ID</th>
                    <th>Order Date</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pending as $p)
                    @if ($p->users_id == auth()->user()->id)
                    <tr class="active">
                        <td>{{$p->tracking_id}}</td>
                        <td>{{$p->created_at->toFormattedDateString()}}</td>
                        <td>{{$p->total_price}}</td>
                        <td>
                            <a href="/pdf/invoice/{{$p->id}}" class="btn btn-secondary"><i class="fas fa-download fa-sm text-white"></i></a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @else
            <p>No pending orders</p>
        @endif
    </div>
</div>
    



<!-- Confirmed Orders Datatable -->
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h2 class="title font-weight-bold">Completed Orders</h2>
    </div>
    <div class="card-body">
        @if (count($done) > 0)
        <table id="orders_table" class="table table-hover track_tbl">
            <thead>
                <tr>
                    <th>Tracking ID</th>
                    <th>Order Date</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($done as $order)
                    @if ($order->users_id == auth()->user()->id)
                    <tr class="active">
                        <td>{{$order->tracking_id}}</td>
                        <td>{{$order->created_at->toFormattedDateString()}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>
                            <a href="/pdf/invoice/{{$order->id}}" class="btn btn-secondary"><i class="fas fa-download fa-sm text-white"></i></a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @else
            <p>No confirmed orders</p>
        @endif
    </div>
</div>




<!-- Cancelled Orders Datatable -->
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-danger text-white">
        <h2 class="title font-weight-bold">Cancelled Orders</h2>
    </div>
    <div class="card-body">
        @if(count($cancelled) > 0)
        <table id="orders_table" class="table table-hover track_tbl">
            <thead>
                <tr>
                    <th>Tracking ID</th>
                    <th>Order Date</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cancelled as $order)
                    @if ($order->users_id == auth()->user()->id)
                    <tr class="active">
                        <td>{{$order->tracking_id}}</td>
                        <td>{{$order->created_at->toFormattedDateString()}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>
                            <a href="/pdf/invoice/{{$order->id}}" class="btn btn-secondary"><i class="fas fa-download fa-sm text-white"></i></a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @else
            <p>No cancelled orders</p>
        @endif
    </div>
</div>
    
</div>

@endsection