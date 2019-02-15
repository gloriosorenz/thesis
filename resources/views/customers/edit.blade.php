@extends('layouts.app')

@section('content')
{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
        <h4 class="card-title">Edit {{ $customer->users->first_name }}'s Profile</h4>
        <p class="card-category">Edit your profile</p>
      </div>
      <div class="card-body">
      {{-- FORM --}}
      <form method="post" action="{{action('CustomerController@update', $customer->id)}}">
          @method('PATCH')
          @csrf
          <div class="row">
          {{-- FIRST NAME --}}
            <div class="col-md-6">
              <div class="form-group">
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name" value="{{ $customer->users->first_name }}" />
              </div>
            </div>
          {{-- LAST NAME --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{ $customer->users->last_name }}" />
              </div>
            </div>
          </div>
          <div class="row">
          {{-- EMAIL --}}
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" class="form-control" name="email" value="{{ $customer->users->email }}" />
                  </div>
              </div>
          {{-- PHONE --}}
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="phone">Phone:</label>
                      <input type="text" class="form-control" name="phone" value="{{ $customer->users->phone }}" />
                  </div>
              </div>
          </div>
          <div class="row">
          {{-- ADDRESS --}}
            <div class="col-md-12">
              <div class="form-group">
                  <label for="address">Address:</label>
                  <input type="text" class="form-control" name="address" value="{{ $customer->users->address }}" />
              </div>
            </div>
          </div>
          <div class="row">
          {{-- COMPANY --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" class="form-control" name="company" value="{{ $customer->company }}" />
              </div>
            </div>
          </div>
          <div class="row">
            {{-- TYPE --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Customer Type:</label>
                    <select class="form-control" id="exampleFormControlSelect1"  placeholder="">
                        <option>{{ $customer->customer_types->type }}</option>
                    </select>
            @if($errors->has('types'))
                <p class="help-block">
                    {{ $errors->first('types') }}
                </p>
            @endif
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