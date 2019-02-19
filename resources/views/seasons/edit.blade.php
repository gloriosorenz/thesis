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

<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        <h3>Update Farmer/s</h3>
        <table class="table table-bordered" id="table_id">
            <thead>
                <tr>
                    <th></th>
                    <th>Rice Farmer</th>
                    <th>Planned Hectares</th>
                    <th>Planned Number of Farmers</th>
                    <th>Planned Quantity</th>
                    <th>Actual Hectares</th>
                    <th>Actual Number of Farmers</th>
                    <th>Actual Quantity</th>
                    <th>Delete</th>
                    {{-- <th style="text-align:center"><a href="#" class="addRow"><i class="fas fa-plus"></i></a></th> --}}
                </tr>
            </thead>
            <tbody class="resultbody2">
                @foreach ($lists as $list)
                <tr>
                    <td><input type="hidden" name="id[]" value="{{ $list->id }}"></td>
                    <td>
                        <select class="form-control" name="rice_farmers_id[]" id="rice_farmers_id">
                            <option value="0" selected="true" disabled="True">{{ $list->rice_farmers->company }}</option>
                            @foreach ($rice_farmers as $key=>$p)
                            <option value="{{$key}}">{{$p}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input readonly="true" type="text" class="form-control" name="planned_hectares[]" value="{{ $list->planned_hectares }}" /></td>
                    <td><input readonly="true" type="text" class="form-control" name="planned_num_farmers[]" value="{{ $list->planned_num_farmers }}" /></td>
                    <td><input readonly="true" type="text" class="form-control" name="planned_qty[]" value="{{ $list->planned_qty }}" /></td>
                    <td><input type="text" class="form-control" name="actual_hectares[]" value="{{ $list->actual_hectares }}" /></td>
                    <td><input type="text" class="form-control" name="actual_num_farmers[]" value="{{ $list->actual_hectares }}" /></td>
                    <td><input type="text" class="form-control" name="actual_qty[]" value="{{ $list->actual_hectares }}" /></td>
                    <td><input type="button" class="btn btn-danger remove" value="x"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <center><input type="button" class="btn btn-lg btn-warning addRow2" value="+"></center>
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