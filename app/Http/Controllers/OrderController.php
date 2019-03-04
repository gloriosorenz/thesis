<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = auth()->user()->orders()->with('product_lists')->get(); // fix n + 1 issues
        $orders = Order::all();
        $pending = Order::where('order_statuses_id', 1)->get();
        $done = Order::where('order_statuses_id', 2)->get();
        $cancelled = Order::where('order_statuses_id', 3)->get();
        // $products = OrderProduct::all();
        

        // dd($orders);
        return view('orders.index')
            ->with('orders', $orders)
            ->with('pending', $pending)
            ->with('done', $done)
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
        $order = Order::find($id);
        $products = OrderProduct::where('orders_id', $order->id)->get();
        // $product_lists = ProductList::where('seasons_id', $season->id)->get();

        return view('orders.show')
            ->with('order', $order)
            ->with('products', $products);
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
        $order = Order::find($id);
        $order->delete();

     return redirect('/orders')->with('success', 'Order has been deleted Successfully');
    }

    public function orders(){

        // $orders = auth()->user()->orders()->with('product_lists')->get(); // fix n + 1 issues
        // $orders = Order::where('users_id', '=', auth()->user()->id);
        $orders = Order::all();
        // $products = OrderProduct::all();
        
        // dd($orders);
        return view('orders.web_orders')
            ->with('orders', $orders);
    }

    public function confirm_order(Request $request, $id){

        $order = Order::findOrFail($id);
        $order->order_statuses_id = 2;
        $order->save;

        return redirect('/orders')->with('success', 'Order Confirmed');
        // return back()->with('success_message', 'Item has been removed!');
    }

    public function cancel_order(Request $request, $id){

        $order = Order::findOrFail($id);
        $order->order_statuses_id = 3;
        $order->save;

        return redirect('/orders')->with('success', 'Order Confirmed');
        // return back()->with('success_message', 'Item has been removed!');
    }
}
