@extends('layouts.web')
@section('content')

{{-- <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Samahan ng Magsasaka Sta. Rosa Laguna Portal</h1>
    <p class="lead">All products are produced by the farmers of Laguna.</p>
</div> --}}
<br>
{{-- JUMBOTRON --}}
{{-- <div class="jumbotron p-3 p-md-5 text-dark rounded bg-dark text-center">
    <div class="col-md-12 px-0">
        <h1 class="display-4 font-bold">Samahan ng Magsasaka Sta. Rosa Laguna Portal</h1>
        <p class="lead">All products are produced by the farmers of Laguna.</p>
    </div>
</div> --}}

{{-- <div class="container">
    <div class="row">
    @if(count($product_lists) > 0)
        @foreach($product_lists as $product_list)
        <div class="col-md-6">
            <div class="card-deck mb-3 text-center"> 
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{ $product_list->products->type }}</h4>
                </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">{{ $product_list->presentPrice() }} <small class="text-muted">/ kaban</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>FOR TEST REASONS = Season {{ $product_list->seasons->id }}</li>
                        <li>Available: {{ $product_list->curr_quantity }}</li>
                        <li>Producer: {{ $product_list->users->company }}</li>
                        <li>Barangay Location: {{ $product_list->users->barangays->name }}</li>
                        </ul>

                        <form method="post" action="{{action('CartController@store')}}">
                                @csrf
                            <input type="hidden" name="id" value="{{ $product_list->id }}">
                            <input type="hidden" name="price" value="{{ $product_list->price }}">
                            <input type="hidden" name="quantity" value="{{ $product_list->curr_quantity }}">

                            <button type="submit" class="btb btn-success btn-lg">Add to Cart</button>
                        </form>                    
                    
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
    @else
        <p>No products found</p>
    @endif
    </div>
    
</div> --}}
{{-- <a class="weatherwidget-io" href="https://forecast7.com/en/14d28121d09/santa-rosa/" data-label_1="SANTA ROSA" data-label_2="WEATHER" data-icons="Climacons Animated" data-days="5" data-theme="gray" >SANTA ROSA WEATHER</a> --}}

<div class="text-center">
    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100rem;" src="https://images.unsplash.com/photo-1473960716392-f07749249b58?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" alt="">
</div>

<!-- Page Content -->

{{-- <div class="links">
    {{ $forecast->city }} - {{ $forecast->state }} - {{ $forecast->country }}
    <br>
    {{ $forecast->latitude }},{{ $forecast->longitude }}
    <br>
    @if (count($forecast->forecast))
      <table class="table">
        <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Weather</th>
          <th scope="col">Hour</th>
          <th scope="col">Temperature</th>
        </tr>
        </thead>
        <tbody>
        @foreach (array_slice($forecast->forecast,0,24) as $f)
          <tr>
            <th scope="row">
              <img width=24 src="{{ $f->iconLink }}">
            </th>
            <td>{{ $f->description }}</td>
            <td>{{ Carbon\Carbon::createFromFormat("HmdY", $f->localTime) }}</td>
            <td> {{ $f->temperature }}&deg;</td>
          </tr>
  
        @endforeach
        </tbody>
      </table>
    @else
      <li>Sorry my dear friend, no forecast here.</li>
    @endif
  
  </div> --}}

