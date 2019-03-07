@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('damage_reports.index') }}">Damage Report</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Create a Damage Report</h4>
            <p class="card-category">Complete your report</p>
        </div>
        <div class="card-body">
        <!-- Form -->
        <form method="post" action="{{action('DamageReportController@store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Calamity -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="calamity">Calamaity:</label>
                        <input type="text" class="form-control" name="calamity" value="" />
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Region -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="region">Region:</label>
                        <select class="form-control" name="region" id="region">
                            <option value="0" selected="true" disabled="True">Select Region</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region['id']}}">{{ $region['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Provice -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="barangay">Province:</label>
                        <select class="form-control" name="province" id="province">
                            <option value="0" selected="true" disabled="True">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province['id']}}">{{ $province['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Narrative -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="narrative">Narrative:</label>
                        <textarea type="text" class="form-control" name="narrative" value=""></textarea>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <!-- Crop -->
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="crop">Crop:</label>
                    <input type="text" class="form-control" name="crop" value=""/>
                    </div>
                </div>
                <!-- Crop Stage -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="crop_stage">Crop Stage:</label>
                        <input type="text" class="form-control" name="crop_stage" value="" />
                    </div>
                </div>
                <!-- Production -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="production">Production:</label>
                        <input type="text" class="form-control" name="production" value="" />
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Animal -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-lable" for="animal">Animal:</label>
                        <input type="text" class="form-control" name="animal" value="" />
                    </div>
                </div>
                <!-- Animal Head -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-lable" for="animal_head">Animal Head:</label>
                        <input type="text" class="form-control" name="animal_head" value="" />
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Fish -->
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="fish">Fish:</label>
                    <input type="text" class="form-control" name="fish" value=""/>
                    </div>
                </div>
                <!-- Area -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="area">Area:</label>
                        <input type="text" class="form-control" name="area" value="" />
                    </div>
                </div>
                <!-- Fish Pieces -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fish_pieces">Fish Pieces:</label>
                        <input type="text" class="form-control" name="fish_pieces" value="" />
                    </div>
                </div>
            </div>

            

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection