@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Seasons</li>
  </ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>

<div class="wrapper">
    <br>
    <div class="row text-center">
        <div class="col-lg-12">
            <h6><small>CITY COOPERATIVE DEVELOPMENT OFFICE</small> <br>
                <strong>SAMAHAN NG MAGSASAKA STA. ROSA LAGUNA</strong>
            </h6>
        </div>
    </div>

    <br>
    <div class="row text-center">
        <div class="col-lg-12">
            <h3><strong>SEASON {{$season->id}} SALES REPORT</strong></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <strong>
            <p>Season Start: {{$season->season_start}}</p>
            <p>Season End: {{$season->season_end}}</p>
            </strong>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <th width="11.25">Order Product Number</th>
                    <th width="11.25">Order Track Number </th>
                    <th width="11.25">Quantity</th>
                    <th width="11.25">Price per kaban</th>
                    <th width="11.25">Subtotal</th>
                    <th width="11.25">Date of Purchase</th>
                </thead>
                <tbody>
                    @foreach ($allprodperseason as $g)
                    @php
                         $order = App\Order::findOrFail($g->orders_id);
                    @endphp

                    <tr>
                        <td>{{$g->id}}</td>
                        <td>{{$order->tracking_id}}</td>
                        <td>{{$g->quantity}}</td>
                        <td>{{presentPrice($g->price)}}</td>
                        <td>{{presentPrice($g->quantity * $g->price)}}</td>
                        {{-- <td>{{$order->total_price}}</td> --}}
                        <td>{{$g->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach($allprodsum as $sum)
                <p> Total Amount: {{presentPrice($sum)}} </p>
            @endforeach

        </div>
        <!-- End col-lg-12 -->
    </div>
    <!-- End row -->

    <br>
    <br>

    {{-- <div class="row">
        <div class="col-lg-6">
            <p><strong>Submitted By: </strong></p>
        </div>
        <div class="col-lg-6 ">
            <p><strong>Noted By:</strong></p>
        </div>
    </div> --}}
</div>
<!-- End wrapper -->
@endsection
