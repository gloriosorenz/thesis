<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RiceFarmer;
use App\Customer;
use App\Season;
use App\SeasonList;
use App\ProductList;
use App\Order;
use App\OrderProduct;
use Carbon\Carbon;
use DB;
use Khill\Lavacharts\Lavacharts;
use App\Charts\OrderChart;
use Charts;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $seasons = Season::count();
        $pending_orders = Order::where('order_statuses_id','=',1)
            ->count();
        $complete_orders = Order::where('order_statuses_id','=',2)
            ->count();
        $farmers = User::where('roles_id','=',2)
            ->count();

        $curr_season = DB::table('seasons')->latest('id')->first();
        // dd($curr_season);

        $last_com_season = Season::where('season_statuses_id','=', 2)->latest('id')->first();
        // dd($last_com_season);

        $dmg_prod_ls = ProductList::where('seasons_id', $last_com_season->id)
            ->where('orig_products_id',3)
            ->sum('orig_quantity');

        // Chart
        // $allseasonid = Season::orderBy('id')->pluck( 'id');
        // $product_lists_id = ProductList::pluck('id');
        // $prodid = ProductList::pluck('products_id');
        // $rprodct = ProductList::where('products_id','=',1);
        // $quantity = ProductList::pluck('curr_quantity');

        // $dmg_prod_ls = ProductList::where('seasons_id', $last_com_season->id);
        $prodlistid = ProductList::groupBy('orig_products_id')->pluck('orig_products_id');
        $prodjoin = DB::table('products')
            ->join('product_lists', 'products.id', '=', 'product_lists.orig_products_id')
            ->where('orig_products_id','!=',4)
            ->groupBy('orig_products_id')
            ->pluck('type');
        // dd($prodjoin);

        $prodlist = ProductList::where('orig_products_id','!=',4)
            ->groupBy('orig_products_id')
            ->selectRaw('*,sum(curr_quantity) as sum')
            ->where('seasons_id',$last_com_season->id) //error
            ->pluck('sum');
        // dd($prodlistid);

        /*

        $prodlist = ProductList::groupBy('products_id')
            ->selectRaw('*,sum(curr_quantity) as sum, products_id')
            ->pluck('sum','products_id');
        */

        // //ADMIN CHARTS
        $prodoppie = Charts::create('pie', 'highcharts')
                ->title('Total Production Percentage')
                ->labels($prodjoin)
                ->values($prodlist)
                // ->colors(['#2196F3', '#FFC107','#F44336'])
                ->dimensions(700,450)
                ->responsive(true);
    
        $totalorderline = Charts::database(Order::where('order_statuses_id','=',2)->get(),'line', 'highcharts')
                ->title('For the current year (per Month)')
                ->elementLabel("Number of Orders")
                ->dimensions(700,450)
                ->responsive(true)
                ->groupByMonth();
        ;

        $mvc = Order::where('order_statuses_id','=',2)
                ->select('users_id', \DB::raw('count(*) as total'))
                ->groupBy('users_id')
                ->pluck('total')
        ;
        // dd($csdkjn);

        $mvcbarlabel =  DB::table('users')
                ->join('orders', 'users.id', '=', 'orders.users_id')
                ->where('order_statuses_id','=',2)
                ->groupBy('users_id')
                ->select(DB::table('users')->raw("CONCAT(first_name, last_name) AS name"))
                ->pluck('name')
        ;
        // dd($aaaa);

        $mvcbarchart = Charts::create('bar', 'highcharts')
                ->title('Customer with Most Orders')
                ->labels($mvcbarlabel)
                ->values($mvc)
                ->elementLabel('Number of Orders')
                ->dimensions(1000, 500)
                ->responsive(true)
        ;

        $bestfarmer = OrderProduct::where('order_product_statuses_id','=',3)
                // ->select('farmers_id', \DB::raw('count(*) as total'))
                ->groupBy('farmers_id')
                ->selectRaw('*,sum(quantity) as sum')
                ->pluck('sum')
        ;
        // dd($popi);

        $bestfarmerlbl =  DB::table('users')
                ->join('order_products', 'users.id', '=', 'order_products.farmers_id')
                ->where('order_product_statuses_id','=',3)
                ->groupBy('farmers_id')
                ->pluck('company')
        ;
        // dd($bestfarmerlbl);


        $bestfarmerbarchart = Charts::create('bar', 'highcharts')
                ->title('Best Selling Farmer')
                ->labels($bestfarmerlbl)
                ->values($bestfarmer)
                ->elementLabel('Number of Product Orders')
                ->dimensions(1000, 500)
                ->responsive(true)
        ;

        // FARMER DASHBOARD CHARTS

            $authid = auth()->user()->id;

            $riceprodfarm = ProductList::
                    where('users_id','=',$authid)
                    ->where('orig_products_id','=',1)
                    ->groupBy('seasons_id')
                    ->limit(10)
                    ->get()
                    ->pluck('orig_quantity')
            ;
            // dd($bn);
            $witherprodfarm = ProductList::
                    where('users_id','=',$authid)
                    ->where('orig_products_id','=',2)
                    ->groupBy('seasons_id')
                    ->limit(10)
                    ->get()
                    ->pluck('orig_quantity')
            ;

            $dmgprodfarm = ProductList::
                    where('users_id','=',$authid)
                    ->where('orig_products_id','=',3)
                    ->groupBy('seasons_id')
                    ->limit(10)
                    ->get()
                    ->pluck('orig_quantity')
            ;
            
            $riceprodfarmlbl = ProductList::
                    where('users_id','=',$authid)
                    ->where('orig_products_id','=',1)
                    ->limit(10)
                    ->get()
                    ->pluck('seasons_id')
            ;
            // dd($bnd);

        $riceprodline = Charts::multi('line', 'highcharts')
            ->title('Seasonal Production')
            // ->elementLabel('Number of Kabans')
            ->labels($riceprodfarmlbl)
            ->dataset('Rice Products',$riceprodfarm)
            ->dataset('Withered Products',$witherprodfarm)
            ->dataset('Damaged Products',$dmgprodfarm)
            ->dimensions(1000,500)
            ->responsive(true)
        ;

            $last_com_season2 = Season::where('season_statuses_id','=', 2)->latest('id')->pluck('id')->first();

            $origprod = DB::table('seasons')
                ->join('product_lists', 'seasons.id', '=', 'product_lists.seasons_id')
                ->where('users_id','=',$authid)
                ->where('seasons_id','=',$last_com_season2)
                ->pluck('orig_quantity')
            ;

            $currprod = DB::table('seasons')
                ->join('product_lists', 'seasons.id', '=', 'product_lists.seasons_id')
                ->where('users_id','=',$authid)
                ->where('seasons_id','=',$last_com_season2)
                ->pluck('curr_quantity')
            ;

            $origcurrprod = DB::table('seasons')
                ->join('product_lists', 'seasons.id', '=', 'product_lists.seasons_id')
                ->where('users_id','=',$authid)
                ->where('seasons_id','=',$last_com_season2)
                ->pluck('orig_quantity')
            ;

        $origcurrprodbar = Charts::multi('bar', 'highcharts')
            ->title('Product Comparison For the Latest Season')
            ->labels(['Rice','Withered','Damaged'])
            ->dataset('Original Quantity',$origprod)
            ->dataset('Current Quantity',$currprod)
            ->dimensions(1000,500)
            ->responsive(true)
        ;

        /*
            ->selectRaw('*,sum(curr_quantity) as sum')
            ->where('seasons_id',$last_com_season->id)
            ->pluck('sum');

             DB::table('seasons')
            ->join('product_lists', 'seasons.id', '=', 'product_lists.seasons_id')
            ->join('order_products','product_lists.id','=','order_products.product_lists_id')
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->where('curr_products_id','=',1)
            // ->sum('quantity')
            // ->limit(10)
            // ->get()
            ->selectRaw('seasons_id,sum(quantity) as sum')

            ->pluck('sum')
            ->groupBy('seasons_id')
        */

            $ricesoldperse = DB::table('product_lists')
                ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
                ->where('farmers_id','=',$authid)
                ->where('order_product_statuses_id','=',3)
                ->where('curr_products_id','=',1)
                ->groupBy('seasons_id')
                ->selectRaw('seasons_id,sum(quantity) as sum')
                ->pluck('sum')
            ;

            $withersoldperse = DB::table('product_lists')
                ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
                ->where('farmers_id','=',$authid)
                ->where('order_product_statuses_id','=',3)
                ->where('curr_products_id','=',2)
                ->groupBy('seasons_id')
                ->selectRaw('seasons_id,sum(quantity) as sum')
                ->pluck('sum')
            ;
            $prodsoldperselbl = DB::table('product_lists')
                ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
                ->where('farmers_id','=',$authid)
                ->groupBy('seasons_id')
                ->pluck('seasons_id')
            ;

        $orderlinechart = Charts::multi('line', 'highcharts')
            ->title('Products Sold per Season')
            ->labels($prodsoldperselbl)
            ->dataset('Rice',$ricesoldperse)
            ->dataset('Withered',$withersoldperse)
            ->dimensions(1000,500)
            ->responsive(true)
        ;
        
            $ricesoldpriperse = DB::table('product_lists')
            ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->where('curr_products_id','=',1)
            ->groupBy('seasons_id')
            ->selectRaw('seasons_id,sum(quantity*price) as sum')
            ->pluck('sum')
            ;
            // dd($ricesoldpriperse);

            $withersoldpriperse = DB::table('product_lists')
                ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
                ->where('farmers_id','=',$authid)
                ->where('order_product_statuses_id','=',3)
                ->where('curr_products_id','=',2)
                ->groupBy('seasons_id')
                ->selectRaw('seasons_id,sum(quantity*price) as sum')
                ->pluck('sum')
            ;
            $prodsoldpriperselbl = DB::table('product_lists')
                ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
                ->where('farmers_id','=',$authid)
                ->groupBy('seasons_id')
                ->pluck('seasons_id')
            ;

        $revlinechart = Charts::multi('line', 'highcharts')
            ->title('Revenue Earned')
            ->labels($prodsoldpriperselbl)
            ->dataset('Rice',$ricesoldpriperse)
            ->dataset('Withered',$withersoldpriperse)
            ->dimensions(1000,500)
            ->responsive(true)
        ;
            

        $curr_seasonid = DB::table('seasons')->latest('id')->pluck('id')->first();

        $ricesoldpricurrseason = DB::table('product_lists')
            ->join('order_products', 'product_lists.id', '=', 'order_products.product_lists_id')
            ->where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',3)
            ->where('curr_products_id','!=',3)
            ->where('curr_products_id','!=',4)
            ->where('seasons_id','=',$curr_seasonid)
            ->selectRaw('*,sum(quantity*price) as sum')
            ->pluck('sum')
            // ->get();
            ;
        
        // dd($ricesoldpricurrseason);

        $pendordperfarmer = OrderProduct::where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',1)
            ->count();
        $confordperfarmer = OrderProduct::where('farmers_id','=',$authid)
            ->where('order_product_statuses_id','=',2)
            ->count();

        $cancomorders = Order::where('order_statuses_id','=',4)
            ->count();
        
        // dd($pendordperfarmer);
                
        /*
            $chart = new OrderChart;
            $chart = Charts::database(ProductList::all(),'bar','material')
            ->setResponsive(false)
            ->setWidth(0)
            ->groupBy('products_id');

            Charts::create('bar', 'highcharts')
                ->title('My nice chart')
                ->elementLabel('My nice label')
                ->labels(['First', 'Second', 'Third'])
                ->values([5,10,20])
                ->dimensions(1000,500)
                ->responsive(false);
        */

        return view('dashboard')
            ->with('farmers',$farmers)
            ->with('curr_season',$curr_season)
            ->with('last_com_season',$last_com_season)
            ->with('complete_orders',$complete_orders)
            ->with('pending_orders',$pending_orders)
            ->with('seasons', $seasons)
            ->with('dmg_prod_ls',$dmg_prod_ls)
            ->with('prodoppie',$prodoppie)
            ->with('totalorderline',$totalorderline)
            ->with('mvcbarchart',$mvcbarchart)
            ->with('bestfarmerbarchart',$bestfarmerbarchart)
            ->with('riceprodline',$riceprodline)
            ->with('origcurrprodbar',$origcurrprodbar)
            ->with('orderlinechart',$orderlinechart)
            ->with('revlinechart',$revlinechart)
            ->with('curr_seasonid',$curr_seasonid)
            ->with('ricesoldpricurrseason',$ricesoldpricurrseason)
            ->with('pendordperfarmer',$pendordperfarmer)
            ->with('confordperfarmer',$confordperfarmer)
            ->with('cancomorders',$cancomorders)
            ;
    }


}
