@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
<div class="row">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Create an Account</h4>
            <p class="card-category">Complete your profile</p>
        </div>
        <div class="card-body">
        {{-- FORM --}}
        <form method="post" action="{{action('UsersController@store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                {{-- FIRST NAME --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" value="" />
                    </div>
                </div>
                {{-- LAST NAME --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="" />
                    </div>
                </div>
            </div>
        
            <div class="row">
            {{-- ADDRESS --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- PHONE --}}
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" value=""/>
                    </div>
                </div>
                {{-- EMAIL --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="" />
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- ROLES --}}
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::label('roles_id', 'Role:', ['class' => 'control-label']) !!}
                        {!! Form::select('roles_id', $roles, old('roles_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('roles_id'))
                            <p class="help-block">
                                {{ $errors->first('roles_id') }}
                            </p>
                        @endif
                    </div>

                    {{-- <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="role">Options</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> --}}
                </div>
            </div>

            
            <div class="row">
                <div class="col-lg-6">
                    {{-- PASSWORD --}}
                    <div class="form-group">
                        <label class="control-lable" for="password">Password:</label>
                        <input type="text" class="form-control" name="password" value="" />
                    </div>
                </div>
            </div>

            {{-- SUBMIT BUTTON --}}
            <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection