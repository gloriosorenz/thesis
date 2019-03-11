<!DOCTYPE html>
<html>
    
<head>
    <title>Invoice {{\Carbon\Carbon::now()->format('Y-m')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
</head>
<body>
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
                                    {{\Carbon\Carbon::now()->toFormattedDateString()}}<br><br>
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
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td><strong>Item</strong></td>
                                                <td class="text-center"><strong>Seller</strong></td>
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-right"><strong>Totals</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ $item->product_lists->products->type }}</td>
                                                <td>{{ $item->product_lists->users->company }}</td>
                                                <td class="text-center"></td>
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
            
</body>
</html>