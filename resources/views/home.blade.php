@extends('layouts.web')

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


    <!-- Header -->
    {{-- <header class="bg-dark py-5 mb-5">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4  text-white mt-5 mb-2">Welcome to SMSRL Portal</h1>
                <p class="lead mb-5 text-white">Samahan ng Magsasaka sa Sta. Rosa Laguna</p>
            </div>
            </div>
        </div>
    </header> --}}
    <div class="text-center">
        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100rem;" src="https://images.unsplash.com/photo-1473960716392-f07749249b58?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" alt="">
    </div>
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-8 mb-5">
            <h2>What We Do</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
            {{-- <a class="btn btn-primary btn-lg" href="#">Call to Action &raquo;</a> --}}
            </div>
            <div class="col-md-4 mb-5">
            <h2>Contact Us</h2>
            <hr>
            <address>
                <strong>Start Bootstrap</strong>
                <br>3481 Melrose Place
                <br>Beverly Hills, CA 90210
                <br>
            </address>
            <address>
                <abbr title="Phone">P:</abbr>
                (123) 456-7890
                <br>
                <abbr title="Email">E:</abbr>
                <a href="mailto:#">name@example.com</a>
            </address>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                </div>
                <div class="card-footer">
                <a href="#" class="btn btn-primary">Find Out More!</a>
                </div>
            </div>
            </div>
            <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus totam ut praesentium aut.</p>
                </div>
                <div class="card-footer">
                <a href="#" class="btn btn-primary">Find Out More!</a>
                </div>
            </div>
            </div>
            <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                <a href="#" class="btn btn-primary">Find Out More!</a>
                </div>
            </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->




@endsection