@extends('layouts.web')

@section('content')
<div class="container">

    <div class="py-5 text-center">
        <h2>Checkout form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls.
            Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <div class="cart-section container">
        <div>
            @if (session()->has('success_message'))
                <div class="alert alret-success">
                    {{session()->get('success_message') }}
                    </div>
            @endif

            @if (Cart::count() > 0)
                    
            <h2>{{Cart::count }} items in Shopping Cart</h2>

            <div class="row">
                    <div class="col-md-12">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">3</span>
                        </h4>

            <div class="cart-table">
                @foreach (Cart::content() as $item)
               
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                    </ul>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
            </div>

            <a href='#' class="button">Continue Shopping</a>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>


            @else

                <h3>No items in Cart</h3>
            @endif

        </form>

        </div>
    </div>
    
            
        </div>
    </div>
</div>
@endsection