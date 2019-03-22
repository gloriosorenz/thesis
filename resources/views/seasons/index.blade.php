@extends('layouts.app')

@section('content')


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Seasons</li>
    </ol>
</nav>
      
<!-- Add Planned Crop -->
@if (count($seasons) == count($statuses))
<a class="btn btn-secondary btn-md mb-2" href="{{ route('seasons.create') }}">+Add New Season</a>
@endif


<!-- Complete Season-->
@if ($latest_season->season_statuses_id == 1)
    @if (auth()->user()->roles_id == 1)
    <a class="btn btn-secondary btn-md mb-3" href="/seasons/complete_season/{{$latest_season->id}}">Complete Season {{$latest_season->id}} <i class="fas fa-check"></i></a>
    @endif
@endif
      
      

<!-- Seasons Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h2 class="title">Season</h2>
    </div>
    <div class="card-body">
        <table id="table_id" class="table table-hover">
            <thead>
                <tr>
                    <th width="30%">Season</th>
                    <th width="">Start Date</th>
                    <th width="">End Date</th>
                    <th width="">Status</th>
                    <th width="15%">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seasons as $season)
                <tr class="tr">
                    <td>Season {{ $season->id }}</td>
                    <td>{{ $season->season_start }}</td>
                    <td>{{ $season->season_end }}</td>
                    <td>
                        @if ($season->season_statuses_id == 1)
                            <h5><span class="badge badge-warning">{{ $season->season_statuses->status }}</span></h5>
                        @else
                            <h5><span class="badge badge-success">{{ $season->season_statuses->status }}</span></h5>
                        @endif
                    </td>
                    <td>
                        <a href="/seasons/{{$season->id}}/edit" class="btn btn-md btn-success"><i class="fas fa-edit fa-sm text-white"></i></a>
                        <a href="/seasons/{{$season->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="pdf/season_report/{{$season->id}}" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>



{{-- @if (count($seasons) > 0)
<div class="row">
    @foreach ($seasons as $season)
        @if ($season->season_statuses->id == 2)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Status: {{ $season->season_statuses->status }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Season {{$season->id}}</div>
                            <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">Start: {{ Carbon\Carbon::parse($season->season_start)->format('m-d-Y') }}</div>
                            <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">End: {{ Carbon\Carbon::parse($season->season_end)->format('m-d-Y') }}</div>
                        </div>
                        <div class="col-auto">
                            <a  href="/seasons/{{$season->id}}" role="button"><i class="fas fa-eye fa-2x text-gray-500"></i></a>
                        </div>
                    </div>
                    <a href="pdf/season_report/{{$season->id}}" class="btn btn-sm btn-primary">Generate Report <i class="fas fa-download fa-sm text-white"></i></a>
                </div>
            </div>
        </div>
        @elseif ($season->season_statuses->id == 1)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Status: {{ $season->season_statuses->status }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Season {{$season->id}}</div>
                            <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">Start: {{ Carbon\Carbon::parse($season->season_start)->format('m-d-Y') }}</div>
                            <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">End: {{ Carbon\Carbon::parse($season->season_end)->format('m-d-Y') }}</div>
                        </div>
                        <div class="col-auto">
                            <a  href="/seasons/{{$season->id}}" role="button"><i class="fas fa-eye fa-2x text-gray-500"></i></a>
                        </div>
                    </div>
                    <a href="/seasons/{{$season->id}}/edit" class="btn btn-sm btn-success">Update</a>
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>
{{$seasons->links()}}
@else
<p>No seasons found</p>
@endif --}}


@endsection
