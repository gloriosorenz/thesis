@extends('layouts.web')

@section('content')

    <div class="cart-section container">
            <p><a href="{{ url('shop') }}">Home</a> / Cart</p>
            <h1>Your Cart</h1>
    
            <hr>
    
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
    
            @if (session()->has('error_message'))
                <div class="alert alert-danger">
                    {{ session()->get('error_message') }}
                </div>
            @endif
    
            @if (sizeof(Cart::content()) > 0)
    
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Farmer Organization</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th class="column-spacer"></th>
                            <th></th>
                        </tr>
                    </thead>
    
                    <tbody>
                        {{-- @foreach(Cart::content() as $x)
                            <td>{{ $x->model->curr_quantity }}</td>
                        

                        @endforeach --}}

                        @foreach (Cart::content() as $item)
                        <tr>
                            <td><a href="{{ url('/product_lists/show_products', [$item->model->slug]) }}">{{ $item->model->products->type }}</a></td>
                            <td>{{ $item->model->rice_farmers->company }}</td>
                            <td>
                                <select class="quantity" data-id="{{ $item->model->curr_quantity }}">
                                    <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                                </select>
                            </td>
                            <td>₱{{ $item->subtotal }}</td>
                            <td class=""></td>
                            <td>
                                <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                                </form>
                            </td>
                        </tr>
    
                        @endforeach
                        <tr>
                            <td class="table-image"></td>
                            <td></td>
                            <td class="small-caps table-bg" style="text-align: right">Total</td>
                            <td>₱{{ Cart::instance('default')->subtotal() }}</td>
                            <td></td>
                            <td></td>
                        </tr>

    
                    </tbody>
                </table>
    
                
                <a href="{{ url('//product_lists/show_products') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
                <a href="#" class="btn btn-success btn-lg">Proceed to Checkout</a>
    
                <div style="float:right">
                    <form action="{{ url('/emptyCart') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                    </form>
                </div>
    
            @else
    
                <h3>You have no items in your shopping cart</h3>
                <a href="{{ url('/product_lists/show_products') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
    
            @endif
    
            <div class="spacer"></div>
    
    </div>
@endsection

@section('extra-js')
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/cart") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/cart') }}';
                  }
                });

            });

        })();

    </script>
@endsection
