<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use App\ProductList;
use DB;
use PDF;

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



        // $order_products = OrderProduct::all();

        // $pending = DB::table('orders')
        //     ->join('order_products', 'orders.id', '=', 'order_products.orders_id')
        //     ->join('product_lists', 'order_products.product_lists_id', '=', 'product_lists.id')
        //     ->select('orders.*', 'order_products.quantity', 'product_lists.users_id')
        //     ->get();

        /*
            $orderproducts = OrderProduct::all();

            foreach($orderproducts as $op){
                if($order->id == $op->orders_id){
                    $op->product_lists->update(['curr_quantity' => $op->product_lists->curr_quantity + $op->quantity]);
                }
            }

        $today = Inquiry::get()->pluck('created_at'); // "2015-07-10 00:00:00"

        
        $reminders = Inquiry::where('created_at', '>=', Carbon::now()->subDays(3))
            ->where('inquiry_statuses_id', '=', 1)
            ->get();

        $reminders2 = Inquiry::where('created_at', '<=', Carbon::now()->subDays(5))
            ->where('inquiry_statuses_id', '=', 1)
            ->get();

        $booked_now = Inquiry::where('inquiry_statuses_id', 7)
            ->where('date_start', '=', Carbon::today())
            ->get();

        $booked_inquiries = Inquiry::where('inquiry_statuses_id', 7)
            ->get();



        $canceled = Inquiry::where('inquiry_statuses_id', 
            // ->where('updated_at', '=', Carbon::today())
            ->count();

        $initial = Inquiry::where('inquiry_statuses_id', 1)
            ->count();

        $confirmed = Inquiry::where('inquiry_statuses_id', 2)
            ->count();

        $approved = Inquiry::where('inquiry_statuses_id', 3)
            ->count();
            
        $booked = Inquiry::where('inquiry_statuses_id', 7)
            ->count();

        $paid = Inquiry::where('inquiry_statuses_id', 4)
            ->count();
        
        */
        $today = Order::get()->pluck('created_at'); // "2015-07-10 00:00:00"
        
        $order = Order::where('created_at', '>', Carbon::now()->subDays(3))
            ->where('order_statuses_id', '=', 4)
            ->get();

        // $orders1 = App\Order::with('order_products')->get();
        // $product_lists1 = App\Order::with('users')->get();

        $order_products = DB::table('order_products')
            // ->select('articles.id as articles_id', ..... )
            ->join('orders', 'order_products.orders_id', '=', 'orders.id')
            ->join('product_lists', 'order_products.product_lists_id', '=', 'product_lists.id')
            ->get();

        $pending = Order::where('order_statuses_id', 1)->get();
        $done = Order::where('order_statuses_id', 2)->get();
        $cancelled = Order::where('order_statuses_id', 4)->get();
        // $products = OrderProduct::all();

        // dd($orders);
        return view('orders.index')
            ->with('orders', $orders)
            ->with('pending', $pending)
            ->with('done', $done)
            ->with('cancelled', $cancelled)
            ->with('order',$order)
            ->with('order_products', $order_products);
            // ->with('orders1',$orders1)
            // ->with('order_products1'->$order_products1);
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
        $pending = Order::where('order_statuses_id', 1)->get();
        $done = Order::where('order_statuses_id', 2)->get();
        $cancelled = Order::where('order_statuses_id', 3)->get();
        
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

        return redirect('/orders')->with('success', 'Order Confirmed');
    }

    public function cancel_order(Request $request, $id){
        $order = Order::findOrFail($id);
        $order->order_statuses_id = 4;
        $order->save();

        $orderproducts = OrderProduct::all();

        foreach($orderproducts as $op){
            if($order->id == $op->orders_id){
                $op->product_lists->update(['curr_quantity' => $op->product_lists->curr_quantity + $op->quantity]);
            }
        }
     
        return redirect('/orders')->with('success', 'Order has been cancelled!');
    }

    public function pdfview(Request $request, $id)
    {

        $order = Order::findOrFail($id);
        $orders = OrderProduct::where('orders_id', $order->id)->get();

        // pass view file
        $pdf = PDF::loadView('pdf.invoice', compact('order'), compact('orders'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('invoice.pdf');
    }
}
