@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('customers.index') }}">Customers</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">{{ $customer->first_name }} {{ $customer->last_name }}'s' Profile</h4>
        <p class="card-category">View your customer</p>
      </div>
      <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" disabled placeholder="company" name="first_name" value="{{ $customer->first_name }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" disabled placeholder="company" name="last_name" value="{{ $customer->last_name }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" disabled placeholder="company" name="email" value="{{ $customer->email }}" />
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" disabled placeholder="company" name="phone" value="{{ $customer->phone }}" />
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="address">Address:</label>
                  <input type="text" class="form-control" disabled placeholder="" name="address" value="{{ $customer->barangay }}" />
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="phone">Company:</label>
                      <input type="text" class="form-control" disabled placeholder="company" name="phone" value="{{ $customer->company }}" />
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection



 