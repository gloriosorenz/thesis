@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sales Reports</li>
  </ol>
</nav>

<!-- Add Report -->
{{-- <a class="btn btn-secondary btn-md" href="{{ route('sales_reports.create') }}">+Add</a> --}}
<br>
<br>

<!-- Sales Report Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h2 class="title">Season Sales</h2>
    </div>
    <div class="card-body">
        <table id="table_id" class="table table-hover">
            <thead>
                <tr>
                    <th width="20%">Season</th>
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
                        {{-- @if ($season->season_statuses_id == 1)
                        <a href="/seasons/{{$season->id}}/edit" class="btn btn-md btn-success"><i class="fas fa-edit fa-sm text-white"></i></a>
                        @endif --}}
                        <a href="sales_reports/{{$season->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="/pdf/sales_report/{{$season->id}}" class="btn btn-md btn-secondary"><i class="fas fa-download fa-sm text-white"></i></a>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection

{{-- @section('sales-js')
    <script src="/lib/jquery.plugin.js"></script>
    <script src="/lib/jquery.min.js"></script>
    <script src="ddtf.js"></script>
    <script>
        
    </script>
@endsection --}}