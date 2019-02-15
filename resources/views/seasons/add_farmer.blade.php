@extends('layouts.app')

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
<div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Add Farmer</h4>
            {{-- <p class="card-category">Complete your profile</p> --}}
        </div>
        <div class="card-body">
        {{-- FORM --}}
        <form method="post" action="{{action('SeasonListController@store_farmer')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                {{-- FARMER --}}
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('rice_farmers_id', 'Rice Farmer:', ['class' => 'control-label']) !!}
                        {!! Form::select('rice_farmers_id', $rice_farmers, old('rice_farmers_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('rice_farmers_id'))
                            <p class="help-block">
                                {{ $errors->first('rice_farmers_id') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <h4>Planned</h4>
            <div class="row">
                {{-- Planned Hectares --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="first_name">Hectares:</label>
                        <input type="text" class="form-control" name="planned_hectares" value="" />
                    </div>
                </div>
                {{-- Planned Number of Famers --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name">Number of Farmers:</label>
                        <input type="text" class="form-control" name="planned_num_farmers" value="" />
                    </div>
                </div>
                {{-- Planned Quantity --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name">Quantity:</label>
                        <input type="text" class="form-control" name="planned_qty" value="" />
                    </div>
                </div>
            </div>

            <h4>Actual</h4>
            <div class="row">
                {{-- Actual Hectares --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="first_name">Hectares:</label>
                        <input type="text" class="form-control" name="actual_hectares" value="" />
                    </div>
                </div>
                {{-- Actual Number of Famers --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name">Number of Farmers:</label>
                        <input type="text" class="form-control" name="actual_num_farmers" value="" />
                    </div>
                </div>
                {{-- Actual Quantity --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name">Quantity:</label>
                        <input type="text" class="form-control" name="actual_qty" value="" />
                    </div>
                </div>
            </div>
        
       
   
            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection