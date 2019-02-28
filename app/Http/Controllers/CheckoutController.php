<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\ProductList;
use App\OrderProduct;
// use App\Mail\OrderPlaced;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Auth;
use Carbon\Carbon;
// use Cartalyst\Stripe\Laravel\Facades\Stripe;
// use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('product_lists.show_products');
        }

        $order_date = Carbon::now();

        return view('cart.checkout')
            ->with([
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTotal' => getNumbers()->get('newTotal'),
            ])
            ->with('order_date', $order_date);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer available.');
        }

        $contents = Cart::content()->map(function ($item) {
            return $item->model->products->type.', '.$item->qty;
        })->values()->toJson();

            $order = $this->addToOrdersTables($request, null);
            // Mail::send(new OrderPlaced/($order));

            // decrease the quantities of all the products in the cart
            $this->decreaseQuantities();

            Cart::instance('default')->destroy();

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        
    }

    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            // 'users_id' => auth()->user() ? auth()->user()->id : null,
            'users_id' => auth()->user()->id,
            'total_price' =>  getNumbers()->get('newTotal'),
            'delivered' => 0,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'orders_id' => $order->id,
                'product_lists_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = ProductList::find($item->model->id);

            $product->update(['curr_quantity' => $product->curr_quantity - $item->qty]);

            /*
            $product = ProductList::find($item->model->id);
            $product = $product->curr_quantity - $item->qty;
            $product->update($product->id, ['curr_quantity']);
            */
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = ProductList::find($item->model->id);
            if ($product->curr_quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }
}
