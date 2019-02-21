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

@if(count($seasons) > 0)
    <div class="row">
    @foreach ($seasons as $season)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Season {{ $season->id }}
                </div>
                <div class="card-body">
                    {{-- <h5 class="card-title">Season Type:</h5> --}}
                    <p class="card-text">Type: {{$season->season_types->type}}</p>
                    <p class="card-text">Start: {{$season->season_start}}</p>
                    <p class="card-text">End: {{$season->season_end}}</p>
                    <p class="card-text">Status: {{$season->season_statuses->status}}</p>
                    <a href="/product_lists/{{$season->id}}" class="btn btn-primary">Show</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <br>
@else
    <p>No seasons found</p>
@endif

@endsection
