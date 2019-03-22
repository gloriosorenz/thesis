@extends('layouts.app')
{{-- @include('partials.update_farmer_javascript') --}}
@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('product_lists.index') }}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>

<!-- Form -->
<form method="post" action="{{action('ProductListController@update', $product_list->id)}}">
@method('PATCH')
@csrf

<!-- Edit Products -->
<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h2 class="card-title">Edit Products</h2>
            </div>
            <div class="card-body">

            <!-- Products -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Original Quantity</th>
                        <th>Current Quantity</th>
                        <th>Price</th>
                        <th>Harvest Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="product_type" value="{{$product_list->orig_products->type}}" disabled/>
                            {{-- <input name="products_id" type="hidden" value="{{$product_list->orig_products->id}}"/> --}}
                        </td>
                        <td><input type="text" class="form-control" name="orig_quantity" placeholder="{{$product_list->orig_quantity}}" /></td>
                        <td><input type="text" class="form-control" name="curr_quantity" placeholder="{{$product_list->curr_quantity}}" /></td>
                        <td><input type="text" class="form-control" name="price" placeholder="{{$product_list->price}}"/></td>
                        <td>
                            {{ Form::date('harvest_date[]', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'harvest_date[]'])}}
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<!-- Submit Button -->
<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</div>
</form>
@endsection