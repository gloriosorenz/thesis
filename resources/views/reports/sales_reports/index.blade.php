@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sales Reports</li>
  </ol>
</nav>

<!-- Add User -->
<a class="btn btn-secondary btn-md" href="{{ route('sales_reports.create') }}">+Add</a>
{{-- <a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a> --}}
<br>
<br>

<!-- User List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h2 class="title">Sales Reports</h2>
    </div>
    <div class="card-body">

            <select class="seasons" name="seasons" id="seasons">
                {{-- <option value="0" selected="true" disabled="True">Select Season</option> --}}
                @foreach ($seasons as $season)
                    <option value="{{ $season['id']}}">{{ $season['id']}}</option>
                @endforeach
            </select>

            <br>

        <table id="table_id" class="table table-hover" name="salestable">
            @if(count($seasons) > 0)
            <thead>
                <tr>
                    <th width="">Seller</th>
                    <th width="">Date of Purchase</th>
                    {{-- <th width="">Total Quantity</th>
                    <th width="">Total Price</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($seasons as $season)
                <tr class="tr">
                    <td>{{$season->id}}</td>
                    <td>{{$season->created_at->toFormattedDateString()}}</td>

                </tr>
                @endforeach
            @else
                <p>No seasons found</p>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('sales-js')
    <script src="/lib/jquery.plugin.js"></script>
    <script src="/lib/jquery.min.js"></script>
    <script src="ddtf.js"></script>
    <script>
        
    </script>
@endsection