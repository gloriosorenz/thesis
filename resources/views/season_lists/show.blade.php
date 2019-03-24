@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('season_lists.index') }}">Season List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>

<!-- Show Season  -->
<div class="row">
    <div class="offset-md-2 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Plan For Season</h4>
            </div>
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Rice Farmer</th>
                        <th>Planned Hectares</th>
                        <th>Planned Number of Farmers</th>
                        <th>Planned Quantity</th>
                        <th>Actual Hectares</th>
                        <th>Actual Number of Farmers</th>
                        <th>Actual Quantity</th>
                    </tr>
                </thead>
                <tbody class="resultbody1">
                    <tr>
                        <td>{{$season_list->users->company}}</td>
                        <td><input type="text" class="form-control" value="{{$season_list->planned_hectares}}" disabled/></td>
                        <td><input type="text" class="form-control" value="{{$season_list->planned_num_farmers}}" disabled/></td>
                        <td><input type="text" class="form-control" value="{{$season_list->planned_qty}}" disabled/></td>
                        <td><input type="text" class="form-control" value="{{$season_list->actual_hectares}}" disabled/></td>
                        <td><input type="text" class="form-control" value="{{$season_list->actual_num_farmers}}" disabled/></td>
                        <td><input type="text" class="form-control"  value="{{$season_list->actual_qty}}" disabled/></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>



<!-- End Form -->
@endsection