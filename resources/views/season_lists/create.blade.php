@extends('layouts.app')
@include('partials.add_farmer_javascript')
@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('season_lists.index') }}">Season List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>


<!-- Start Form -->
<form method="post" action="{{action('SeasonListController@store')}}" enctype="multipart/form-data">
@csrf

<!-- Admin Functionality  -->
@if (auth()->user()->roles_id == 1)
<!-- Add Plan/Actual Season  -->
<div class="row">
    <div class="offset-md-2 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Plan For Season</h4>
            </div>
            <div class="card-body">
            <h3>Add Farmer</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Rice Farmer</th>
                        <th>Planned Hectares</th>
                        <th>Planned Number of Farmers</th>
                        <th>Planned Quantity</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="resultbody1">
                    <tr>
                        <td>
                            <select class="form-control" name="users_id[]" id="users_id">
                                <option value="0" selected="true" disabled="True">Select Farmer</option>
                                    @foreach ($users as $key=>$p)
                                        <option value="{{$key}}">{{$p}}</option>
                                    @endforeach
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="planned_hectares[]" value="" /></td>
                        <td><input type="text" class="form-control" name="planned_num_farmers[]" value="" /></td>
                        <td><input type="text" class="form-control" name="planned_qty[]" value="" /></td>
                        <td><input type="button" class="btn btn-danger remove" value="x"></td>
                    </tr>
                </tbody>
            </table>
            <center><input type="button" class="btn btn-lg btn-warning addRow" value="+"></center>
            </div>
        </div>
    </div>
</div>

<!-- Farmer Functionality  -->
@elseif(auth()->user()->roles_id == 2)
<!-- Add Plan For Season -->
<div class="row">
    <div class="offset-md-2 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Farmer</h4>
            </div>
            <div class="card-body">
            <h3>Add Farmer</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Rice Farmer</th>
                        <th>Planned Hectares</th>
                        <th>Planned Number of Farmers</th>
                        <th>Planned Quantity</th>
                    </tr>
                </thead>
                <tbody class="resultbody1">
                    <tr>
                        <td>
                            <input name="users_id[]" type="hidden" value="{{auth()->user()->id}}">
                            {{auth()->user()->first_name}}   {{auth()->user()->last_name}}
                        </td>
                        <td><input type="text" class="form-control" name="planned_hectares[]" value="" /></td>
                        <td><input type="text" class="form-control" name="planned_num_farmers[]" value="" /></td>
                        <td><input type="text" class="form-control" name="planned_qty[]" value="" /></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endif


<!-- Submit Button -->
<div class="row">
    <div class="offset-md-2 col-md-8">
        <button type="submit" class="btn btn-success">Create</button>
    </div>
</div>
</form>
<!-- End Form -->
@endsection