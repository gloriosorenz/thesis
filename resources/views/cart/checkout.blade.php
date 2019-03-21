@extends('layouts.web')
<style>

.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}

</style>

@section('content')

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

{{-- <div class="container">
<h1 class="checkout-heading stylish-heading">Checkout</h1>
    <div class="checkout-section">
        <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
        @csrf
            <div class="checkout-table-container">
            <h2>Your Order/s</h2>
                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
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
                <span class="checkout-totals-total">Total Price: ₱{{ Cart::instance('default')->subtotal() }}</span>
            </div> <!-- end checkout-totals -->
            <hr>
            <button type="submit" id="complete-order" class="btn btn-md btn-success">Complete Order</button>
        </form> <!-- end from -->
    </div> <!-- end checkout-section -->
</div> <!-- end container --> --}}

<div class="container" id="invoice_container">
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-title">
                <h3>Order #</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong>Sold To:</strong><br>
                        {{auth()->user()->first_name}} {{auth()->user()->last_name}}<br>
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                    <strong>Your Company:</strong><br>
                        {{auth()->user()->company}}<br>
                    </address>
                </div>
            </div>
            <!-- End Row -->
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        Cash<br>
                        {{auth()->user()->email}}
                    </address>
                </div>
                <div class="col-md-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        {{$order_date->toFormattedDateString()}}<br><br>
                    </address>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Col-md-12 -->
    </div>
    <!-- End Row -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Seller</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Subtotal</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                <tr>
                                    <td>{{ $item->model->products->type }}</td>
                                    <td>{{ $item->model->users->company }}</td>
                                    <td class="text-center">{{ $item->model->presentPrice() }}</td>
                                    <td class="text-center">{{ $item->qty }} kaban/s</td>
                                    <td class="text-right">{{ presentPrice($item->subtotal) }}</td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">$670.99</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">$15</td>
                                </tr> --}}
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Total</strong></td>
                                    <td class="thick-line text-right">₱{{ Cart::instance('default')->subtotal() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                    <!-- End Table -->
                    <a href="{{ route('cart.index') }}" class="btn btn-lg btn-primary">Back to Cart</a> &nbsp;
                    <button type="submit" id="complete-order" class="btn btn-lg btn-success">Complete Order</button>
                    </form> 
                    <!-- End From -->
                </div> 
                <!-- End Panel Body -->
            </div>
            <!-- End Pane -->
        </div>
        <!-- End Col-md-12 -->
    </div>
    <!-- End Row -->
</div>
<!-- End Container -->

@endsection

@section('extra-js')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

@endsection
