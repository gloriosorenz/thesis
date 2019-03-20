@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Damage Reports</li>
  </ol>
</nav>

<!-- Add Plant Report -->
<a class="btn btn-secondary btn-md" href="{{ route('plant_reports.create') }}">+Add</a>
{{-- <a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a> --}}
<br>
<br>

<!-- Plant Reports Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h2 class="title">Plant Reports</h2>
    </div>
    <div class="card-body">
        <table id="table_id" class="table table-hover">
            @if(count($preports) > 0)
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Calamity</th>
                    <th width="">Date Created</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($preports as $pr)
                <tr class="tr">
                    <td>{{$pr->id}}</td>
                    <td>{{$pr->calamities->type}}</td>
                    <td>{{$pr->created_at->toFormattedDateString()}}</td>
                    <td>
                        <a href="/damage_reports/{{$pr->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="/damage_reports/{{$pr->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <a href="/pdf/damage_report/{{$pr->id}}" class="btn btn-primary"><i class="fas fa-download fa-sm text-white"></i></a>
                    </td>
                </tr>
                @endforeach
            @else
                <p>No reports found</p>
            @endif
        </table>
    </div>
</div>
@endsection
