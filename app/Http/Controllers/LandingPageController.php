<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Cache;
use Log;
use Gmopx\LaravelOWM\LaravelOWM;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('id', '!=', 3)->get();

        // $product_lists = Product::where('products_id', '!=', 3) 
        //                 ->where('curr_quantity', '>', 0)
        //                 ->get();
                        
        $lowm = new LaravelOWM();
        $forecast = $lowm->getWeatherForecast(array('lat' => 14.2936, 'lon' => 121.1067),null,null,5);
        // $forecast = $lowm->getWeatherForecast($query, $lang = 'en', $units = 'metric', $days = 5, $cache = false, $time = 600);
        // dd($forecast);

        $farmers = DB::table('product_lists')
                        ->groupBy('rice_farmers_id', 'seasons_id', 'products_id');

            // $minutes = 60;
            // $forecast = Cache::remember('forecast', $minutes, function () {
            //     Log::info("Not from cache");
            //     $app_id = config("here.app_id");
            //     $app_code = config("here.app_code");
            //     $lat = config("here.lat_default");
            //     $lng = config("here.lng_default");
            //     $url = "https://weather.api.here.com/weather/1.0/report.json?product=forecast_hourly&latitude=${lat}&longitude=${lng}&oneobservation=true&language=en&app_id=${app_id}&app_code=${app_code}";
            //     Log::info($url);
            //     $client = new \GuzzleHttp\Client();
            //     $res = $client->get($url);
            //     if ($res->getStatusCode() == 200) {
            //     $j = $res->getBody();
            //     $obj = json_decode($j);
            //     $forecast = $obj->hourlyForecasts->forecastLocation;
            //     }
            //     return $forecast;
            // });

            // dd($forecast);
        // return view('welcome', ["forecast" => $forecast]);


        return view('landing-page')
                ->with('products', $products)
                ->with('farmers', $farmers)
                ->with('forecast',$forecast);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
