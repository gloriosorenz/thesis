<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Content/css/weather-icons/css/weather-icons.min.css" />
    
</head>
<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            @include('inc.home_navbar')
            {{-- <a class="weatherwidget-io mb-4" href="https://forecast7.com/en/14d28121d09/santa-rosa/" data-label_1="SANTA ROSA" data-label_2="WEATHER" data-icons="Climacons Animated" data-days="5" data-theme="weather_one" >SANTA ROSA WEATHER</a> --}}
            <iframe id="forecast_embed" frameborder="0" height="245" width="100%" src="//forecast.io/embed/#lat=14.3144&lon=121.1121&name=Santa Rosa, Laguna&units=ca"></iframe>

            <div id="content" class="container"> 
                @include('inc.messages')
                {{-- <div class="container"> --}}
                @yield('content')
                @include('inc.footer')
                {{-- </div> --}}
            </div>
        </div>
    </div>
    @include('inc.logout_modal')
    @include('partials.javascripts')
    @include('partials.weather_javascript')
    @yield('extra-js')
    @yield('weather-js')

</body>
</html>
