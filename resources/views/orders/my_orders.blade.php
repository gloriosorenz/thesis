@extends('layouts.web')

@section('content')


<!-- Pending Orders Datatable -->
<div class="card shadow mt-5 mb-4 ">
    <div class="card-header py-3 bg-warning text-white">
        <h2 class="title">Pending Orders</h2>
    </div>
    <div class="card-body">
        @if (count($pending) > 0)
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
                    @if ($p->users_id == auth()->user()->id)
                    <tr class="active">
                        <td>{{$p->id}}</td>
                        <td>{{$p->created_at->toFormattedDateString()}}</td>
                        <td>{{$p->total_price}}</td>
                        <td>
                            
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
        <h2 class="title">Confirmed Orders</h2>
    </div>
    <div class="card-body">
        @if (count($done) > 0)
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
                    @if ($order->users_id == auth()->user()->id)
                    <tr class="active">
                        <td>{{$order->id}}</td>
                        <td>{{$order->created_at->toFormattedDateString()}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>
                            {{-- <a href="/orders/{{$order->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a> --}}
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
        <h2 class="title">Cancelled Orders</h2>
    </div>
    <div class="card-body">
        @if(count($cancelled) > 0)
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
                    @if ($order->users_id == auth()->user()->id)
                    <tr class="active">
                        <td>{{$order->id}}</td>
                        <td>{{$order->created_at->toFormattedDateString()}}</td>
                        <td>{{$order->total_price}}</td>
                        <td>
                            <a href="/orders/{{$order->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
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
    


@endsection