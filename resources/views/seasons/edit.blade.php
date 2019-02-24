@extends('layouts.app')
@include('partials.update_farmer_javascript')
@section('content')
{{-- Breadcru,b --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('seasons.index') }}">Seasons</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
{{-- Form --}}
<form method="post" action="{{action('SeasonController@update', $season->id)}}">
@method('PATCH')
@csrf

{{-- Update Season Info --}}
<div class="row">
        <div class="offset-md-1 col-md-8 ">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">New Season</h4>
                <p class="card-category">Update season</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- SEASON TYPE-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="season_types_id">Type:</label>
                            <input readonly="true" type="text" class="form-control" name="" value="{{ $season->season_types->type }}" />
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <!-- START DATE -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="season_start">Season Start:</label>
                            <input readonly="true" type="text" class="form-control" name="" value="{{ $season->season_start }}" />
                        </div>
                    </div>
                    <!-- DATE END -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="season_end">Season End:</label>
                            <div class="col-12">
                                {{ Form::date('season_end', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'season_end'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

{{-- Update Farmer --}}
<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        <h3>Update Farmer/s</h3>
        <table class="table table-bordered" id="table_id">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rice Farmer</th>
                    <th>Actual Hectares</th>
                    <th>Actual Number of Farmers</th>
                    <th>Actual Quantity</th>
                    <th style="text-align:center"><a href="#" class="addRow2"><i class="fas fa-plus"></i></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($season_lists as $list)
                <tr>
                    <td><input readonly class="form-control" type="text" name="id[]" id="id" value="{{$list->id}}"/></td>
                    <td>
                        <select class="form-control" name="rice_farmers_id[]">
                            <option value="0" selected="true" disabled="True">{{ $list->rice_farmers->company }}</option>
                            @foreach ($rice_farmers as $key=>$p)
                                <option value="{{$key}}">{{$p}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="actual_hectares[]" value="{{ $list->actual_hectares }}" /></td>
                    <td><input type="text" class="form-control" name="actual_num_farmers[]" value="{{ $list->actual_num_farmers }}" /></td>
                    <td><input type="text" class="form-control" name="actual_qty[]" value="{{ $list->actual_qty }}" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
    </div>
</div>


{{-- Add Products --}}
<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        <h3>Prducts</h3>
        <table class="table table-bordered" id="table_id">
            <thead>
                <tr>
                    <th>Rice Farmer</th>
                    <th>Product</th>
                    <th>Original Quantity</th>
                    <th>Current Quantity</th>
                    <th>Price</th>
                    <th>Delete</th>
                    <th style="text-align:center"><a href="#" class="addRow"><i class="fas fa-plus"></i></a></th>
                </tr>
            </thead>
            <tbody class="resultbody3">
                <tr>
                    <td>
                        <select class="form-control" name="rice_farmers_id[]" id="rice_farmers_id">
                            <option value="0" selected="true" disabled="True">Select Farmer</option>
                            @foreach ($rice_farmers as $key=>$p)
                                <option value="{{$key}}">{{$p}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="products_id[]" id="products_id">
                            <option value="0" selected="true" disabled="True">Select Product</option>
                            @foreach ($products as $key=>$p)
                                <option value="{{$key}}">{{$p}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="orig_quantity[]" value="" /></td>
                    <td><input type="text" class="form-control" name="curr_quantity[]" value="" /></td>
                    <td><input type="text" class="form-control" name="price[]" value="" /></td>
                    <td><input type="button" class="btn btn-danger remove" value="x"></td>
                </tr>
            </tbody>
        </table>
        <center><input type="button" class="btn btn-lg btn-warning addRow3" value="+"></center>
        <br>
        <br>
    </div>
</div>

{{-- SUBMIT BUTTON --}}
<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</div>
</form>
@endsection