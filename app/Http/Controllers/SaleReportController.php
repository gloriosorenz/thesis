<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DamageReport;
use App\Order;
use App\Season;
use App\ProductList;
use PDF;
use DB;

class SaleReportController extends Controller
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

        return view('reports.sale_reports.index')
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



    public function pdfview(Request $request, $id)
    {

        $season = Season::findOrFail($id);
        $prod_list = ProductList::where('seasons_id', $season->id)->get();

        $sales = DB::table('orders')
                ->where('order_statuses_id', 2)
                ->sum('total_price');

        

        // pass view file
        $pdf = PDF::loadView('pdf.sale_report', compact('season'), compact('sales'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('sale_report.pdf');
    }
}
