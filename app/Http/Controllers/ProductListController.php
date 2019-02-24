<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;

use App\ProductList;
use Illuminate\Http\Request;
use App\Product;
use App\RiceFarmer;
use App\Season;
use App\SeasonList;
use App\SeasonType;
use App\SeasonStatus;
use App\User;
use Auth;
use DB;



class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::orderBy('id', 'desc')->get();
        // $lists = SeasonList::where('rice_farmers_id', '=', Auth::user()->id)->get();
        $product_lists = SeasonList::all();

        
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
        $types = SeasonType::get()->pluck('type', 'id');
        $rice_farmers = RiceFarmer::get()->pluck('company', 'id');
        $statuses = SeasonStatus::get()->pluck('status', 'id');

        return view('product_lists.create')
            ->with('types', $types)
            ->with('rice_farmers', $rice_farmers)
            ->with('statuses', $statuses);
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $season = Season::find($id);
        $lists = SeasonList::where('seasons_id', $season->id)->get();
        $product_lists = ProductList::where('seasons_id', $season->id)->get();

        // $user = DB::table('product_lists')
        //             ->join('rice_farmers', 'product_lists.rice_farmers_id', '=', 'rice_farmers.id')
        //             ->join('users', 'rice_farmers.users_id', '=', 'users.id')
        //             ->where(auth()->user()->id, '=', 'users.id')
        //             ->get();

        // dd($product_lists);
        return view('product_lists.show')
            ->with('season', $season)
            ->with('lists', $lists)
            ->with('product_lists', $user->rice_farmers->products);
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
