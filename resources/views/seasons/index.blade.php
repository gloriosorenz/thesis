@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Seasons</li>
  </ol>
</nav>

<!-- Add Planned Crop -->
<a class="btn btn-secondary btn-md" href="{{ route('seasons.create') }}">+Add</a>
<br>
<br>

<!-- Seasons List Datatable -->
<div class="card">
    <div class="card-header">
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
                    {{-- <td></td> --}}
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
</div>
@endsection