<div class="container">

    <div class="row">
        <div class="col-md-8 mb-5">
            <h2>What We Do</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam shitinum fukunum laboriosam. Repellat explicabo, maiores!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
            {{-- <a class="btn btn-primary btn-lg" href="#">Call to Action &raquo;</a> --}}
        </div>
        <div class="col-md-4 mb-5">
            <h2>Contact Us</h2>
            <hr>
            <address>
                <strong>City Agriculture Office</strong>
                <br>2F Cityhall B, City Government Center
                <br>Santa Rosa, Laguna
                <br>
            </address>
            <address>
                <abbr title="Phone">Phone:</abbr>
                049 530 0015
                <br>
                <abbr title="Email">Email:</abbr>
                <a href="mailto:#">cityagricultureoffice_csrl@yahoo.com</a>
            </address>
        </div>
    </div>
    <!-- /.row -->


    <h2>Featured Products</h2>
    <hr>
    <div class="row">
        @if(count($products) > 0)
            @foreach($products as $product)
            {{-- <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                    {{$product->type}}
                    <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div> --}}

            <div class="col-md-6 mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card-body">
                    <h4 class="card-title">{{$product->type}}</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                    </div>
                    <div class="card-footer">
                    <a href="#" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
                  </div>
            @endforeach
        @endif
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<div class="container">

    {{-- <p>{{ $forecast->city->name}}</p>
    <p>{{ $forecast->forecasts->time}}</p> --}}

    {{-- @foreach($forecast as $f)
        <p>{{ $f->forecasts}}</p>
    @endforeach --}}

    {{-- <p>{{ $forecast->city->name}}</p>
    @foreach ($forecast as $weather) 
        {{$weather->time->day->format('d.m.Y')}}
        <br>
       {{$weather->humidity}}
       <br>
       {{$weather->wind->speed}}
       <br>

       {{$weather->temperature->min}}
       <br>
       <br>

    @endforeach --}}

{{-- <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="weather">
                    <div class="current">
                        <div class="info">
                            <div>&nbsp;</div>
                            <div class="city"><small><small>CITY:</small></small> {{ $current_weather->city->name}}</div>
                            <div class="city"><small><small>Weather:</small></small> {{$current_weather->weather}}</div>

                            <div class="wind"><small><small> Temperature: </small></small>{{$current_weather->temperature->now}}</div>
                            <div class="wind"><small><small>WIND:</small></small> {{$current_weather->wind->speed}}</div>
                            <div class="cloud"><small><small>CLOUD:</small></small> {{$current_weather->clouds}}%</div>

                            <div>&nbsp;</div>
                        </div>
                        <div class="icon">
                            <span class="wi-day-sunny"></span>
                        </div>
                    </div>
                    <div class="future">
                        <div class="day">
                            <h3>Mon</h3>
                            <p><span class="wi-day-cloudy"></span></p>
                        </div>
                        <div class="day">
                            <h3>Tue</h3>
                            <p><span class="wi-showers"></span></p>
                        </div>
                        <div class="day">
                            <h3>Wed</h3>
                            <p><span class="wi-rain"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> --}}

@include('partials.weather_javascript')

@endsection

@section('weather-js')
        <style>
        .weather
    {
        display: flex;
        flex-flow: column wrap;
        box-shadow: 0px 1px 10px 0px #cfcfcf;
        overflow: hidden;
    }

        .weather .current
        {
            display: flex;
            flex-flow: row wrap;
            /* background-image: url("/Content/images/shared/misc/london-view.png"); */
            background-color:lightslategray;
            background-repeat: repeat-x;
            color: white;
            padding: 20px;
            text-shadow: 1px 1px #F68D2E;
        }

            .weather .current .info
            {
                display: flex;
                flex-flow: column wrap;
                justify-content: space-around;
                flex-grow: 2;
            }

                .weather .current .info .city
                {
                    font-size: 26px;
                }

                .weather .current .info .temp
                {
                    font-size: 56px;
                }

                .weather .current .info .wind
                {
                    font-size: 24px;
                }

            .weather .current .icon
            {
                text-align: center;
                font-size: 64px;
                flex-grow: 1;
            }

        .weather .future
        {
            display: flex;
            flex-flow: row nowrap;
        }

            .weather .future .day
            {
                flex-grow: 1;
                text-align: center;
                cursor: pointer;
            }

                .weather .future .day:hover
                {
                    color: #fff;
                    background-color: #F68D2E;
                }

                .weather .future .day h3
                {
                    text-transform: uppercase;
                }

                .weather .future .day p
                {
                    font-size: 28px;
                }
        </style>
     @endsection