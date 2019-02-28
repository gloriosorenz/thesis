<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use App\ProductList;
// use Gloudemans\ShoppingCart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        // $subtotal = ProductList::getNumbers1()->get();

        // return view('cart.cart')->with(
        //     // 'newSubtotal' => getNumbers1()->get('newSubtotal'),
        //     'subtotal', $subtotal
        // );    
        return view('cart.cart')->with([
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
        // return view('cart.cart');
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
        /*
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your cart!');
        }
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect('cart')->withSuccessMessage('Item was added to your cart!');
        */
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

       
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('show_products')->with('error', 'Item is already in your cart!');
        }

        Cart::add($request->id, $request->id, 1, $request->price)
            ->associate('App\ProductList');

        return redirect()->route('show_products')->with('success', 'Item was added to your cart!');
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

         // Validation on max quantity
         $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
         }

        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cart::remove($id);
        // $cart = Cart::find($id);
        //         $cart->delete();
                
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');

        // return redirect('cart')->withSuccessMessage('Item has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Your cart has been cleared!');
    }

}
