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
            {{-- ADDRESS --}}
                <div class="col-md-6">
                    <!-- Barangay -->
                    <div class="form-group">
                        <label for="barangay">Address (Barangay):</label>
                        <select class="form-control" name="barangay" id="barangay">
                            <option value="0" selected="true" disabled="True">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                                <option value="{{ $barangay['name']}}">{{ $barangay['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <!-- Province -->
                    <div class="form-group">
                        <label for="province">Address (Province):</label>
                        <select class="form-control" name="province" id="province">
                            <option value="0" selected="true" disabled="True">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province['name']}}">{{ $province['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
            </div>


            <div class="row">
                {{-- ROLES --}}
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="roles_id">Role:</label>
                        <select class="form-control" name="roles_id" id="roles_id">
                            <option value="0" selected="true" disabled="True">Select Role</option>
                            @foreach ($roles as $key=>$p)
                            <option value="{{$key}}">{{$p}}</option>
                            @endforeach
                        </select>
                    </div>
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