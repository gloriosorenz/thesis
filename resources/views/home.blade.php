@extends('layouts.web')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                full-height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

@section('content')
    {{-- @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif --}}

    <div class="content">

        {{-- JUMBOTRON --}}
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-bold">Welcome to SMSRL Portal</h1>
                <p class="lead my-3">Samahan ng Magsasaka sa Santa Rosa Laguna.</p>
                {{-- <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p> --}}
            </div>
        </div>

        
        {{-- <div class="row">
        @if(count($lists) > 0)
            @foreach($lists as $product_list)
            <div class="col-md-4">
                <div class="card-deck mb-3 text-center"> 
                    <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">{{ $product_list->products->type }}</h4>
                    </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">P{{ $product_list->price }} <small class="text-muted">/ kaban</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                            <li>FOR TEST REASONS = Season {{ $product_list->season_lists->seasons->id }}</li>
                            <li>Available: {{ $product_list->curr_quantity }}</li>
                            <li>Producer: {{ $product_list->season_lists->rice_farmers->company }}</li>
                            <li>Barangay Location: {{ $product_list->season_lists->rice_farmers->users->barangays->name }}</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
        @else
            <p>No products found</p>
        @endif
        </div> --}}



    </div>
@endsection