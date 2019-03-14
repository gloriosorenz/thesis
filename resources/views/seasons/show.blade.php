@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Seasons</li>
  </ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>

<!-- Seasons List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
    <h2 class="title">Season {{ $season->id }}</h2>
    </div>
    <div class="card-body">
        <table id="seasons_table" class="table table-bordered">
            @if(count($season) > 0)
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Rice Farmer</th>
                    <th width="">Planned Hectares</th>
                    <th width="">Planned No. Of Farmers</th>
                    <th width="">Planned Quantity</th>
                    <th width="">Actual Hectares</th>
                    <th width="">Actual No. Of Farmers</th>
                    <th width="">Actual Quantity</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lists as $list)
                <tr class="tr">
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->users->first_name }} {{ $list->users->last_name }}</td>
                    <td>{{ $list->planned_hectares }}</td>
                    <td>{{ $list->planned_num_farmers }}</td>
                    <td>{{ $list->planned_qty }}</td>
                    <td>{{ $list->actual_hectares }}</td>
                    <td>{{ $list->actual_num_farmers }}</td>
                    <td>{{ $list->actual_qty }}</td>
                    <td>
                        <a href="/product_lists/{{$list->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
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
