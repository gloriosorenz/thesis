@extends('layouts.app')
{{-- @include('partials.add_data_javascript') --}}
@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('damage_reports.index') }}">Damage Reports</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>

<!-- Form -->
<form method="post" action="{{action('DamageReportController@update', $dreport->id)}}">
@method('PATCH')
@csrf
<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create a Damage Report</h4>
                <p class="card-category">Complete your report</p>
            </div>
            <div class="card-body">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="calamity">Calamity:</label>
                        <select class="form-control" name="calamity" id="calamity">
                            <option value="">{{$dreport->calamities->type}}</option>
                            {{-- <option value="{{ $dreport->calamities->id }}" selected="true" disabled="True">{{ $dreport->calamaities->type }}</option> --}}
                            @foreach ($calamities as $calamity)
                                <option value="{{ $calamity['id']}}">{{ $calamity['type']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Region -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="calabarzon">Region:</label>
                            <select class="form-control" name="calabarzon" id="calabarzon" readonly>
                                @foreach ($calabarzon as $c)
                                    <option value="{{ $c['id']}}">{{ $c['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Provice -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="laguna">Province:</label>
                            <select class="form-control" name="laguna" id="laguna" readonly>
=                                @foreach ($laguna as $l)
                                    <option value="{{ $l['id']}}">{{ $l['name']}}</option>
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
                            <textarea type="text" class="form-control" name="narrative" value="">{{$dreport->narrative}}</textarea>
                        </div>
                    </div>
                </div>
            
                {{-- <div class="row">
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
                </div> --}}

            </div>
        </div>
    </div>
</div>



<!-- Add Data -->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Data</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="">
                    <thead>
                        <tr>
                            <th>Crop</th>
                            <th>Crop Stage</th>
                            <th>Production</th>
                            <th>Animal</th>
                            <th>Animal Head</th>
                            <th>Fish</th>
                            <th>Area</th>
                            <th>Fish Pieces</th>
                        </tr>
                    </thead>
                    <tbody class="resultbody">
                        @foreach ($ddatas as $d)
                        <tr>
                            <td><input type="text" class="form-control" name="crop[]" value="{{$d->crop}}"/></td>
                            <td><input type="text" class="form-control" name="crop_stage[]" value="{{$d->crop_stage}}"/></td>
                            <td><input type="text" class="form-control" name="production[]" value="{{$d->production}}"/></td>
                            <td><input type="text" class="form-control" name="animal[]" value="{{$d->animal}}"/></td>
                            <td><input type="text" class="form-control" name="animal_head[]" value="{{$d->animal_head}}"/></td>
                            <td><input type="text" class="form-control" name="fish[]" value="{{$d->fish}}"/></td>
                            <td><input type="text" class="form-control" name="area[]" value="{{$d->area}}"/></td>
                            <td><input type="text" class="form-control" name="fish_pieces[]" value="{{$d->fish_pieces}}"/></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Submit Button -->
<button type="submit" class="btn btn-success mb-4">Create</button>
</form>
@endsection