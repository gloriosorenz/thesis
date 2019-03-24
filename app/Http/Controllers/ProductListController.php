<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Product;
use App\ProductList;
use App\RiceFarmer;
use App\Season;
use App\SeasonList;
use App\SeasonType;
use App\SeasonStatus;
use App\User;
use Auth;
use DB;
use Carbon\Carbon;



class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get latest season
        $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();

        $product_lists = ProductList::where('seasons_id', $latest_season->id)
                ->where('users_id', auth()->user()->id)
                ->get();

        $all_products = ProductList::where('seasons_id', $latest_season->id)
                // ->groupBy('users_id')
                ->get();
               

        // dd($all_products);

            // // Date Automation
            // $decrease1 = ProductList::where('harvest_date', '<', Carbon::now()->subDays(7))
            //     ->where('curr_quantity', '>', 0)
            //     ->get();

 
            // // dd($prod1);
            // foreach($decrease1 as $pl){
            // $sub = $pl->curr_quantity;
            // $prod1 = $decrease1['products_id' == 1 ];
            //     if($pl->products_id == 1){
            //         $pl->update([
            //             'curr_quantity' => $pl->curr_quantity - $sub,
            //             ]);
            //     }
            //     if($pl->products_id == 2){
            //         $pl->update([
            //             'curr_quantity' => $pl->curr_quantity + $prod1->curr_quantity,
            //             ]);
            //     }
            // }


        return view('product_lists.index')
                ->with('product_lists', $product_lists)
                ->with('all_products', $all_products)
                ->with('latest_season', $latest_season)
            ;
    }
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $season = Season::latest()->first();
        $products = Product::all();

        return view('product_lists.create')
            ->with('season', $season)
            ->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // Validation
       $request->validate([
            'orig_quantity.*' => 'required|int|',
            'price.*' => 'required|int',
        ]);

        // Get latest season
        $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();


        $counter = 0;
        foreach($request->products_id as $key => $value) {
            $product_list = new ProductList;
            $product_list->users_id = auth()->user()->id;
            $product_list->seasons_id = $latest_season->id;
            $product_list->orig_products_id = $request->input('products_id') [$key];
            $product_list->curr_products_id = $request->input('products_id') [$key];
            $product_list->orig_quantity = $request->input('orig_quantity') [$key];
            $product_list->curr_quantity = $request->input('orig_quantity') [$key];
            $product_list->harvest_date = $request->input('harvest_date') [$key];
            $product_list->price = $request->input('price') [$key];

            $product_list->save();



            $season_list = SeasonList::where('seasons_id', $product_list->seasons_id)
                        ->where('users_id', $product_list->users_id)
                        ->first();

            $counter = $product_list->orig_quantity + $counter;
            
        }

        $season_list = SeasonList::findOrFail($season_list->id);
        $season_list->actual_qty = $counter;
        $season_list->save();
        


        return redirect()->route('product_lists.index')->with('success','Products Added ');
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
        $product_lists = ProductList::where('users_id', '=', auth()->user()->id)
                ->where('seasons_id', $season->id)
                ->get();


        return view('product_lists.show')
            ->with('season', $season)
            ->with('product_lists', $product_lists);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // Get latest season
        $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();

        $product_list = ProductList::findOrFail($id);


        
        $product_lists =ProductList::where('users_id', auth()->user()->id)
                ->where('seasons_id', $latest_season->id)
                ->get();
        $products = Product::all();

        // dd($product_list);

        return view('product_lists.edit')
            ->with('product_list', $product_list)
            ->with('product_lists', $product_lists)
            ->with('products', $products)
            ;
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
        $product_list = ProductList::findOrFail($id);

        $product_list->orig_quantity = $request->input('orig_quantity');
        $product_list->curr_quantity = $request->input('curr_quantity');
        $product_list->price = $request->input('price');
        $product_list->save();

       
        

        return redirect()->route('product_lists.index')->with('success','Products Updated ');
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
        // Get latest season
        $latest_season = DB::table('seasons')
                ->where('season_statuses_id', 2)
                ->orderBy('id', 'desc')->first();

        //Show All Products Page
        // $product_lists = ProductList::where('products_id', '!=', 3) 
        //                 // ->where('curr_quantity', '>', 0)
        //                 ->where('seasons_id', $latest_season->id)
        //                 ->groupBy('users_id')
        //                 ->get();

        //Show all Products
        $product_lists = ProductList::where('seasons_id', $latest_season->id)
                        ->where('curr_products_id', '!=', 3) 
                        ->where('curr_quantity', '>', 0)
                        ->get();

        // dd($product_lists);
                        

        $farmers = DB::table('product_lists')
                        ->groupBy('rice_farmers_id', 'seasons_id', 'products_id');

        
        // dd($farmers);
        return view('product_lists/show_products')
                ->with('product_lists', $product_lists)
                ->with('farmers', $farmers)
                ;
    }



    // public function view_product($id)
    // {
    //     $user_id = auth()->user()->id;
    //     $user = User::find($user_id);

        
    //     $season = Season::find($id);
    //     $product_lists = ProductList::where('seasons_id', $season->id)->get();

    //     // $product = ProductList::where('created_at', '>=', Carbon::now()->subDays(7))
    //     //     ->where('product_id', '=', 2)
    //     //     ->get();

       
    //     return view('product_lists.view_product')
    //         ->with('season', $season)
    //         ->with('product_lists', $product_lists);
    // }
}
