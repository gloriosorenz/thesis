@extends('layouts.web')
@section('content')

{{-- <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Samahan ng Magsasaka Sta. Rosa Laguna Portal</h1>
    <p class="lead">All products are produced by the farmers of Laguna.</p>
</div> --}}
<br>
{{-- JUMBOTRON --}}
<div class="jumbotron p-3 p-md-5 text-dark rounded bg-dark text-center">
    <div class="col-md-12 px-0">
        <h1 class="display-4 font-bold">Samahan ng Magsasaka Sta. Rosa Laguna Portal</h1>
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
                        <li>Producer: {{ $product_list->users->company }}</li>
                        <li>Barangay Location: {{ $product_list->users->barangays->name }}</li>
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


<div class="text-center">
    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100rem;" src="https://images.unsplash.com/photo-1473960716392-f07749249b58?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" alt="">
</div>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-8 mb-5">
        <h2>What We Do</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
        <a class="btn btn-primary btn-lg" href="#">Call to Action &raquo;</a>
        </div>
        <div class="col-md-4 mb-5">
        <h2>Contact Us</h2>
        <hr>
        <address>
            <strong>Start Bootstrap</strong>
            <br>3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
        </address>
        <address>
            <abbr title="Phone">P:</abbr>
            (123) 456-7890
            <br>
            <abbr title="Email">E:</abbr>
            <a href="mailto:#">name@example.com</a>
        </address>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                </div>
                <div class="card-footer">
                <a href="#" class="btn btn-primary">Find Out More!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->



    

@endsection