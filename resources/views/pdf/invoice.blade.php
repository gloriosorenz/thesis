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
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="invoice-title">
                            <h3>Tracking #{{$order->tracking_id}}</h3>
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
                </div> --}}
                <!-- End Row -->
                
                <div class="row">
                    <div class="col-md-12">

                        @foreach ($data as $key => $value)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Order summary </strong></h3>
                            </div>
                            <div class="panel-body">
                                @php
                                    $seller = App\User::findOrFail($key);
                                @endphp

                                <!-- Details -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>{{$value['0']->users->company}}</strong><br>
                                        Contact Number: {{$value['0']->users->phone}}<br>
                                        Location: {{$seller->street}}, {{$seller->barangays->name}}, {{$seller->cities->name}}, {{$seller->provinces->name}} <br>
                                    </div>
                                </div>
                                
                                
                                <br>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td class="text-left"><strong>Item</strong></td>
                                                <td class="text-center"><strong>Seller</strong></td>
                                                <td class="text-center"><strong>Price</strong></td>
                                                <td class="text-center"><strong>Quantity</strong></td>
                                                <td class="text-right"><strong>Totals</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sub_total = 0;
                                            @endphp
                                            @foreach ($value as $v)
                                            @php
                                                $product = App\ProductList::findOrFail($v->product_lists_id);
                                                $seller = App\User::findOrFail($v->farmers_id);
                                                
                                                $sub_total = ($product->price *  $v->quantity) + $sub_total;
                                            @endphp
                                            <tr>
                                                <td class="text-left">{{$product->orig_products->type}}</td>
                                                <td class="text-center">{{$seller->company}}</td>
                                                <td class="text-center">{{$product->price}}</td>
                                                <td class="text-center">{{$v->quantity}} kaban/s</td>
                                                <td class="text-right">{{ presentPrice($v->product_lists->price *  $v->quantity)}}</td>
                                            </tr>
                                            @endforeach
                                            {{-- <tr>
                                                <td class="text-left">{{ $item->product_lists->curr_products->type }}</td>
                                                <td class="text-center">{{ $item->product_lists->users->company }}</td>
                                                <td class="text-center">{{$item->product_lists->price}}</td>
                                                <td class="text-center">{{ $item->quantity }} kaban/s</td>
                                                <td class="text-right">{{ presentPrice($item->product_lists->price *  $item->quantity)}}</td>
                                            </tr> --}}
                                            <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center"><strong>Total</strong></td>
                                                <td class="thick-line text-right">{{presentPrice($sub_total)}}</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                                <!-- End Table -->
                            </div> 
                            <!-- End Panel Body -->
                        </div>
                        <!-- End Panel -->
                        @endforeach

                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-right">
                                    <h3>Total: {{presentPrice($order->total_price)}}<h3>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Col-md-12 -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Container -->
            
</body>
</html>