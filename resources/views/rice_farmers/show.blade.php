@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('rice_farmers.index') }}">Farmers</a></li>
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
        <h4 class="card-title">{{ $farmer->first_name }} {{ $farmer->last_name }}'s' Profile</h4>
        <p class="card-category">View your profile</p>
      </div>
      <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" readonly name="first_name" value="{{ $farmer->first_name }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" readonly name="last_name" value="{{ $farmer->last_name }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" readonly name="email" value="{{ $farmer->email }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="phone">Phone:</label>
                  <input type="text" class="form-control" readonly name="phone" value="{{ $farmer->phone }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="address">Farm Address:</label>
                  <input type="text" class="form-control" readonly name="barangay" value="{{ $farmer->barangays->name }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="phone">Company:</label>
                <input type="text" class="form-control" readonly name="company" value="{{ $farmer->company }}" />
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection