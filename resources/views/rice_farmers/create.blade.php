@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('rice_farmers.index') }}">Farmers</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Create a Farmer Account</h4>
            <p class="card-category">Complete your profile</p>
        </div>
        <div class="card-body">
        <!-- Form -->
        <form method="post" action="{{action('RiceFarmerController@store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- First Name -->
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
                        <label for="email">Email (Optional):</label>
                        <input type="text" class="form-control" name="email" value="" />
                    </div>
                </div>
            </div>

            <label><strong>Farm Address</strong></label>
            <div class="row">
                <!-- Street -->
                <div class="col-md-8">
                    <div class="form-group">
                    <label for="phone">Street:</label>
                    <input type="text" class="form-control" name="street" value=""/>
                    </div>
                </div>
            </div>
            <div class="row">
            <!-- Address -->
                <div class="col-md-4">
                    <!-- Barangay -->
                    <div class="form-group">
                        <label for="barangay">Barangay:</label>
                        <select class="form-control" name="barangay" id="barangay">
                            <option value="0" selected="true" disabled="True">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                                <option value="{{ $barangay['id']}}">{{ $barangay['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- City -->
                    <div class="form-group">
                        <label for="city">City:</label>
                        <select class="form-control" name="city" id="city">
                            <option value="0" selected="true" disabled="True">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city['id']}}">{{ $city['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- City -->
                    <div class="form-group">
                        <label for="province">Province:</label>
                        <select class="form-control" name="province" id="province">
                            <option value="0" selected="true" disabled="True">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province['id']}}">{{ $province['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Company -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-lable" for="company">Company:</label>
                        <input type="text" class="form-control" name="company" value="" />
                    </div>
                </div>
            </div>


            <label><strong>Additional Information</strong></label>
            <div class="row">
                <!-- Number of Farmers -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="no_farmers">Number of farmers:</label>
                        <input type="text" class="form-control" name="no_farmers" value="" />
                    </div>
                </div>
                <!-- Hectares -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="hectares">Hectares:</label>
                        <input type="text" class="form-control" name="hectares" value="" />
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