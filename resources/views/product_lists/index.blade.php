@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Products</li>
  </ol>
</nav>

<!-- Add Season -->
<a class="btn btn-secondary btn-md" href="{{ route('product_lists.create') }}">+Add</a>
<br>
<br>



@if (auth()->user()->roles_id == 1)
<!-- All Product List Datatable -->
<div class="card shadow mb-4 border-left-warning">
    <div class="card-header py-3">
        <h2 class="title">Product for Season {{$latest_season->id}}</h2>
    </div>
    <div class="card-body">
        <table id="table_id" class="table table-hover track_tbl">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Type</th>
                    <th>Rice Farmer</th>
                    <th>Original Quantity</th>
                    <th>Current Quantity</th>
                    <th>Harvest Date</th>
                    <th width="15%">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_products as $pl)
                <tr class="active">
                    <td>{{$pl->id}}</td>
                    <td>{{$pl->orig_products->type}}</td>
                    <td>{{$pl->users->company}}</td>
                    <td>{{$pl->orig_quantity}}</td>
                    <td>{{$pl->curr_quantity}}</td>
                    <td>{{$pl->harvest_date}}</td>
                    <td>
                        {{-- <a href="/product_lists/{{$pl->id}}"><button class="btn btn-warning btn-md btn-fill" ><i class="fas fa-eye"></i></button></a> --}}
                        <a href="/product_lists/{{$pl->id}}/edit"><button class="btn btn-success btn-md btn-fill"  ><i class="fas fa-eye"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@elseif(auth()->user()->roles_id == 2)
    <!-- Per Farmer Product Lis Datatable -->
    <div class="card shadow mb-4 border-left-warning">
        <div class="card-header py-3">
            <h2 class="title">Product for Season {{$latest_season->id}}</h2>
        </div>
        <div class="card-body">
            <table id="table_id" class="table table-hover track_tbl">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Type</th>
                        <th>Rice Farmer</th>
                        <th>Original Quantity</th>
                        <th>Current Quantity</th>
                        <th>Harvest Date</th>
                        <th width="15%">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_lists as $pl)
                    <tr class="active">
                        <td>{{$pl->id}}</td>
                        <td>{{$pl->orig_products->type}}</td>
                        <td>{{$pl->users->company}}</td>
                        <td>{{$pl->orig_quantity}}</td>
                        <td>{{$pl->curr_quantity}}</td>
                        <td>{{$pl->harvest_date}}</td>
                        <td>
                            {{-- <a href="/product_lists/{{$pl->id}}"><button class="btn btn-warning btn-md btn-fill" ><i class="fas fa-eye"></i></button></a> --}}
                            <a href="/product_lists/{{$pl->id}}/edit"><button class="btn btn-success btn-md btn-fill"  ><i class="fas fa-eye"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif






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
                        <a  href="/product_lists/{{$season->id}}" role="button"><i class="fas fa-eye fa-2x text-gray-300"></i></a>
                    </div>
                </div>
                <a href="/product_lists/{{$season->id}}/edit" class="btn btn-sm btn-success">Update</a>
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
                        <a  href="/product_lists/{{$season->id}}" role="button"><i class="fas fa-eye fa-2x text-gray-300"></i></a>
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
@endif --}}

@endsection
