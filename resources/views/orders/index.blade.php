@extends('layouts.web')

@section('content')
<div class="products-section my-orders container">
    <div class="sidebar">

        <ul>
            <li><a href="#">My Profile</a></li>
            <li class="active"><a href="{{ route('orders.index') }}">My Orders</a></li>
        </ul>
    </div> <!-- end sidebar -->
    <div class="my-profile">
        <div class="products-header">
            <h1 class="stylish-heading">My Orders</h1>
        </div>

        <div>
            {{-- @foreach ($orders as $order) --}}
            <div class="order-container">
                <div class="order-header">
                    <div class="order-header-items">
                        <div>
                            <div class="uppercase font-bold">Order Placed</div>
                            <div>date</div>
                        </div>
                        <div>
                            <div class="uppercase font-bold">Order ID</div>
                            <div>ID</div>
                        </div><div>
                            <div class="uppercase font-bold">Total</div>
                            <div>price</div>
                        </div>
                    </div>
                    <div>
                        <div class="order-header-items">
                            <div><a href="#">Order Details</a></div>
                            <div>|</div>
                            <div><a href="#">Invoice</a></div>
                        </div>
                    </div>
                </div>
                <div class="order-products">
                    {{-- @foreach ($order->products as $product) --}}
                        <div class="order-product-item">
                            <div><img src="#" alt="Product Image"></div>
                            <div>
                                <div>
                                    <a href="#">product name</a>
                                </div>
                                <div>price</div>
                                <div>Quantity: </div>
                            </div>
                        </div>
                    {{-- @endforeach --}}

                </div>
            </div> <!-- end order-container -->
            {{-- @endforeach --}}
        </div>

        <div class="spacer"></div>
    </div>
</div>

@endsection