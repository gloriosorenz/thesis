@extends('layouts.web')

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="checkout-heading stylish-heading">Checkout</h1>

        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}

                <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>

            <div class="checkout-table-container">
                <h2>Your Order/s</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            {{-- <img src="{{ productImage($item->model->image) }}" alt="item" class="checkout-table-img"> --}}
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $item->model->products->type }}</div>
                                <div class="checkout-table-item">{{ $item->model->users->company }}</div>
                                <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $item->qty }} kabans</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    <br>
                    @endforeach

                </div> <!-- end checkout-table -->

                    <hr>
                    <span class="checkout-totals-total">Total Price: {{ presentPrice($item->subtotal) }}</span>

                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

@endsection
