@extends('layouts.web')
@section('content')

{{-- <div class="text-center"><a class="nav-link" href="{{ url('weather/weather_statistics') }}">More data found here!</a></div> --}}

{{-- &font=Georgia --}}
<iframe id="forecast_embed" frameborder="0" height="250" width="100%" src="//forecast.io/embed/#lat=14.3144&lon=121.1121&name=Santa Rosa, Laguna&units=ca&font=Sans-Serif"></iframe>
<header>
    <div class="container">
        <div class="slider-container">
            <div class="intro-text mb-5">
                {{-- <div class="intro-lead-in">Samahan ng Magsasaka Sta. Rosa Laguna RicE-Commerce!</div> --}}
                <div class="intro-heading">Samahan ng Magsasaka Sta. Rosa Laguna RicE-Commerce</div>
                <a href="{{ url('product_lists/show_products') }}" class="page-scroll btn btn-success btn-xl">Shop Now</a>
            </div>
        </div>
    </div>
</header>

<section id="about" class="light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>ABOUT</h2>
                    <p>A creative agency based on Candy Land, ready to boost your business with some beautifull templates. Lattes Agency is one of the best in town see more you will be amazed.</p>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <!-- about module -->
            <div class="col-md-3 text-center">
                <div class="mz-module-about">
                    <i class="fa fa-briefcase ot-circle"></i>
                    <h3>Web Development</h3>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div>
            <!-- end about module -->
            <!-- about module -->
            <div class="col-md-3 text-center">
                <div class="mz-module-about">
                    <i class="fa fa-photo ot-circle"></i>
                    <h3>Visualisation</h3>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p>
                </div>
            </div>
            <!-- end about module -->
            <!-- about module -->
            <div class="col-md-3 text-center">
                <div class="mz-module-about">
                    <i class="fa fa-camera-retro ot-circle"></i>
                    <h3>Photography</h3>
                    <p>Accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div>
            <!-- end about module -->
            <!-- about module -->
            <div class="col-md-3 text-center">
                <div class="mz-module-about">
                    <i class="fa fa-cube ot-circle"></i>
                    <h3>UI/UX Design</h3>
                    <p> Itaque earum rerum hic tenetur a sapiente, ut aut reiciendis maiores</p>
                </div>
            </div>
            <!-- end about module -->
        </div> --}}
    </div>
    <!-- /.container -->
</section>

<div class="container">
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

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Contact Us</h2>
                    <p>If you have some Questions or need Help! Please Contact Us!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Our Business Office</h3>
                <p><strong>City Agriculture Office</strong></p>
                <p>2F Cityhall B, City Government Center</p>
                <p>Santa Rosa, Laguna</p>
                <p><i class="fa fa-phone"></i> 049 530 0015</p>
                <p><i class="fa fa-envelope"></i> cityagricultureoffice_csrl@yahoo.com</p>
            </div>
            {{-- <div class="col-md-3">
                <h3>Business Hours</h3>
                <p><i class="fa fa-clock-o"></i> <span class="day">Weekdays:</span><span>9am to 8pm</span></p>
                <p><i class="fa fa-clock-o"></i> <span class="day">Saturday:</span><span>9am to 2pm</span></p>
                <p><i class="fa fa-clock-o"></i> <span class="day">Sunday:</span><span>Closed</span></p>
            </div> --}}
            <div class="col-md-6">
                <form name="sentMessage" id="contactForm" novalidate="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name *" id="name" required="" data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Message *" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>






<section class="overlay-dark bg-img1 dark-bg short-section">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-3 mb-sm-30">
                <div class="counter-item">
                    <h2 data-count="59">59</h2>
                    <h6>awards</h6>
                </div>
            </div>
            <div class="col-md-3 mb-sm-30">
                <div class="counter-item">
                    <h2 data-count="1054">1054</h2>
                    <h6>Clients</h6>
                </div>
            </div>
            <div class="col-md-3 mb-sm-30">
                <div class="counter-item">
                    <h2 data-count="34">34</h2>
                    <h6>Team</h6>
                </div>
            </div>
            <div class="col-md-3 mb-sm-30">
                <div class="counter-item">
                    <h2 data-count="154">154</h2>
                    <h6>Project</h6>
                </div>
            </div>
        </div>
    </div>
</section>






{{-- <div class="container">

    <p>{{ $forecast->city->name}}</p>
    <p>{{ $forecast->forecasts->time}}</p>

    @foreach($forecast as $f)
        <p>{{ $f->forecasts}}</p>
    @endforeach

    <p>{{ $forecast->city->name}}</p>
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

    @endforeach
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
                            <div class="cloud"><small><small>Humidity:</small></small> {{$current_weather->humidity}}</div>

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
    </div> --}}


@endsection



{{-- 
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
     @endsection --}}