@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('customers.index') }}">Customers</a></li>
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
            <h4 class="card-title">Create a Customer Account</h4>
            <p class="card-category">Complete your customer details</p>
        </div>
        <div class="card-body">
        <!--  Form  -->
        <form method="post" action="{{action('CustomerController@store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- First Name  -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" value="" />
                    </div>
                </div>
                <!-- Last Name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="" />
                    </div>
                </div>
            </div>
        
            <div class="row">
                <!-- Phone -->
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" value=""/>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="" />
                    </div>
                </div>
            </div>

            <div class="row">
            <!--  Address -->
                <div class="col-md-6">
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
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <!-- Company  -->
                    <div class="form-group">
                        <label class="control-lable" for="company">Comapny:</label>
                        <input type="text" class="form-control" name="company" value="" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <!-- Password -->
                    <div class="form-group">
                        <label class="control-lable" for="password">Password:</label>
                        <input type="password" class="form-control" name="password" value="" />
                    </div>
                </div>
            </div>


            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection