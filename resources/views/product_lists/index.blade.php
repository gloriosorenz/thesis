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

<!-- Seasons List Datatable -->
{{-- <div class="card">
    <div class="card-header">
        <h2 class="title">Seasons (Products)</h2>
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
                    <td>{{ $season->season_statuses->status }}</td>
                    <td>
                        <a href="/product_lists/{{$season->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
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

<br>

@if (count($seasons) > 0)
<div class="row">
    @foreach ($seasons as $season)
    <div class="col-md-4">
        <div class="jumbotron">
            <h1>Season {{$season->id}}</h1>
            <p class="lead">Type: {{$season->season_types->type}}</p>
            <p class="lead">Start: {{$season->season_start}}</p>
            <p class="lead">End: {{$season->season_end}}</p>
            <p class="lead">Status: {{ $season->season_statuses->status }}</p>
            <a class="btn btn-lg btn-secondary" href="/product_lists/{{$season->id}}" role="button">Show</a>
        </div>
    </div>
    @endforeach
</div>
{{$seasons->links()}}
@else
<p>No seasons found</p>
@endif

@endsection
