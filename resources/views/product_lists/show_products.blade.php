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
        {{-- <div class="col-md-6">
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
        </div>  --}}



        <div class="col-md-6">
            <div class="card shadow mb-4">
                <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title"><a href="/product_lists/view_product/{{$product_list->id}}" title="View Product">{{ $product_list->products->type }}</a></h4>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>FOR TEST REASONS = Season {{ $product_list->seasons->id }}</li>
                        <li>Available: {{ $product_list->curr_quantity }}</li>
                        <hr>
                        <li>Producer: {{ $product_list->users->company }}</li>
                        <li>Farm Address: {{ $product_list->users->street }}, {{ $product_list->users->barangays->name }}, {{ $product_list->users->cities->name }}, {{ $product_list->users->provinces->name }}</li>
                    </ul>
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn btn-lg btn-secondary btn-block">{{ $product_list->presentPrice() }} <small class="text-white">/ kaban</small></a>
                        </div>
                        <div class="col">
                                <form method="post" action="{{action('CartController@store')}}">
                                        @csrf
                                    <input type="hidden" name="id" value="{{ $product_list->id }}">
                                    <input type="hidden" name="price" value="{{ $product_list->price }}">
                                    <input type="hidden" name="quantity" value="{{ $product_list->curr_quantity }}">
                                    <button type="submit" class="btb btn-success btn-lg btn-block">Add to Cart</button>
                                </form>     
                            {{-- <a href="#" class="btn btn-lg btn-success btn-block">Add to cart</a> --}}
                        </div>
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