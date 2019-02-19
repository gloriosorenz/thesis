<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;

use App\ProductList;
use Illuminate\Http\Request;
use App\Product;
use App\RiceFarmer;
use App\Season;
use App\SeasonList;
use App\User;
use App\Barangay;



class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();
        $product_lists = ProductList::all();
      
        return view('product_lists.index')
            ->with('seasons', $seasons)
            ->with('product_lists', $product_lists);
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
        $lists = SeasonList::where('rice_farmers_id', '=', Auth::user()->id)->get();

        return view('seasons.show')
            ->with('season', $season)
            ->with('lists', $lists);
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display_products()
    {
        $product_lists = ProductList::where('products_id', '!=', 3)
                        ->get();
      
        return view('product_lists/show_products', compact('product_lists'));
    }
}
