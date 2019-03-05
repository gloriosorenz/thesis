@extends('layouts.web')
@section('content')

{{-- <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Samahan ng Magsasaka Sta. Rosa Laguna Portal</h1>
    <p class="lead">All products are produced by the farmers of Laguna.</p>
</div> --}}
<br>
{{-- JUMBOTRON --}}
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark text-center">
    <div class="col-md-12 px-0">
        <h1 class="display-4 font-bold">Samahan ng Magsasaka <br>Sta. Rosa Laguna RicE-Commerce</h1>
        <p class="lead">All products are produced by the farmers of Laguna.</p>
    </div>
</div>

<div class="container">
    <div class="row">
    @if(count($product_lists) > 0)
        @foreach($product_lists as $product_list)
        <div class="col-md-6">
            <div class="card-deck mb-3 text-center"> 
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $product_list->products->type }}</h4>
                </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">{{ $product_list->presentPrice() }} <small class="text-muted">/ kaban</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>FOR TEST REASONS = Season {{ $product_list->seasons->id }}</li>
                        <li>Available: {{ $product_list->curr_quantity }}</li>
                        <hr>
                        <li>Producer: {{ $product_list->users->company }}</li>
                        <li>Farm Address: {{ $product_list->users->street }}, {{ $product_list->users->barangays->name }}, {{ $product_list->users->cities->name }}, {{ $product_list->users->provinces->name }}</li>
                        </ul>

                        <form method="post" action="{{action('CartController@store')}}">
                                @csrf
                            <input type="hidden" name="id" value="{{ $product_list->id }}">
                            <input type="hidden" name="price" value="{{ $product_list->price }}">
                            <input type="hidden" name="quantity" value="{{ $product_list->curr_quantity }}">

                            <button type="submit" class="btb btn-success btn-lg">Add to Cart</button>
                        </form>                    
                    
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
    @else
        <p>No products found</p>
    @endif
    </div>
    
</div>



    

@endsection