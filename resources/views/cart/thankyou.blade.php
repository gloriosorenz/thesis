@extends('layouts.web')

@section('content')

   <div class="thank-you-section">
       <h1>Thank you for <br> Your Order!</h1>
       <p>A confirmation email was sent</p>
       <div class="spacer"></div>
       <div>
           <a class="btn btn-lg btn-primary" href="{{ url('/') }}">Home Page</a>
       </div>
   </div>




@endsection
