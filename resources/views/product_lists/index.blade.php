@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Seasons</li>
  </ol>
</nav>

<!-- Add Season -->
<a class="btn btn-secondary btn-md" href="{{ route('product_lists.create') }}">+Add</a>
<br>
<br>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Products</h1>
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
                    </div>
                    <div class="col-auto">
                        <a  href="/product_lists/{{$season->id}}" role="button"><i class="fas fa-calendar fa-2x text-gray-300"></i></a>
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
                </div>
                <div class="col-auto">
                    <a  href="/product_lists/{{$season->id}}" role="button"><i class="fas fa-calendar fa-2x text-gray-300"></i></a>
                </div>
            </div>
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
