@extends('layouts.web')


@section('content')
<div class="p-4">
    <h3>My Orders</h3>
    <table class="table table-bordered track_tbl">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Price</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="active">
                <td>{{$order->id}}</td>
                <td>{{$order->created_at->toFormattedDateString()}}</td>
                <td>{{$order->total_price}}</td>
                <td>
                    <a href="/orders/{{$order->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view">View Order</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@endsection