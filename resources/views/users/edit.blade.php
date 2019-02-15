@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('users.index') }}">Users</a></li>
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
        <h4 class="card-title">Edit {{ $user->first_name }}'s Profile</h4>
        <p class="card-category">Complete your profile</p>
      </div>
      <div class="card-body">
      {{-- FORM --}}
      <form method="post" action="{{action('UsersController@update', $user->id)}}">
          @method('PATCH')
          @csrf
          <div class="row">
            {{-- FIRST NAME --}}
            <div class="col-md-6">
              <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" />
              </div>
            </div>
            {{-- LAST NAME --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" />
              </div>
            </div>
          </div>
          <div class="row">
            {{-- EMAIL --}}
            <div class="col-md-6">
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
              </div>
            </div>
            {{-- PHONE --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" />
              </div>
            </div>
          </div>
          <div class="row">
            {{-- ADDRESS --}}
            <div class="col-md-12">
              <div class="form-group">
                  <label for="address">Address:</label>
                  <input type="text" class="form-control" name="address" value="{{ $user->address }}" />
              </div>
            </div>
          </div>
          <div class="row">
            
          </div>
          <button type="submit" class="btn btn-success">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection