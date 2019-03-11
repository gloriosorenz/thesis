@extends('layouts.web')

@section('content')
<div class="col-lg-12 text-left">
        <h1>Weather Statistics for the City of Santa Rosa, Laguna</h1>
    <script type='text/javascript' src='https://darksky.net/widget/graph-bar/14.3144,121.1121/ca12/en.js?width=100%&height=400&title=Full Forecast&textColor=333333&bgColor=transparent&transparency=true&skyColor=undefined&fontFamily=Sans-Serif&customFont=&units=ca&timeColor=333333&tempColor=333333&currentDetailsOption=true'></script>

    {{-- <select>
        <option value="temperature">Temperature</option>
        <option value="wind">Wind</option>
        <option value="humidity">Humidity</option>
        <option value="precipitation">Precipitation</option>
    </select>

    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Select Graph</button>
        <div id="myDropdown" class="dropdown-content">
        <a href="#">Precipitation</a>
        <a href="#">Temperature</a>
        <a href="#">Wind</a>
        </div>
    </div> --}}
    <h2>Wind Graph</h2>
    <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=wind_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>

    <h2>Precipitation Graph</h2>
    <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=precip_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>

    <h2>Humidity Graph</h2>
    <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=humidity_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>

    <h2>Temperature Graph</h2>
    <script type='text/javascript' src='https://darksky.net/widget/graph/14.3144,121.1121/ca12/en.js?width=100%&height=320&title=Santa Rosa, Laguna&textColor=333333&bgColor=transparent&transparency=true&fontFamily=Sans-Serif&customFont=&units=ca&graph=temperature_graph&timeColor=333333&tempColor=333333&lineColor=333333&markerColor=333333'></script>

    

   

</div>
@endsection

@section('weather-option-js')
        <script>
           function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown menu if the user clicks outside of it
            window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
            }
        </script>
@endsection