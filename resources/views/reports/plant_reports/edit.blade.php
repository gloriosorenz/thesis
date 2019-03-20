@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('plant_reports.index') }}">Plant Reports</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>

<!-- Form -->
<form method="post" action="{{action('PlantReportController@update', $preport->id)}}">
@method('PATCH')
 @csrf
<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit a Plant Report</h4>
                <p class="card-category">Edit your report</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Barangay -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="barangay">Barangay:</label>
                            <select class="form-control" name="barangay" id="barangay">
                                <option value="0" selected="true" disabled="True">Select Barangay</option>
                                @foreach ($barangays as $b)
                                    <option value="{{ $b['id']}}">{{ $b['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Plant Area -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="plant_area">Plant Area:</label>
                            <input type="text" class="form-control" name="plant_area" value="{{$preport->plant_area}}"/>
                        </div>
                    </div>

                    <!-- Farmers -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="farers">Number of Farmers:</label>
                            <input type="text" class="form-control" name="farmers" value="{{$preport->farmers}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Submit Button -->
<button type="submit" class="btn btn-success mb-4">Update</button>
</form>
@endsection