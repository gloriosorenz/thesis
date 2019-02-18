@extends('layouts.app')
@include('partials.add_farmer_javascript')
@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
{{-- FORM --}}
<form method="post" action="{{action('SeasonController@update', $season->id)}}">
@method('PATCH')
@csrf

<div class="row">
    <div class="offset-md-3 col-md-6 offset-md-3">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">New Season</h4>
            {{-- <p class="card-category">Complete your profile</p> --}}
        </div>
        <div class="card-body">
        
            <div class="row">
                {{-- SEASON TYPE--}}
                <div class="offset-md-3 col-md-6">
                    <div class="form-group">
                        <label for="season_types_id">Type:</label>
                        <select class="form-control" name="season_types_id" id="season_types_id">
                            <option value="0" selected="true" disabled="True">{{ $season->season_types->type }}</option>
                            @foreach ($types as $key=>$t)
                                <option value="{{ $key }}">{{ $t }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div> 
        </div>
        </div>
    </div>
</div>


<br>

<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        {{-- <h3>Add Farmer</h3> --}}
        <table class="table table-bordered" id="table_id">
            <thead>
                <tr>
                    <th>Rice Farmer</th>
                    <th>Planned Hectares</th>
                    <th>Planned Number of Farmers</th>
                    <th>Planned Quantity</th>
                    <th>Delete</th>
                    {{-- <th style="text-align:center"><a href="#" class="addRow"><i class="fas fa-plus"></i></a></th> --}}
                </tr>
            </thead>
            <tbody class="resultbody1">
                @foreach ($lists as $list)
                <tr>
                    <td>
                        <select class="form-control" name="rice_farmers_id[]" id="rice_farmers_id">
                            <option value="0" selected="true" disabled="True">{{ $list->rice_farmers->users->first_name }} {{ $list->rice_farmers->users->last_name }}</option>
                            @foreach ($rice_farmers as $key=>$p)
                            <option value="{{$key}}">{{$p}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="planned_hectares[]" value="{{ $list->planned_hectares }}" /></td>
                    <td><input type="text" class="form-control" name="planned_num_farmers[]" value="{{ $list->planned_num_farmers }}" /></td>
                    <td><input type="text" class="form-control" name="planned_qty[]" value="{{ $list->planned_qty }}" /></td>
                    <td><input type="button" class="btn btn-danger remove" value="x"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <center><input type="button" class="btn btn-lg btn-warning addRow" value="+"></center>
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