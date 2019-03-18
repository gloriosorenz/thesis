@extends('layouts.app')


@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/season_statuses') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Statuses</li>
</ol>
</nav>


<!-- Complete Season-->
@if ($latest_season->season_statuses_id == 1)
<a class="btn btn-secondary btn-md mb-2" href="/season_statuses/complete_season/{{$latest_season->id}}">Complete Season <i class="fas fa-check"></i></a>
@endif


    
<br>
<br>

<div class="row">
    <div class="col-md-6">
        <!-- Ongoing Farmers Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-warning text-white">
                <h2 class="title">Ongoing (Season {{ $latest_season->id }})</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover track_tbl">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="30%">Farmer</th>
                            <th width="25%">Season</th>
                            <th width="25%">Status</th>
                            <th width="15%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ongoing as $o)
                            <tr class="active">
                                <td>{{$o->id}}</td>
                                <td>{{$o->users->company}}</td>
                                <td>Season {{$o->seasons->id}}</td>
                                <td>{{$o->season_list_statuses->status}}</td>
                                <td>
                                    {{-- <a href="#"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a> --}}
                                    <a href="/season_statuses/complete_season_farmer/{{$o->id}}" class="btn btn-success">Done <i class="fas fa-check"></i></a>
                                    {{-- <a href="#" class="btn btn-danger">Cancel <i class="fas fa-trash"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End col-md-6 -->

    
    <div class="col-md-6">
        <!-- Done Farmers Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-success text-white">
                <h2 class="title">Done Farmers (Season {{ $latest_season->id }})</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover track_tbl">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="35%">Farmer</th>
                            <th width="20%">Season</th>
                            <th width="20%">Status</th>
                            <th width="20%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($done as $d)
                        <tr class="active">
                            <td>{{$d->id}}</td>
                            <td>{{$d->users->company}}</td>
                            <td>Season {{$d->seasons->id}}</td>
                            <td>{{$d->season_list_statuses->status}}</td>
                            <td>
                                {{-- <a href="#"><button class="btn btn-info btn-md btn-fill" id="btn_view" name="btn_view">View <i class="fas fa-eye"></i></button></a> --}}
                                <a href="/season_statuses/cancel/{{$d->id}}" class="btn btn-danger">Cancel <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End col-md-6 -->
</div>
<!-- End row -->


<!-- All Season List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h2 class="title">Season History</h2>
    </div>
    <div class="card-body">
        <table id="table_id3" class="table table-hover track_tbl">
            <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="25%">Farmer</th>
                    <th width="25%">Season</th>
                    <th width="10%">Status</th>
                    {{-- <th width="10%">Options</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($season_list as $s)
                <tr class="active">
                    <td>{{$s->id}}</td>
                    <td>{{$s->users->company}}</td>
                    <td>Season {{$s->seasons->id}}</td>
                    <td>
                        @if ($s->season_list_statuses->id == 2)
                            <button type="button" class="btn btn-sm btn-success" disabled>{{$s->season_list_statuses->status}}</button>
                        @else
                            <button type="button" class="btn btn-sm btn-warning" disabled>{{$s->season_list_statuses->status}}</button>
                        @endif
                        
                    </td>
                    {{-- <td>
                        <a href="/seasons/{{$s->id}}"><button class="btn btn-info btn-md btn-fill" id="btn_view" name="btn_view">View <i class="fas fa-eye"></i></button></a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection