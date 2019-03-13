@extends('layouts.app')

@section('content')

{{-- <!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Seasons</li>
  </ol>
</nav>

<!-- Add Planned Crop -->
@if (count($seasons) == count($statuses))
    <a class="btn btn-secondary btn-md" href="{{ route('seasons.create') }}">+Add</a>
@else
@endif
    
    


<br>
<br>

<!-- Seasons List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="title">Seasons</h2>
    </div>
    <div class="card-body">
        <table id="seasons_table" class="table table-hover">
            @if(count($seasons) > 0)
            <thead>
                <tr>
                    <th width="">Season</th>
                    <th width="">Type</th>
                    <th width="">Date Start</th>
                    <th width="">Date End</th>
                    <th width="">Status</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seasons as $season)
                <tr class="tr">
                    <td>{{ $season->id }}</td>
                    <td>{{ $season->season_types->type }}</td>
                    <td>{{ $season->season_start }}</td>
                    <td>{{ $season->season_end }}</td>
                    <td></td>
                    <td>{{ $season->season_statuses->status }}</td>
                    <td>
                        <a href="/seasons/{{$season->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="/seasons/{{$season->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            @else
                <p>No seasons found</p>
            @endif
        </table>
    </div>
</div> --}}










<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Seasons</li>
    </ol>
</nav>
      
<!-- Add Planned Crop -->
@if (count($seasons) == count($statuses))
<a class="btn btn-secondary btn-md mb-2" href="{{ route('seasons.create') }}">+Add</a>
@else
@endif
      
      
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Seasons</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

@if (count($seasons) > 0)
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
                        <a  href="/seasons/{{$season->id}}" role="button"><i class="fas fa-calendar fa-2x text-gray-300"></i></a>
                    </div>
                </div>
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
                        <a  href="/seasons/{{$season->id}}" role="button"><i class="fas fa-calendar fa-2x text-gray-300"></i></a>
                    </div>
                </div>
                @if ($season->season_statuses->id == 1)
                <a href="/seasons/{{$season->id}}/edit" class="btn btn-success">Update</a>
                @endif
                
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
{{$seasons->links()}}
@else
<p>No seasons found</p>
@endif
@endsection
