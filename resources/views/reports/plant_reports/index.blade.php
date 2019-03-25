@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Plant Reports</li>
  </ol>
</nav>

<div class="container">

    <!-- Add Plant Report -->
    @if (count($check_date) == 1)
        @if (auth()->user()->roles_id == 1)
            <a class="btn btn-secondary btn-md" href="/reports/plant_reports/addPlantReport">+ Add</a>
        @endif
    @endif
    {{-- <a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a> --}}
    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <!-- Plant Reports Datatable -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h2 class="title">Plant Reports</h2>
                </div>
                <div class="card-body">
                    <table id="table_id" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="">ID</th>
                                <th width="">Season</th>
                                <th width="">Month</th>
                                <th width="20%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($preports as $pr)
                            <tr class="tr">
                                <td>{{$pr->id}}</td>
                                <td>Season {{$pr->seasons->id}}</td>
                                <td>{{$pr->created_at->format('M-Y')}}</td>
                                <td>
                                    <a href="/plant_reports/{{$pr->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                    <a href="/plant_reports/{{$pr->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    <a href="/pdf/plant_report/{{$pr->id}}" class="btn btn-primary"><i class="fas fa-download fa-sm text-white"></i></a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
