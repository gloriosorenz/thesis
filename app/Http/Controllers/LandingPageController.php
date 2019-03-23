<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Cache;
use Log;
use Gmopx\LaravelOWM\LaravelOWM;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use App\OrderProduct;
use App\Order;
use App\ProductList;
use Carbon\Carbon;
use App\User;
use App\Barangay;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmergroups = User::where('roles_id','=',2)
            ->count();
        $clients = User::where('roles_id','>',2)
            ->count();
        $lagunabarangays = Barangay::where('cities_id','=', 43428)
            ->whereNotIn('id', array(11218, 11219, 11223,11224,11225,11228))
            ->count();

        
        $products = Product::where('id', '!=', 3)
        ->where('id','!=',4)
        ->get();

        // $product_lists = Product::where('products_id', '!=', 3) 
        //                 ->where('curr_quantity', '>', 0)
        //                 ->get();
                        
        $lowm = new LaravelOWM();

        // $forecast = $lowm->getWeatherForecast(array('lat' => 14.2936, 'lon' => 121.1067),null,null,5);
        // $current_weather = $lowm->getCurrentWeather(array('lat' => 14.2936, 'lon' => 121.1067));
        // $current_weather = $lowm->getCurrentWeather(array('lat' => 14.2471, 'lon' => 121.1367));
        // $forecast = $lowm->getWeatherForecast($query, $lang = 'en', $units = 'metric', $days = 5, $cache = false, $time = 600);
        // dd($forecast);

        $farmers = DB::table('product_lists')
                        ->groupBy('rice_farmers_id', 'seasons_id', 'curr_products_id');

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
            // dd($current_weather);
        // return view('welcome', ["forecast" => $forecast]);


        // Auto add Cancel Order with Quantity
        $orderproducts = OrderProduct::where('created_at', '<', Carbon::now()->subDays(3))
            ->where('order_product_statuses_id','=', 1)
            ->get();

            foreach($orderproducts as $op){
                    $op->product_lists->update(['curr_quantity' => $op->product_lists->curr_quantity + $op->quantity]);
                    $op->update(['order_product_statuses_id' => 4]);    
            }

        // Auto check status of Product Order to change status or Order
        $poee = OrderProduct::groupBy('orders_id')->select( 'orders_id', DB::raw( 'AVG(order_product_statuses_id) as avg' ) )->get();
        // dd($poee);

        foreach($poee as $pee){
            // dd($pee);
            if($pee->avg == 2){
                $pee->orders->update(['order_statuses_id'=>2]); // Done
            } elseif ($pee->avg == 4){
                $pee->orders->update(['order_statuses_id'=>4]); // Cancelled
            } else
                $pee->orders->update(['order_statuses_id'=>1]); // Pending
        }

        return view('landing-page')
                ->with('products', $products)
                ->with('farmers', $farmers)
                ->with('farmergroups', $farmergroups)
                ->with('clients', $clients)
                ->with('lagunabarangays', $lagunabarangays)

                // ->with('forecast',$forecast)
                // ->with('current_weather',$current_weather)
                ;
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

    public function weather_statistics(){

        return view('weather/weather_statistics');
    }
}
