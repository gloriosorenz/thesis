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
<form method="post" action="{{action('PlantReportController@store')}}" enctype="multipart/form-data">
 @csrf
<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create a Plant Report </h4>
                <p class="card-category">Complete your report</p>
            </div>
            <div class="card-body">
               


                <!-- Prodcts -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Plant Area</th>
                            <th>Farmers</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $p)
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="barangay" value="{{$p->name}}" disabled/>
                                <input name="barangays_id[]" type="hidden" value="{{$p->id}}">
                            </td>
                            <td><input type="text" class="form-control" name="plant_area[]" value=""/></td>
                            <td><input type="text" class="form-control" name="farmers[]" value=""/></td>
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