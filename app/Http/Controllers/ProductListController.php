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
        $seasons = Season::orderBy('id', 'desc')->paginate(10);
        // $lists = SeasonList::where('rice_farmers_id', '=', Auth::user()->id)->get();
        $season_lists = SeasonList::all();


        
            // Date Automation
            $decrease1 = ProductList::where('harvest_date', '<', Carbon::now()->subDays(7))
                // ->where('products_id', '!=', 3) 
                ->where('curr_quantity', '>', 0)
                ->get();
 
            foreach($decrease1 as $pl){
            $sub = $pl->curr_quantity;
                if($pl->products_id == 1){
                    $pl->update([
                        'curr_quantity' => $pl->curr_quantity - $sub
                        ]);
                }
                if($pl->products_id == 2){
                    $pl->update([
                        'curr_quantity' => $pl->curr_quantity - $sub,
                        ]);
                }
                // if($pl->products_id == 3){
                //     $pl->update([
                //         'curr_quantity' => $pl->curr_quantity + $sub,
                //         ]);
                // }
            }

    //    dd($decrease2);

        return view('product_lists.index')
            ->with('seasons', $seasons)
            ->with('season_lists', $season_lists)
            // ->with('product_list',$product_list)
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
            // 'season_start' => 'required|date|',
            // 'season_types_id' => 'required|int',
            // 'planned_hectares' => 'required|int',
            // 'planned_num_farmers' => 'required|string|max:255',
            // 'planned_qty' => 'required|string|max:255',
        ]);

        $seasons_id = $request->input('seasons_id');
        
        foreach($request->products_id as $key => $value) {
            $data=array(
                        'users_id'=> auth()->user()->id,
                        'seasons_id' => $seasons_id,
                        'products_id'=>$request->products_id [$key],
                        'orig_quantity'=>$request->orig_quantity [$key],
                        'curr_quantity'=>$request->orig_quantity [$key],
                        'harvest_date'=>$request->harvest_date [$key],
                        'price'=>$request->price [$key]);

            ProductList::insert($data);
            // dd($data);
        }  



        return redirect()->route('product_lists.index')->with('success','Products Updated ');
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $season = Season::find($id);
        $product_lists = ProductList::where('users_id', '=', auth()->user()->id)
                ->where('seasons_id', $season->id)
                ->get();

        // dd($product_lists);

        return view('product_lists.edit')
            ->with('season', $season)
            ->with('product_lists', $product_lists);
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
        $season = Season::findOrFail($id);
        $id = $season->id;

        foreach($request->products_id as $key => $value) {
            DB::table('product_lists')
            ->where('seasons_id', '=', $season->id)
            ->where('users_id', auth()->user()->id)
            ->update([
                'products_id'=>$request->products_id [$key],
                'curr_quantity' => $request->curr_quantity [$key],
                'price'=>$request->price [$key],
                'harvest_date'=>$request->harvest_date [$key],
                'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
                ]);
        }  
        
        return redirect()->route('product_lists.index')->with('success','Season Updated ');
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
        $product_lists = ProductList::where('products_id', '!=', 3) 
                        ->where('curr_quantity', '>', 0)
                        ->where('seasons_id', $latest_season->id)
                        ->get();

        // $product_lists = ProductList::all();
                        

        $farmers = DB::table('product_lists')
                        ->groupBy('rice_farmers_id', 'seasons_id', 'products_id');

        
        // dd($farmers);
        return view('product_lists/show_products')
                ->with('product_lists', $product_lists)
                ->with('farmers', $farmers)
                ;
    }



    public function view_product($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        
        $season = Season::find($id);
        $product_lists = ProductList::where('seasons_id', $season->id)->get();

        // $product = ProductList::where('created_at', '>=', Carbon::now()->subDays(7))
        //     ->where('product_id', '=', 2)
        //     ->get();

       
        return view('product_lists.view_product')
            ->with('season', $season)
            ->with('product_lists', $product_lists);
    }
}
