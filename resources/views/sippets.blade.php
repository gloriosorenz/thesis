@extends('layouts.app')
@section('content')
<div class=”container”>
@if(\Session::has('error'))
<div class=”alert alert-danger”>
{{\Session::get('error')}}
</div>
@endif
<div class=”row”>
<div class=”col-md-8 col-md-offset-2">
<div class=”panel panel-default”>
<div class=”panel-heading”>Dashboard</div>
<?php if(auth()->user()->isAdmin == 1){?>
<div class=”panel-body”>
<a href="{{url('admin/routes')}}">Admin</a>
</div><?php } else echo '<div class=”panel-heading”>Normal User</div>';?>
</div>
</div>
</div>
</div>
@endsection










{{-- Login template --}}
<form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
            {{-- <img class="mb-4" src="/docs/4.2/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> --}}
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    
            {{-- EMAIL --}}
            <label for="inputEmail" class="sr-only">Email address</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
    
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            
            {{-- PASSWORD --}}
            <label for="inputPassword" class="sr-only">Password</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
    
    
            {{-- <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div> --}}
    
            {{-- REMEMBER ME --}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <br>
    
            {{-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> --}}
    
            <button type="submit" class="btn btn-lg btn-primary">
                {{ __('Login') }}
            </button>
            <br>
    
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
        </form>