@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('damage_reports.index') }}">Damage Reports</a></li>
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
                <div class="row">
                    <!-- Calamity -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="calamity">Calamaity:</label>
                         <input readonly type="text" class="form-control" name="calamity" value="{{$dreport->calamity}}"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Region -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="region">Region:</label>
                            <input readonly type="text" class="form-control" name="barangay" value="{{$dreport->regions->name}}"/>
                        </div>
                    </div>

                    <!-- Provice -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="province">Province:</label>
                            <input readonly type="text" class="form-control" name="province" value="{{$dreport->provinces->name}}"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Narrative -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="narrative">Narrative:</label>
                            <textarea readonly type="text" class="form-control" name="narrative" value="">{{$dreport->narrative}}</textarea>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <!-- Crop -->
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="crop">Crop:</label>
                        <input readonly type="text" class="form-control" name="crop" value="{{$dreport->crop}}"/>
                        </div>
                    </div>
                    <!-- Crop Stage -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="crop_stage">Crop Stage:</label>
                            <input readonly type="text" class="form-control" name="crop_stage" value="{{$dreport->crop_stage}}" />
                        </div>
                    </div>
                    <!-- Production -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="production">Production:</label>
                            <input readonly type="text" class="form-control" name="production" value="{{$dreport->production}}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Animal -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-lable" for="animal">Animal:</label>
                            <input readonly type="text" class="form-control" name="animal" value="{{$dreport->animal}}" />
                        </div>
                    </div>
                    <!-- Animal Head -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-lable" for="animal_head">Animal Head:</label>
                            <input readonly type="text" class="form-control" name="animal_head" value="{{$dreport->animal_head}}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Fish -->
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="fish">Fish:</label>
                        <input readonly type="text" class="form-control" name="fish" value="{{$dreport->fish}}"/>
                        </div>
                    </div>
                    <!-- Area -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="area">Area:</label>
                            <input readonly type="text" class="form-control" name="area" value="{{$dreport->area}}" />
                        </div>
                    </div>
                    <!-- Fish Pieces -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fish_pieces">Fish Pieces:</label>
                            <input readonly type="text" class="form-control" name="fish_pieces" value="{{$dreport->fish_pieces}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection