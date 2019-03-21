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
    <div class="container">
    <br>
    <div class="row text-center">
        <div class="col-lg-12">
            <h1><strong>SEASON {{$season->id}} SALES REPORT</strong></h1>
        </div>
    </div>
    <br>
    <br>

    <div class="row">
        <div class="offset-2 col-lg-4">
            <h4>
            <div class="text-left">Season Start: {{$season->season_start}}</div>
            </h4>
        </div>
        <div class="col-lg-4">
            <h4>
                    <div class="text-right">Season End: {{$season->season_end}}</div>
            </h4>
        </div>
    </div>
    
    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <table id="table_id" class="table table-striped">
                <thead>
                    <th width="11.25">Orderss Product Number</th>
                    <th width="11.25">Orders Track Number </th>
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
                        <td>{{$g->quantity}} kaban/s</td>
                        <td>{{presentPrice($g->price)}}</td>
                        <td>{{presentPrice($g->quantity * $g->price)}}</td>
                        {{-- <td>{{$order->total_price}}</td> --}}
                        <td>{{$g->created_at}}</td>
                    </tr>
                    @endforeach 
                    {{-- <tr>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line text-right"><strong>Total Amount: </strong></td>
                        <td class="thick-line text-left">
                                @foreach($allprodsum as $sum)
                                <h4> {{presentPrice($sum)}} </h4>
                            @endforeach
                        </td>
                    </tr> --}}
                </tbody>
            </table>
            <br>
            <br>

            @foreach($allprodquan as $kabs)
                <div class="text-center">
                    <h4> Total Quantity: {{$kabs}} kaban/s</h4>
                </div>
            @endforeach

            @foreach($allprodsum as $sum)
                <div class="text-right">
                    <h4> Total Amount: {{presentPrice($sum)}} </h4>
                </div>
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
</div>
<!-- End wrapper -->
@endsection
