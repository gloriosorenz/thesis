<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use App\ProductList;
use DB;
use PDF;
use Carbon\Carbon;


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

        

        $pending = Order::where('order_statuses_id', 1)->get();
        $done = Order::where('order_statuses_id', 2)->get();
        $cancelled = Order::where('order_statuses_id', 4)->get();
        $order_products = OrderProduct::all();

        // dd($orders);
        return view('orders.index')
            ->with('orders', $orders)
            ->with('pending', $pending)
            ->with('done', $done)
            ->with('cancelled', $cancelled)
            ->with('order_products', $order_products)
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
        $order = Order::find($id);
        $products = OrderProduct::where('orders_id', $order->id)->get();

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
        $pending = Order::where('order_statuses_id', 1)->get();
        $done = Order::where('order_statuses_id', 2)->get();
        $cancelled = Order::where('order_statuses_id', 4)->get();
        
        // dd($orders);
        return view('orders/my_orders')
            ->with('orders', $orders)
            ->with('pending', $pending)
            ->with('done', $done)
            ->with('cancelled', $cancelled);
    }

    public function confirm_order(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->order_statuses_id = 2;
        $order->save();

        $orderproducts = OrderProduct::where('orders_id', '=', $id)
            ->get();
            foreach($orderproducts as $op){
                    $op->update(['order_product_statuses_id'=>2]);    
            }

        return redirect('/orders')->with('success', 'Order Confirmed');
    }

    public function cancel_order(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->order_statuses_id = 4;
        $order->save();

        $orderproducts = OrderProduct::all();

        foreach($orderproducts as $op){
            if($order->id == $op->orders_id){
                $op->update(['order_product_statuses_id'=>4]);    
                $op->product_lists->update(['curr_quantity' => $op->product_lists->curr_quantity + $op->quantity]);
            }
        }

     
        return redirect('/orders')->with('success', 'Order has been cancelled!');
    }

    public function cancel_perOrder(Request $request, $id){
        $orderproducts = OrderProduct::where('orders_id', '=', $id)
        ->get();
        
        foreach($orderproducts as $op){
            $op->update(['order_product_statuses_id'=>4]);    
            $op->product_lists->update(['curr_quantity' => $op->product_lists->curr_quantity + $op->quantity]);                
        }
     
        return redirect('/orders')->with('success', 'Order has been cancelled!');
    }

    public function pdfview(Request $request, $id)
    {

        $order = Order::findOrFail($id);

        // $farmers = OrderProduct::where('orders_id', $order->id)
        //         ->groupBy('farmers_id')
        //         ->get();

        $farmers = OrderProduct::
                where('orders_id', $order->id)
                // ->selectRaw('farmers.*')
                ->get()
                ->groupBy('farmers_id');


        $data = $farmers->all();

        // dd($farmers);

        // $farmers2 = OrderProduct::
        //         where('orders_id', $order->id)
        //         // ->selectRaw('farmers.*')
        //         ->groupBy('farmers_id')
        //         ->get()
        //         ;

        // dd($farmers2);

        // $products = OrderProduct::where('farmers_id', $farmers->farmers_id)-get();

        // $products = DB::table('order_products')
        //         ->join('product_lists', 'order_products.product_lists_id', '=', 'product_lists.id')
        //         ->join('products', 'product_lists.orig_products_id', '=', 'products.id')
        //         ->where('orders_id', $order->id)
        //         ->groupBy('products.id' )
        //         ->get();

        // dd($farmers);

        // pass view file
        $pdf = PDF::loadView('pdf.invoice', compact('order', 'data'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('invoice.pdf');
    }
}
