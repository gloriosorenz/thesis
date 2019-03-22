@extends('layouts.web')

@section('content')

    <div class="cart-section container">
    <br>
    
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
    
            {{-- <div class="card shadow mb-4">
                <div class="card-header">
                    <h2 class="title">Your Cart</h2>
                </div>
                <div class="card-body"> --}}

        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="invoice-title">
                    <h3>Your Cart</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Farmer Organization</th>
                            <th>Quantity per Kaban</th>
                            <th>Individual Price</th>
                            <th>Subtotal</th>
                            <th class="column-spacer"></th>
                            <th></th>
                        </tr>
                    </thead>
    
                    <tbody>

                        @foreach (Cart::content() as $item)
                        <tr>
                            <td><a href="{{ url('/product_lists/show_products', [$item->model->curr_products->type]) }}">{{ $item->model->curr_products->type }}</a></td>
                            <td>{{ $item->model->users->company }}</td>
                            <td>
                                <div class="cart-table-row-right">
                                    <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->curr_quantity }}">
                                        @for ($i = 1; $i < $item->model->curr_quantity + 1 ; $i++)
                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor                                
                                    </select>
                                </div>
                            </td>
                            <td>{{ $item->model->presentPrice() }}</td>
                            <td>{{ presentPrice($item->subtotal) }}</td>
                            <td>
                                    {{-- <a href="/cart/{{$item->model->id}}/delete" class="btn btn-success"><i class="fas fa-delete"></i></a> --}}
                                    {{-- {{ $item->model->presentPrice() }} --}}

                                <form action=" {{route ('cart.destroy',$item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
    
                                    <button type="submit" class="btn btn-danger btn-md">Remove</button>
                                </form>
                                {{-- <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Remove"> --}}
                                </form>
                            </td>
                        </tr>
    
                        @endforeach
                        <tr>
                            <td class="table-image"></td>
                            <td></td>
                            <td class="small-caps table-bg" style="text-align: right">Total</td>
                            <td>₱{{ Cart::instance('default')->subtotal() }}</td>
                            {{-- <td>₱{{ Cart::instance('default')->subtotal() }}</td> --}}

                            {{-- <td><span class="cart-totals-total">{{ $item->model->presentPrice($newTotal) }}</span></td> --}}
                            <td></td>
                        </tr>

    
                    </tbody>
                </table>
                <a href="{{ url('/product_lists/show_products') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
            <a href="{{ route('checkout.index') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
            </div>
        </div>
                {{-- </div>
            </div> --}}
    
                
                
    
                {{-- <div style="float:right">
                    <form action="{{route ('cart.emptycart') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                    </form>
                </div> --}}
    
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
                const classname = document.querySelectorAll('.quantity')
    
                Array.from(classname).forEach(function(element) {
                    element.addEventListener('change', function() {
                        const id = element.getAttribute('data-id')
                        const productQuantity = element.getAttribute('data-productQuantity')
                        // console.log('error 1');

                        axios.patch(`/cart/${id}`, {
                            quantity: this.value,
                            productQuantity: productQuantity
                        })
                        .then(function (response) {
                            // console.log('error 2');
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            // console.log('error 3');
                            window.location.href = '{{ route('cart.index') }}'
                        });
                    })
                })
            })();
        </script>
     @endsection