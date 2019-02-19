@extends('layouts.web')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Samahan ng Magsasaka Sta. Rosa Laguna Portal</h1>
    <p class="lead">All products are produced by the farmers of Laguna.</p>
</div>

<div class="container">
    <div class="row">
    @if(count($product_lists) > 0)
        @foreach($product_lists as $product_list)
        <div class="col-md-4">
            <div class="card-deck mb-3 text-center"> 
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $product_list->products->type }}</h4>
                </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">P{{ $product_list->price }} <small class="text-muted">/ kaban</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>FOR TEST REASONS = Season {{ $product_list->season_lists->seasons->id }}</li>
                        <li>Available: {{ $product_list->curr_quantity }}</li>
                        <li>Producer: {{ $product_list->season_lists->rice_farmers->company }}</li>
                        <li>Barangay Location: {{ $product_list->season_lists->rice_farmers->users->barangays->name }}</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-primary">Add to cart</button>
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