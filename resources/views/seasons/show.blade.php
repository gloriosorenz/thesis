@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Seasons</li>
  </ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>

<!-- Seasons List Datatable -->
{{-- <div class="card shadow mb-4">
    <div class="card-header">
    <h2 class="title">Season {{ $season->id }}</h2>
    </div>
    <div class="card-body">
        <table id="seasons_table" class="table table-bordered">
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Rice Farmer</th>
                    <th width="">Planned Hectares</th>
                    <th width="">Planned No. Of Farmers</th>
                    <th width="">Planned Quantity</th>
                    <th width="">Actual Hectares</th>
                    <th width="">Actual No. Of Farmers</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lists as $list)
                <tr class="tr">
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->users->first_name }} {{ $list->users->last_name }}</td>
                    <td>{{ $list->planned_hectares }}</td>
                    <td>{{ $list->planned_num_farmers }}</td>
                    <td>{{ $list->planned_qty }}</td>
                    <td>{{ $list->actual_hectares }}</td>
                    <td>{{ $list->actual_num_farmers }}</td>
                    <td>
                        <a href="/product_lists/{{$list->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div> --}}

<div class="wrapper">
    <br>
    <div class="row text-center">
        <div class="col-lg-12">
            <h6><small>CITY COOPERATIVE DEVELOPMENT OFFICE</small> <br>
                <strong>SAMAHAN NG MAGSASAKA STA. ROSA LAGUNA</strong>
            </h6>
        </div>
    </div>

    <br>
    <div class="row text-center">
        <div class="col-lg-12">
            <h3><strong>SEASON {{$season->id}} RICE PRODUCTION REPORT</strong></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <strong>
            <p>City of Sta. Rosa</p>
            <p>Cropping Season: {{$season->season_types->type}}</p>
            <p>Season Start: {{$season->season_start}}</p>
            <p>Season End: {{$season->season_end}}</p>
            </strong>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <th width="11.25">Barangay</th>
                    <th width="11.25">Planned Hectares</th>
                    <th width="11.25">Planned No. of Farmers</th>
                    <th width="11.25">Planned Quantity</th>
                    <th width="11.25">Actual Hectares</th>
                    <th width="11.25">Actual No. of Farmers</th>
                    <th width="11.25">Actual Quantity</th>
                </thead>
                <tbody>
                    @foreach ($lists as $data)
                    <tr>
                        @php
                            $barangay = App\Barangay::findOrFail($data->barangays_id);
                        @endphp
                        <td>{{$barangay->name}}</td>
                        <td>{{$data->planned_hectares}}</td>
                        <td>{{$data->planned_num_farmers}}</td>
                        <td>{{$data->planned_qty}}</td>
                        <td>{{$data->actual_hectares}}</td>
                        <td>{{$data->actual_num_farmers}}</td>
                        <td>{{$data->actual_qty}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End col-lg-12 -->
    </div>
    <!-- End row -->

    <br>
    <br>

    {{-- <div class="row">
        <div class="col-lg-6">
            <p><strong>Submitted By: </strong></p>
        </div>
        <div class="col-lg-6 ">
            <p><strong>Noted By:</strong></p>
        </div>
    </div> --}}
</div>
<!-- End wrapper -->
@endsection
