@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">View</li>
  </ol>
</nav>


<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
<div class="row">
  <div class="col-md-8">
    {{-- CARD --}}
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">{{ $user->first_name }}'s Profile</h4>
        <p class="card-category">Show your profile</p>
      </div>
      <div class="card-body">
          <div class="row">
            {{-- FIRST NAME --}}
            <div class="col-md-6">
              <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" disabled placeholder="company" name="first_name" value="{{ $user->first_name }}" />
              </div>
            </div>
            {{-- LAST NAME --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" disabled placeholder="company" name="last_name" value="{{ $user->last_name }}" />
              </div>
            </div>
          </div>
          <div class="row">
            {{-- EMAIL --}}
            <div class="col-md-6">
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" disabled placeholder="company" name="email" value="{{ $user->email }}" />
              </div>
            </div>
            {{-- PHONE --}}
            <div class="col-md-4">
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" disabled placeholder="company" name="phone" value="{{ $user->phone }}" />
              </div>
            </div>
          </div>
          <div class="row">
            {{-- ADDRESS --}}
            <div class="col-md-12">
              <div class="form-group">
                  <label for="address">Address:</label>
                  <input type="text" class="form-control" disabled placeholder="company" name="barangay" value="{{ $user->barangay }}" />
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>



</div>
@endsection