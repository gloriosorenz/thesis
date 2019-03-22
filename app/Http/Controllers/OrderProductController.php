<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProduct;
use DB;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = OrderProduct::where('farmers_id', auth()->user()->id)
                ->where('order_product_statuses_id', 1)
                ->get();

        $confirmed = OrderProduct::where('farmers_id', auth()->user()->id)
                ->where('order_product_statuses_id', 2)
                ->get();

        $paid = OrderProduct::where('farmers_id', auth()->user()->id)
                ->where('order_product_statuses_id', 3)
                ->get();

        $cancelled = OrderProduct::where('farmers_id', auth()->user()->id)
                ->where('order_product_statuses_id', 4)
                ->get();

        $order_products = OrderProduct::all();

        return view('order_products.index')
            ->with('pending', $pending)
            ->with('confirmed', $confirmed)
            ->with('paid', $paid)
            ->with('cancelled', $cancelled);
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

    public function confirm_order(Request $request, $id){
        $order = OrderProduct::findOrFail($id);
        $order->order_product_statuses_id = 2;
        $order->save();

        return redirect('/order_products')->with('success', 'Order Confirmed');
    }

    public function cancel_order(Request $request, $id){
        $order = OrderProduct::findOrFail($id);
        $order->order_product_statuses_id = 4;
        $order->save();

        return redirect('/order_products')->with('success', 'Order Cancelled');
    }

    public function paid_order(Request $request, $id){
        $order = OrderProduct::findOrFail($id);
        $order->order_product_statuses_id = 3;
        $order->save();

        return redirect('/order_products')->with('success', 'Order Cancelled');
    }
}
