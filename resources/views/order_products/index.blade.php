@extends('layouts.app')


@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/orders') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
</ol>
</nav>
    
<br>

<div class="row">
    <div class="col-lg-12">
        <!-- Pending Order Products Datatable -->
        <div class="card shadow mb-4">
                <div class="card-header py-3 bg-warning text-white">
            <h2 class="title">Pending Order Products</h2>
            </div>
            <div class="card-body">
                <table id="table_id" class="table table-hover track_tbl">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Tracking ID</th>
                            <th>Customer</th>
                            <th>Number</th>
                            <th>Product Type</th>
                            <th>Sub Total</th>
                            <th width="25%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending as $p)
                        <tr class="active">
                            <th>{{$p->orders->id}}</th>
                            <td>{{$p->orders->tracking_id}}</td>
                            <td>{{$p->orders->users->first_name}} {{$p->orders->users->last_name}}</td>
                            <td>{{$p->orders->users->phone}}</td>
                            <td>{{$p->product_lists->orig_products->type}}</td>
                            <td>{{$p->orders->total_price}}</td>
                            <td>
                                <a href="/order_products/confirm_order/{{$p->id}}" class="btn btn-success">Confirm <i class="fas fa-check"></i></a>
                                <a href="/order_products/cancel_order/{{$p->id}}" class="btn btn-danger">Cancel <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Confirmed Order Products Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-success text-white">
                <h2 class="title">Confirmed Order Products</h2>
            </div>
            <div class="card-body">
                <table id="table_id3" class="table table-hover track_tbl">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Tracking ID</th>
                            <th>Customer</th>
                            <th>Number</th>
                            <th>Product Type</th>
                            <th>Sub Total</th>
                            <th width="15%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($confirmed as $c)
                        <tr class="active">
                            <th>{{$c->orders->id}}</th>
                            <td>{{$c->orders->tracking_id}}</td>
                            <td>{{$c->orders->users->first_name}} {{$c->orders->users->last_name}}</td>
                            <td>{{$c->orders->users->phone}}</td>
                            <td>{{$c->product_lists->orig_products->type}}</td>
                            <td>{{$c->orders->total_price}}</td>
                            <td>
                                <a href="/order_products/paid_order/{{$c->id}}" class="btn btn-primary">Paid <i class="fas fa-check"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Cancelled Order Products Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger text-white">
                <h2 class="title">Cancelled Order Products</h2>
            </div>
            <div class="card-body">
                <table id="table_id4" class="table table-hover track_tbl">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Tracking ID</th>
                            <th>Customer</th>
                            <th>Number</th>
                            <th>Product Type</th>
                            <th>Sub Total</th>
                            <th width="15%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cancelled as $c)
                        <tr class="active">
                            <th>{{$c->orders->id}}</th>
                            <td>{{$c->orders->tracking_id}}</td>
                            <td>{{$c->orders->users->first_name}} {{$c->orders->users->last_name}}</td>
                            <td>{{$c->orders->users->phone}}</td>
                            <td>{{$c->product_lists->orig_products->type}}</td>
                            <td>{{$c->orders->total_price}}</td>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <!-- Paid Order Products Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h2 class="title">Paid Order Products</h2>
            </div>
            <div class="card-body">
                <table id="table_id5" class="table table-hover track_tbl">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Tracking ID</th>
                            <th>Customer</th>
                            <th>Number</th>
                            <th>Product Type</th>
                            <th>Sub Total</th>
                            <th width="15%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paid as $p)
                        <tr class="active">
                            <th>{{$p->orders->id}}</th>
                            <td>{{$p->orders->tracking_id}}</td>
                            <td>{{$p->orders->users->first_name}} {{$p->orders->users->last_name}}</td>
                            <td>{{$p->orders->users->phone}}</td>
                            <td>{{$p->product_lists->orig_products->type}}</td>
                            <td>{{$p->orders->total_price}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection