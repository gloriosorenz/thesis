@extends('layouts.web')
@section('content')

<br>
<br>
<!-- Jumbotron -->
<div class="jumbotron p-3 p-md-5 rounded text-center">
    <div class="col-md-12 px-0">
        <h1 class="display-4 font-bold">Samahan ng Magsasaka <br>Sta. Rosa Laguna RicE-Commerce</h1>
        <p class="lead">All products are produced by the farmers of Laguna.</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Show Products Datatable -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h2 class="title">Products</h2>
                </div>
                <div class="card-body">
                    <table id="table_id2" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="">Product</th>
                                <th width="">Rice Farmer</th>
                                <th width="">Farm Location</th>
                                <th width="">Harvest Date</th>
                                <th width="">Available</th>
                                <th width="">Price per Kaban</th>
                                @guest
                                    @elseif (auth()->user()->roles_id == 3 || auth()->user()->roles_id == 4 )
                                    <th width="15%">Options</th>
                                @endguest
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_lists as $product_list)
                            <tr class="tr">
                                <td>{{$product_list->curr_products->type}}</td>
                                <td>{{$product_list->users->company}}</td>
                                <td>{{ $product_list->users->barangays->name }}, {{ $product_list->users->cities->name }}, {{ $product_list->users->provinces->name }}</td>
                                <td>{{$product_list->harvest_date}}</td>
                                <td>{{ $product_list->curr_quantity }}</td>
                                <td>
                                    <div class="font-weight-bold">{{ $product_list->presentPrice() }} </div>
                                </td>
                                @guest
                                
                                    @elseif (auth()->user()->roles_id == 3 || auth()->user()->roles_id == 4 )
                                    <td>
                                        <form method="post" action="{{action('CartController@store')}}">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $product_list->id }}">
                                            <input type="hidden" name="price" value="{{ $product_list->price }}">
                                            <input type="hidden" name="quantity" value="{{ $product_list->curr_quantity }}">
                                            <button type="submit" class="btn btn-success btn-lg btn-block">Add to Cart</button>
                                        </form>  
                                    </td>
                                @endguest
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

     {{-- <div class="row">
    @if(count($product_lists) > 0)
        @foreach($product_lists as $product_list)
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{ $product_list->curr_products->type }}</h4>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>FOR TEST REASONS = Season {{ $product_list->seasons->id }}</li>
                        <li>Available: {{ $product_list->curr_quantity }}</li>
                        <li>Harvest Date: {{ $product_list->harvest_date }}</li>
                        <hr>
                        <li>Producer: {{ $product_list->users->company }}</li>
                        <li>Farm Address: {{ $product_list->users->street }}, {{ $product_list->users->barangays->name }}, {{ $product_list->users->cities->name }}, {{ $product_list->users->provinces->name }}</li>
                    </ul>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-lg btn-secondary btn-block"  disabled>{{ $product_list->presentPrice() }} <small class="text-white">/ kaban</small></button>
                        </div>
                        <div class="col">
                                <form method="post" action="{{action('CartController@store')}}">
                                        @csrf
                                    <input type="hidden" name="id" value="{{ $product_list->id }}">
                                    <input type="hidden" name="price" value="{{ $product_list->price }}">
                                    <input type="hidden" name="quantity" value="{{ $product_list->curr_quantity }}">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">Add to Cart</button>
                                </form>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>No products found</p>
    @endif
    </div> --}}
   
    
</div>



    

@endsection