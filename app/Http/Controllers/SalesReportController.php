<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DamageReport;
use App\Order;
use App\OrderProduct;
use App\Season;
use App\ProductList;
use App\SeasonList;
use PDF;
use DB;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dreports = DamageReport::all();
        $orders = Order::all();
        $seasons = Season::all();

        return view('reports.sales_reports.index')
            ->with('orders', $orders)
            ->with('dreports',$dreports)
            ->with('seasons',$seasons)
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
        $season = Season::find($id);
        $product_lists = ProductList::find($id);
        
        $allprodperseason = DB::table('seasons')
            ->join('product_lists', 'seasons.id', '=', 'product_lists.seasons_id')
            ->join('order_products','product_lists.id','=','order_products.product_lists_id')
            ->where('order_product_statuses_id','=',2)
            ->where('seasons_id',$season->id)
            // ->groupBy('orders_id')
            ->get();
            // ->get();
        // dd($allprodperseason);

        $allprodsum = DB::table('seasons')
            ->join('product_lists', 'seasons.id', '=', 'product_lists.seasons_id')
            ->join('order_products','product_lists.id','=','order_products.product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('order_product_statuses_id','=',2)
            ->select(DB::raw("SUM(price*quantity) as sum"))  
            ->pluck('sum');

        $allprodquan = DB::table('seasons')
            ->join('product_lists', 'seasons.id', '=', 'product_lists.seasons_id')
            ->join('order_products','product_lists.id','=','order_products.product_lists_id')
            ->where('seasons_id',$season->id) 
            ->where('order_product_statuses_id','=',2)
            ->select(DB::raw("SUM(quantity) as sum"))  
            ->pluck('sum');
        // dd($allprodquan);

        $what = OrderProduct::with('orders')
            ->get();
        // dd($what);

        $lists = SeasonList::where('seasons_id', $season->id)->get();
        // $product_lists = ProductList::where('seasons_id', $season->id)->get();

        return view('reports.sales_reports.show')
            ->with('season', $season)
            ->with('lists', $lists)
            ->with('allprodperseason',$allprodperseason)
            ->with('allprodsum',$allprodsum)
            ->with('allprodquan',$allprodquan)
            // ->with('what', $what)
            // ->with('product_lists', $product_lists)
            ;
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



    public function pdfview(Request $request, $id)
    {

        $season = Season::findOrFail($id);
        $prod_list = ProductList::where('seasons_id', $season->id)->get();

        $sales = DB::table('orders')
                ->where('order_statuses_id', 2)
                ->sum('total_price');

        

        // pass view file
        $pdf = PDF::loadView('pdf.sales_report', compact('season'), compact('sales'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('sales_report.pdf');
    }
}
