@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Seasons</li>
  </ol>
</nav>

<!-- Add Farmer -->
<a class="btn btn-secondary btn-md" href="{{ route('seasons.create') }}">+Add</a>
<br>
<br>

<!-- Seasons List Datatable -->
<div class="card">
    <div class="card-header">
    <h2 class="title">Season #</h2>
    </div>
    <div class="card-body">
        <table id="seasons_table" class="table table-hover">
            {{-- @if(count($season) > 0) --}}
            <thead>
                <tr>
                    <th width="">ID</th>
                    {{-- <th width="">Season</th> --}}
                    <th width="">Rice Farmer</th>
                    <th width="">Planned Hectares</th>
                    <th width="">Planned No. Of Farmers</th>
                    <th width="">Planned Quantity</th>
                    <th width="">Actual Hectares</th>
                    <th width="">Actual No. Of Farmers</th>
                    <th width="">Actual Quantity</th>
                    {{-- <th width="">Options</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($lists as $list)
                <tr class="tr">
                    <td>{{ $list->id }}</td>
                    {{-- <td>Season {{ $list->seasons->id }}</td> --}}
                    <td>{{ $list->rice_farmers->users->first_name }} {{ $list->rice_farmers->users->last_name }}</td>
                    <td>{{ $list->planned_hectares }}</td>
                    <td>{{ $list->planned_num_farmers }}</td>
                    <td>{{ $list->planned_qty }}</td>
                    <td>{{ $list->actual_hectares }}</td>
                    <td>{{ $list->actual_num_farmers }}</td>
                    <td>{{ $list->actual_qty }}</td>
                    <td>
                        {{-- <a href="/seasons_lists/{{$list->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                        <a href="/season_lists/{{$list->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('season_lists.destroy', $list->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            {{-- @else
                <p>No seasons found</p>
            @endif --}}
        </table>
    </div>
</div>
@endsection
