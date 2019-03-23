@extends('layouts.app')
@include('partials.add_plant_data_javascript')
@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('plant_reports.index') }}">Plant Reports</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
    <div class="offset-2 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create a Plant Report </h4>
                <p class="card-category">Complete your report</p>
            </div>
            <div class="card-body">
                <!-- Admin Functionality -->
                @if (auth()->user()->roles_id == 1)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Rice Farmer</th>
                            <th>Plant Area</th>
                            <th>Number of Farmers</th>
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
                            <td><input type="text" class="form-control" name="plant_area[]" value="" /></td>
                            <td><input type="text" class="form-control" name="farmers[]" value="" /></td>
                            <td><input type="button" class="btn btn-danger remove" value="x"></td>
                        </tr>
                    </tbody>
                </table>
                <center><input type="button" class="btn btn-lg btn-warning addRow" value="+"></center>


                <!-- Farmer Functionality -->
                @elseif(auth()->user()->roles_id == 2)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Barangay</th>
                            <th>Plant Area</th>
                            <th>Number of Farmers</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input name="users_id[]" type="hidden" value="{{auth()->user()->id}}">
                                {{auth()->user()->barangays->name}}
                            </td>
                            <td><input type="text" class="form-control" name="plant_area[]" value=""/></td>
                            <td><input type="text" class="form-control" name="farmers[]" value="" /></td>
                        </tr>
                    </tbody>
                </table>
                @endif
               


                
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success mb-4">Create</button>
        </form>
    </div>
</div>




@endsection