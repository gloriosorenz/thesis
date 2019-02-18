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
            <div class="col-md-6">
              <div class="form-group">
                  <label for="barangay">Address:</label>
                  <select class="form-control" name="barangay" id="barangay">
                      <option value="0" selected="true" disabled="True">{{ $customer->users->barangay }}</option>
                      @foreach ($barangays as $barangay)
                          <option value="{{ $barangay['name']}}">{{ $barangay['name']}}</option>
                      @endforeach
                  </select>
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
                    {!! Form::select('customer_types_id', $types, old('customer_types_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                      <p class="help-block"></p>
                      @if($errors->has('customer_types_id'))
                          <p class="help-block">
                              {{ $errors->first('customer_types_id') }}
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