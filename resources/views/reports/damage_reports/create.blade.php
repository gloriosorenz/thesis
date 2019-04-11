@extends('layouts.app')
@include('partials.add_data_javascript')
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

<!-- Form -->
<form method="post" action="{{action('DamageReportController@store')}}" enctype="multipart/form-data">
 @csrf
<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create a Damage Report</h4>
                <p class="card-category">Complete your report</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="calamity">Calamity:</label>
                            <select class="form-control" name="calamity" id="calamity">
                                <option value="0" selected="true" disabled="True">Select Calamity</option>
                                @foreach ($calamities as $calamity)
                                    <option value="{{ $calamity['id']}}">{{ $calamity['type']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Region -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="region">Region:</label>
                            {{-- @foreach($calabarzon as $c)
                                <input readonly type="text" class="form-control" value="{{$c->name}}"/>
                            @endforeach --}}

                            <select class="form-control" name="region" id="region" readonly>
                                @foreach ($calabarzon as $c)
                                    <option value="{{ $c['id']}}">{{ $c['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Province -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="province">Province:</label>
                            {{-- @foreach($laguna as $l)
                                <input readonly type="text" class="form-control"  value="{{$l->name}}"/>
                            @endforeach --}}

                            <select class="form-control" name="province" id="province" readonly>
                                @foreach ($laguna as $l)
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
                            <textarea type="text" class="form-control" name="narrative" value=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('calamity_date', 'Date of Calamity:') }}
                            {{ Form::date('calamity_date', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'calamity_date'])}}
                        </div>
                    </div>
                </div>

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
                            <th></th>
                            <th>Animal</th>
                            <th>Animal Head</th>
                            <th></th>
                            <th>Fish</th>
                            <th>Area</th>
                            <th>Fish Pieces</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody class="resultbody">
                        <tr>
                            <td><input type="text" class="form-control" name="crop[]" value="" placeholder="Rice"/></td>
                            <td><input type="text" class="form-control" name="crop_stage[]" value="" placeholder="Rice"/></td>
                            <td><input type="text" class="form-control" name="production[]" value="" placeholder="30"/></td>
                            <td></td>
                            <td><input type="text" class="form-control" name="animal[]" value="" placeholder="Cow"/></td>
                            <td><input type="text" class="form-control" name="animal_head[]" value="" placeholder="20"/></td>
                            <td></td>
                            <td><input type="text" class="form-control" name="fish[]" value="" placeholder="Bangus"/></td>
                            <td><input type="text" class="form-control" name="area[]" value="" placeholder="4.5"/></td>
                            <td><input type="text" class="form-control" name="fish_pieces[]" value="" placeholder="10"/></td>
                            <td><input type="button" class="btn btn-danger remove" value="x"></td>
                        </tr>
                    </tbody>
                </table>
                <center><input type="button" class="btn btn-lg btn-warning addRow" value="+"></center>
            </div>
        </div>
    </div>
</div>


<!-- Submit Button -->
<button type="submit" class="btn btn-success mb-4">Create</button>
</form>
@endsection