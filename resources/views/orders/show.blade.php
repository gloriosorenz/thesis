@extends('layouts.web')

@section('content')

<!-- Seasons List Datatable -->
<div class="card shadow mb-4">
    <div class="card-header">
    <h2 class="title">Order {{ $order->id }}</h2>
    </div>
    <div class="card-body">
        <table id="seasons_table" class="table table-bordered">
            @if(count($order) > 0)
            <thead>
                <tr>
                    <th width="">ID</th>
                    <th width="">Product Type</th>
                    <th width="">Seller/Producer</th>
                    <th width="">Quantity</th>
                    <th width="">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $p)
                <tr class="tr">
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->product_lists->products->type }}</td>
                    <td>{{ $p->product_lists->users->company }}</td>
                    <td>{{ $p->quantity }}</td>
                    <td>
                        {{-- <a href="/product_lists/{{$list->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a> --}}
                        {{-- <a href="/season_lists/{{$list->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a> --}}
                        {{-- <form action="{{ route('season_lists.destroy', $list->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form> --}}
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