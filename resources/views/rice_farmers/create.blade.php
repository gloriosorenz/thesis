@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('rice_farmers.index') }}">Farmers</a></li>
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
        <form method="post" action="{{action('RiceFarmerController@store')}}" enctype="multipart/form-data">
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
                        <label for="email">Email (Optional):</label>
                        <input type="text" class="form-control" name="email" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- COMAPNY --}}
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-lable" for="company">Company:</label>
                        <input type="text" class="form-control" name="company" value="" />
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