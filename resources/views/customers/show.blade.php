@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('customers.index') }}">Customers</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
<div class="row">
  <div class="col-md-8">
    <div class="card shadow mb-4">
      <div class="card-header card-header-primary">
        <h4 class="card-title">{{ $customer->first_name }} {{ $customer->last_name }}'s Profile</h4>
        <p class="card-category">Edit your profile</p>
      </div>
      <div class="card-body">
        <div class="row">
            <!-- First Name  -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" value="{{ $customer->first_name }}" readonly/>
                </div>
            </div>
            <!-- Last Name -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $customer->last_name }}" readonly/>
                </div>
            </div>
        </div>
    
        <div class="row">
            <!-- Phone -->
            <div class="col-md-6">
                <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}" readonly/>
                </div>
            </div>
            <!-- Email -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $customer->email }}" readonly/>
                </div>
            </div>
        </div>

        <label><strong>Farm Address</strong></label>
        <div class="row">
            <!-- Street -->
            <div class="col-md-8">
                <div class="form-group">
                <label for="phone">Street:</label>
                <input type="text" class="form-control" name="street" value="{{ $customer->street }}" readonly/>
                </div>
            </div>
        </div>
        <div class="row">
          <!-- Address -->
            <div class="col-md-4">
                <!-- Barangay -->
                <div class="form-group">
                    <label for="barangay">Barangay:</label>
                    <input type="text" class="form-control" name="street" value="{{ $customer->barangays->name }}" readonly/>
                </div>
            </div>
            <div class="col-md-4">
                <!-- City -->
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" name="street" value="{{ $customer->cities->name }}" readonly/>
                </div>
            </div>
            <div class="col-md-4">
                <!-- City -->
                <div class="form-group">
                    <label for="province">Province:</label>
                    <input type="text" class="form-control" name="street" value="{{ $customer->provinces->name }}" readonly/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <!-- Company  -->
                <div class="form-group">
                    <label class="control-lable" for="company">Company:</label>
                    <input type="text" class="form-control" name="company" value="{{ $customer->company }}" readonly/>
                </div>
            </div>
        </div>
         <!-- End row  -->
      </div>
    </div>
  </div>
</div>
@endsection