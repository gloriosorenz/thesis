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
        // $order = Order::findOrFail($id);
        // $order->order_statuses_id = 3;

        $order_product = OrderProduct::findOrFail($id);
        $order_product->order_product_statuses_id = 4;

        // $curr_qty = OrderProduct::where('product_lists_id',$id )->get();
        // $op = OrderProduct::findOrFail($id);

        // $order_products = OrderProduct::where('orders_id', $id)->get();
        // $curr = $op->quantity;
        // $order_products = $order->quantity + $op->curr_quantity;

        // // $quantity = $order_products->quantity;
        // $order_products->quantity = 
        
        // $orderproducts->increaseQuantities();
        // $order_products->update(['curr_quantity' => $product->curr_quantity + $item->qty]);
        
        // foreach (OrderProduct::findorFail($id) as $id ){
            // $orderproduct = OrderProduct::findorFail($id);
            $op = OrderProduct::all();

            foreach($op as $p){
                $p = OrderProduct::findorFail($id);
                $product = OrderProduct::where('product_lists_id', $id);

                $p->product_lists->update(['curr_quantity' => $product->curr_quantity + $p->quantity]);
            }
            // $orderproduct = OrderProduct::findorFail($id);

           
        // }
        
        // $orderproduct = OrderProduct::findOrFail($id);
        //     foreach($request->product_lists_id as $key => $value) {
        //         $data=array(
        //                     'seasons_id' => $id,
        //                     'users_id'=>$request->users_id [$key],
        //                     'planned_hectares'=>$request->planned_hectares [$key],
        //                     'planned_num_farmers'=>$request->planned_num_farmers [$key],
        //                     'planned_qty'=>$request->planned_qty [$key]);

        //         SeasonList::insert($data);
        //     }  
        
        
        // $orderproduct = OrderProduct::findOrFail($id);
        //     $plist = $request->all();
        //     $plist = ProductList::where('order_products_id', $orderproduct->id)->get();
        //     foreach($request->id as $i => $id) { 
        //         $list = SeasonList::findOrFail($id);
        //         $list->update([
        //             'curr_quantity' => $product->curr_quantity + $orderproduct->quantity
        //             ]);
        //     }

        // if($season->save()){
        //     $id = $season->id;
        //     $plist = $request->all();
        //     $plist = ProductList::where('seasons_id', $season->id)->get();
        //     foreach($request->id as $i => $id) { 
        //         $list = SeasonList::findOrFail($id);
        //         $list->update([
        //             'actual_hectares' => $request->actual_hectares[$i],
        //             'actual_num_farmers' => $request->actual_num_farmers[$i],
        //             'actual_qty' => $request->actual_qty[$i],
        //             ]);
        //     }

        $order_product->save();
        // $order_products->save();

        return redirect('/orders')->with('success', 'Order has been removed!');
        // return back()->with('success_message', 'Item has been removed!');
    }




    public function pdfview(Request $request, $id)
    {

        $order = Order::findOrFail($id);
        $orders = OrderProduct::where('orders_id', $order->id)->get();

        // $users = DB::table('users')->get();
        // view()->share('users',$users);


        // pass view file
        $pdf = PDF::loadView('pdf.invoice', compact('order'), compact('orders'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('invoice.pdf');
    }
}
