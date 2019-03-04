@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('rice_farmers.index') }}">Farmers</a></li>
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
        <h4 class="card-title">Edit Profile</h4>
        <p class="card-category">Complete your profile</p>
      </div>
      <div class="card-body">
      {{-- FORM --}}
      <form method="post" action="{{action('RiceFarmerController@update', $farmer->id)}}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" value="{{ $farmer->first_name }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $farmer->last_name }}" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" name="email" value="{{ $farmer->email }}" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="{{ $farmer->phone }}" />
              </div>
            </div>
          </div>

          <label><strong>Farm Address</strong></label>
          <div class="row">
            <!-- Street -->
            <div class="col-md-8">
                <div class="form-group">
                <label for="phone">Street:</label>
                <input type="text" class="form-control" name="street" value="{{ $farmer->street }}"/>
                </div>
            </div>
          </div>
          <div class="row">
            <!-- Barangay -->
            <div class="col-md-4">
              <div class="form-group">
                  <label for="barangay">Barangay:</label>
                  <select class="form-control" name="barangay" id="barangay">
                      <option value="{{ $farmer->barangays->id }}" selected="true" disabled="True">{{ $farmer->barangays->id }}</option>
                      @foreach ($barangays as $key=>$p)
                          <option value="{{ $key['id']}}">{{ $p['name']}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-4">
                <!-- City -->
                <div class="form-group">
                    <label for="city">City:</label>
                    <select class="form-control" name="city" id="city">
                        <option value="0" selected="true" disabled="True">{{ $farmer->cities->name }}</option>
                        @foreach ($cities as $key=>$p)
                            <option value="{{ $key['id']}}">{{ $p['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <!-- City -->
                <div class="form-group">
                    <label for="province">Province:</label>
                    <select class="form-control" name="province" id="province">
                        <option value="0" selected="true" disabled="True">{{ $farmer->provinces->name }}</option>
                        @foreach ($provinces as $key=>$p)
                            <option value="{{ $key['id']}}">{{ $p['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
          </div>


          <div class="row">
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