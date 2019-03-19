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
<form method="post" action="{{action('ProductListController@update', $season->id)}}">
@method('PATCH')
@csrf

<!-- Add Products -->
<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h2 class="card-title">Add Products</h2>
            </div>
            <div class="card-body">

            <!-- Select Season -->
            <div class="row">
                <!-- Season -->
                <div class="col-md-3">
                    <!-- Seasons -->
                    <div class="form-group">
                        <label for="seasons_id">Season:</label>
                        <td>
                            <input type="text" class="form-control" value="Season {{$season->id}}" disabled/>
                            <input name="seasons_id" type="hidden" value="{{$season->id}}">
                        </td>
                    </div>
                </div>
            </div> 

            <!-- Prodcts -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Current Quantity</th>
                        <th>Price</th>
                        <th>Harvest Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_lists as $product)
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="product_type" value="{{$product->products->type}}" disabled/>
                            <input name="products_id[]" type="hidden" value="{{$product->id}}">
                        </td>
                        <td><input type="text" class="form-control" name="curr_quantity[]" value="{{$product->curr_quantity}}"/></td>
                        <td><input type="text" class="form-control" name="price[]" value="{{$product->price}}"/></td>
                        <td>
                            {{ Form::date('harvest_date[]', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'harvest_date[]'])}}
                        </td>
                    </tr>
                    @endforeach
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