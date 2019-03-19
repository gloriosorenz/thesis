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
        $last_com_season = Season::where('season_statuses_id','=', 2)->latest('id')->first();
        // dd($last_com_season);

        $dmg_prod_ls = ProductList::where('seasons_id', $last_com_season->id)
            ->where('products_id',3)
            ->sum('curr_quantity');

        // Chart
        // $allseasonid = Season::orderBy('id')->pluck( 'id');
        // $product_lists_id = ProductList::pluck('id');
        // $prodid = ProductList::pluck('products_id');
        // $rprodct = ProductList::where('products_id','=',1);
        // $quantity = ProductList::pluck('curr_quantity');

        // $dmg_prod_ls = ProductList::where('seasons_id', $last_com_season->id);
        $prodlistid = ProductList::groupBy('products_id')->pluck('products_id');
        $prodjoin = DB::table('products')
            ->join('product_lists', 'products.id', '=', 'product_lists.products_id')
            ->groupBy('products_id')
            ->pluck('type');
        // dd($prodjoin);

        $prodlist = ProductList::groupBy('products_id')
            ->selectRaw('*,sum(curr_quantity) as sum')
            ->where('seasons_id',$last_com_season->id)
            ->pluck('sum');
        // dd($prodlistid);

        /*

        $prodlist = ProductList::groupBy('products_id')
            ->selectRaw('*,sum(curr_quantity) as sum, products_id')
            ->pluck('sum','products_id');
        */

        $piechart = Charts::create('pie', 'highcharts')
                ->title('Total Production Percentage')
                ->labels($prodjoin)
                ->values($prodlist)
                ->colors(['#2196F3', '#FFC107','#F44336'])
                ->dimensions(700,450)
                ->responsive(true);
        
        $areachart = Charts::database(Order::where('order_statuses_id','=',2)->get(),'line', 'highcharts')
                ->title('Total Production Percentage')
                ->elementLabel("Orders")
                // ->values($prodlist)
                ->dimensions(700,450)
                ->responsive(true)
                ->groupByMonth();
                ;

        /*
            $chart = new OrderChart;
            $chart = Charts::database(ProductList::all(),'bar','material')
            ->setResponsive(false)
            ->setWidth(0)
            ->groupBy('products_id');
        */
        

        // //Lava Charts
        // $lava = new Lavacharts;
        // $season_start = Season::count();

        // $data = $lava->DataTable();

        // $data->addDateColumn('Day of Month')
        //     ->addNumberColumn('Rice')
        //     ->addNumberColumn('Withered');

        // for ($a = 1; $a < 30; $a++) {
        //         $rowData = [
        //         "2019-4-$a", rand(200,500), rand(200,500)
        //         ];
        //     $data->addRow($rowData);
        // }
        // $lava->LineChart('Stocks', $data, [
        //     'title' => 'Product Sale',
        //     'animation' => [
        //         'startup' => true,
        //         'easing' => 'inAndOut'
        //     ],
        //     'colors' => ['#3CB371', '#FFD700']
        // ]);

        return view('dashboard')
            ->with('farmers',$farmers)
            // ->with('lava',$lava)
            // ->with('data',$data)
            ->with('last_com_season',$last_com_season)
            ->with('complete_orders',$complete_orders)
            ->with('pending_orders',$pending_orders)
            ->with('seasons', $seasons)
            ->with('dmg_prod_ls',$dmg_prod_ls)
            ->with('piechart',$piechart)
            ->with('areachart',$areachart)

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


}
