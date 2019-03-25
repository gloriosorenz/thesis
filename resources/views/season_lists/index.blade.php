@extends('layouts.app')

@section('content')


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Season List</li>
    </ol>
</nav>
      

<!-- Plan Season -->
@if ($active == 0)
    <a class="btn btn-secondary btn-md mb-2" href="{{ route('season_lists.create') }}">+ Plan Season</a>
@endif


@if (auth()->user()->roles_id == 2)
<div class="row">
    <div class="col-lg-6">
        <!-- Season List Datatable (Ongoing)-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-warning text-white">
                <h2 class="title">Season {{$latest_season->id}} (Ongoing)</h2>
            </div>
            <div class="card-body">
                <table id="table_id3" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="">Farmer</th>
                            <th width="">Status</th>
                            <th width="25%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ongoing as $list)
                        <tr class="tr">
                            <td>{{$list->users->company}}</td>
                            <td>
                                @if ($list->season_list_statuses_id == 1)
                                    <h5><span class="badge badge-warning">{{ $list->season_list_statuses->status }}</span></h5>
                                @else
                                    <h5><span class="badge badge-success">{{ $list->season_list_statuses->status }}</span></h5>
                                @endif
                            </td>
                            <td>
                                @if (auth()->user()->roles_id == 2)
                                    @if ($list->users_id == auth()->user()->id)
                                        <a href="/season_lists/{{ $list->id }}/edit" class="btn btn-md btn-success">Edit <i class="fas fa-edit fa-sm text-white"></i></a>
                                        <a href="/season_lists/{{ $list->id }}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                    @else
                                        <a href="/season_lists/{{ $list->id }}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                    @endif
                                @else
                                    <a href="/season_lists/{{ $list->id }}/edit" class="btn btn-md btn-success">Edit <i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="/season_lists/{{ $list->id }}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <!-- Season List Datatable (Done)-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-success text-white">
                <h2 class="title">Season {{$latest_season->id}} (Done)</h2>
            </div>
            <div class="card-body">
                <table id="table_id4" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="">Farmer</th>
                            <th width="">Status</th>
                            <th width="20%">Cancel</th>
                            <th width="20%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($done as $list)
                        <tr class="tr">
                            <td>{{$list->users->company}}</td>
                            <td>
                                @if ($list->season_list_statuses_id == 1)
                                    <h5><span class="badge badge-warning">{{ $list->season_list_statuses->status }}</span></h5>
                                @else
                                    <h5><span class="badge badge-success">{{ $list->season_list_statuses->status }}</span></h5>
                                @endif
                            </td>
                            <td>
                                @if (auth()->user()->roles_id == 2)
                                    @if ($list->users_id == auth()->user()->id)
                                    <a href="/season_lists/cancel/{{$list->id}}" class="btn btn-danger">Cancel <i class="fas fa-window-close"></i></a>
                                    @endif
                                @elseif (auth()->user()->roles_id == 1)
                                    <a href="/season_lists/cancel/{{$list->id}}" class="btn btn-danger">Cancel <i class="fas fa-window-close"></i></a>
                                @endif
                            </td>
                            <td>
                                {{-- <a href="" class="btn btn-md btn-success"><i class="fas fa-edit fa-sm text-white"></i></a> --}}
                                <a href="/season_lists/{{ $list->id }}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                {{-- <a href="" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <!-- Season List Datatable (All)-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h2 class="title">Season History</h2>
            </div>
            <div class="card-body">
                <table id="table_id" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="30%">Season</th>
                            <th width="">Farmer</th>
                            <th width="">Status</th>
                            <th width="20%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($season_lists as $list)
                        <tr class="tr">
                            <td>Season {{$list->seasons->id}}</td>
                            <td>{{$list->users->company}}</td>
                            <td>
                                @if ($list->season_list_statuses_id == 1)
                                    <h5><span class="badge badge-warning">{{ $list->season_list_statuses->status }}</span></h5>
                                @else
                                    <h5><span class="badge badge-success">{{ $list->season_list_statuses->status }}</span></h5>
                                @endif
                            </td>
                            <td>
                                {{-- <a href="" class="btn btn-md btn-success"><i class="fas fa-edit fa-sm text-white"></i></a> --}}
                                <a href="/season_lists/{{ $list->id }}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                {{-- <a href="" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


@elseif(auth()->user()->roles_id == 1)
<div class="row">
    <div class="col-lg-10">
        <!-- Season List Datatable (Ongoing)-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-warning text-white">
                <h2 class="title">Season {{$latest_season->id}} (Ongoing)</h2>
            </div>
            <div class="card-body">
                <table id="table_id3" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="">Farmer</th>
                            <th width="">Status</th>
                            <th width="25%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($current as $list)
                        <tr class="tr">
                            <td>{{$list->users->company}}</td>
                            <td>
                                @if ($list->season_list_statuses_id == 1)
                                    <h5><span class="badge badge-warning">{{ $list->season_list_statuses->status }}</span></h5>
                                @else
                                    <h5><span class="badge badge-success">{{ $list->season_list_statuses->status }}</span></h5>
                                @endif
                            </td>
                            <td>
                                @if (auth()->user()->roles_id == 2)
                                    @if ($list->users_id == auth()->user()->id)
                                        <a href="/season_lists/{{ $list->id }}/edit" class="btn btn-md btn-success">Edit <i class="fas fa-edit fa-sm text-white"></i></a>
                                        <a href="/season_lists/{{ $list->id }}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                    @else
                                        <a href="/season_lists/{{ $list->id }}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                    @endif
                                @else
                                    <a href="/season_lists/{{ $list->id }}/edit" class="btn btn-md btn-primary">Edit <i class="fas fa-edit fa-sm text-white"></i></a>
                                    <a href="/season_lists/{{ $list->id }}"><button class="btn btn-secondary btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-10">
        <!-- Season List Datatable (All)-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary text-white">
                <h2 class="title">Season History</h2>
            </div>
            <div class="card-body">
                <table id="table_id" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="30%">Season</th>
                            <th width="">Farmer</th>
                            <th width="">Status</th>
                            <th width="20%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_season_lists as $list)
                        <tr class="tr">
                            <td>Season {{$list->seasons->id}}</td>
                            <td>{{$list->users->company}}</td>
                            <td>
                                @if ($list->season_list_statuses_id == 1)
                                    <h5><span class="badge badge-warning">{{ $list->season_list_statuses->status }}</span></h5>
                                @else
                                    <h5><span class="badge badge-success">{{ $list->season_list_statuses->status }}</span></h5>
                                @endif
                            </td>
                            <td>
                                <a href="/season_lists/{{ $list->id }}/edit" class="btn btn-md btn-primary">Edit <i class="fas fa-edit fa-sm text-white"></i></a>
                                <a href="/season_lists/{{ $list->id }}"><button class="btn btn-secondary btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                {{-- <a href="" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endif







@endsection
