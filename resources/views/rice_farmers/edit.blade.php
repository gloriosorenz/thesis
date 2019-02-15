@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('rice_farmers.index') }}">Farmers</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
</ol>
</nav>

<a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>
<br>
<br>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Edit Profile</h4>
        <p class="card-category">Complete your profile</p>
      </div>
      <div class="card-body">
      {{-- FORM --}}
      <form method="post" action="{{action('RiceFarmerController@update', $farmer->id)}}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label class="bmd-label-floating">Company (disabled)</label>
                <input type="text" class="form-control" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" name="email" value="{{ $farmer->users->email }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" value="{{ $farmer->users->first_name }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $farmer->users->last_name }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="address">Address:</label>
                  <input type="text" class="form-control" name="address" value="{{ $farmer->users->address }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="{{ $farmer->users->phone }}" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" class="form-control" name="company" value="{{ $farmer->company }}" />
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection