@extends('layouts.web')

@section('content')

<div class="container">
   <div class="thank-you-section">
       <br>
       <br>
       <br>
       <h1>Thank you for <br> Your Order!</h1>
       <p>A confirmation email was sent to your email.</p>

       <p>Your order will be reserved for 3 days, after which it will automatically be cancelled.</p>
       <div class="spacer"></div>
       <div>
           <a class="btn btn-lg btn-primary" href="{{ url('/') }}">Home Page</a>
       </div>
   </div>
</div>




@endsection
