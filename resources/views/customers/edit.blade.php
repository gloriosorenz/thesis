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
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Edit {{ $customer->first_name }}'s Profile</h4>
        <p class="card-category">Edit your profile</p>
      </div>
      <div class="card-body">
      {{-- FORM --}}
      <form method="post" action="{{action('CustomerController@update', $customer->id)}}">
        @method('PATCH')
        @csrf
            <div class="row">
                <!-- First Name  -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                      <input type="text" class="form-control" name="first_name" value="{{ $customer->first_name }}" />
                    </div>
                </div>
                <!-- Last Name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $customer->last_name }}" />
                    </div>
                </div>
            </div>
        
            <div class="row">
                <!-- Phone -->
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}"/>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ $customer->email }}" />
                    </div>
                </div>
            </div>

            <label><strong>Farm Address</strong></label>
            <div class="row">
                <!-- Street -->
                <div class="col-md-8">
                    <div class="form-group">
                    <label for="phone">Street:</label>
                    <input type="text" class="form-control" name="street" value="{{ $customer->street }}"/>
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
                <div class="col-lg-6">
                    <!-- Company  -->
                    <div class="form-group">
                        <label class="control-lable" for="company">Company:</label>
                        <input type="text" class="form-control" name="company" value="{{ $customer->company }}" />
                    </div>
                </div>
            </div>
          <button type="submit" class="btn btn-lg btn-success">Update</button>
          <a class="btn btn-lg btn-danger" href="{{ route('customers.index') }}">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection