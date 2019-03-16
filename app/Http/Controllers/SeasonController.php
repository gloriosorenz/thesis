<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Season;
use App\SeasonList;
use App\SeasonStatus;
use App\SeasonType;
use App\User;
use App\ProductList;
use App\Product;
use DB;
use App\Mail\SeasonCreated;
use Mail;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::orderBy('id', 'desc')->paginate(12);
        $statuses = Season::where('season_statuses_id', '=', 2)->get();

        

    
        // dd($seasons, $statuses);
        return view('seasons.index', compact('seasons'))
            ->with('statuses', $statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seasons = Season::all();
        $types = SeasonType::get()->pluck('type', 'id');

        // Get Rice Farmers
        $users = User::where('roles_id', '=', 2)->get()->pluck('company', 'id');
        $statuses = SeasonStatus::get()->pluck('status', 'id');

        return view('seasons.create')
            ->with('seasons', $seasons)
            ->with('types', $types)
            ->with('users', $users)
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
        // Validation
        $request->validate([
            // "name"    => "required|array|min:3",
            // "name.*"  => "required|string|distinct|min:3",
            "planned_hectares.*"  => "required",
            "planned_num_farmers.*"  => "required|integer",
            "planned_qty.*"  => "required|integer",
            "users_id.*"  => "required|distinct",
        ]);
        

        $season = new Season;
        $season->season_start = $request->input('season_start');
        $season->season_types_id = $request->input('season_types_id');
        $season->season_statuses_id =1;

        

        if($season->save()){
            $id = $season->id;
            foreach($request->users_id as $key => $value) {
                $data=array(
                            'seasons_id' => $id,
                            'users_id'=>$request->users_id [$key],
                            'planned_hectares'=>$request->planned_hectares [$key],
                            'planned_num_farmers'=>$request->planned_num_farmers [$key],
                            'planned_qty'=>$request->planned_qty [$key],
                            'season_list_statuses_id' => 1,
                            'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
                            'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
                        );

                

                SeasonList::insert($data);
            }  
        }


        // Mail::to('renz_glorioso@dlsu.edu.ph')->send(

        //     new SeasonCreated()
        // );

        return redirect()->route('seasons.index')->with('success','Season Created ');
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
        $lists = SeasonList::where('seasons_id', $season->id)->get();
        $product_lists = ProductList::where('seasons_id', $season->id)->get();

        return view('seasons.show')
            ->with('season', $season)
            ->with('lists', $lists)
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
        $season = Season::findOrFail($id);
        $types = SeasonType::get()->pluck('type', 'id');
        // Get Rice Farmers
        $users = User::where('roles_id', '=', 2)->get()->pluck('company', 'id');
        $season_lists = SeasonList::where('seasons_id', $season->id)->get();
        $products = Product::all();
        $product_lists = ProductList::where('seasons_id', $season->id)->get();

        return view('seasons.edit')
            ->with('season', $season)
            ->with('types', $types)
            ->with('users', $users)
            ->with('season_lists', $season_lists)
            ->with('products', $products)
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
        // Validation
        $request->validate([
            // "name"    => "required|array|min:3",
            // "name.*"  => "required|string|distinct|min:3",
            "actual_hectares.*"  => "required",
            "actual_num_farmers.*"  => "required",
            "actual_qty.*"  => "required",
            "orig_quantity.*"  => "required",
            "harvest_date.*"  => "required",
            "price.*"  => "required",
        ]);

        $season = Season::findOrFail($id);
        $season->season_end = $request->input('season_end');
        // $season->season_statuses_id =2;

        // $list = SeasonList::count();
        // $done = SeasonList::where('seasons_id', $id)
        //     ->where('season_list_statuses_id', 2)->count();
        
        // if($list == $done)
        //     $season->season_statuses_id =2;
        // else
        //     $season->season_statuses_id =1;


        if($season->save()){
            $id = $season->id;
            $plist = $request->all();
            $plist = ProductList::where('seasons_id', $season->id)->get();
            foreach($request->id as $i => $id) { 
                $list = SeasonList::findOrFail($id);
                $list->actual_hectares = $request->actual_hectares[$i];
                $list->actual_num_farmers = $request->actual_num_farmers[$i];
                // $list->season_list_statuses_id = 2;
                $list->save();
            }

        
            foreach($request->products_id as $key => $value) {
                $data=array(
                            'seasons_id' => $season->id,
                            'users_id'=>$request->users_id [$key],
                            'products_id'=>$request->products_id [$key],
                            'orig_quantity'=>$request->orig_quantity [$key],
                            'curr_quantity'=>$request->orig_quantity [$key],
                            'harvest_date'=>$request->harvest_date [$key],
                            'price'=>$request->price [$key],
                            'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
                            'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
                        );
 
                ProductList::insert($data);
            }  
        }

        


     
        return redirect()->route('seasons.index')->with('success','Season Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        //
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function farmer_seasons()
    {
        $seasons = Season::all();

        // dd($seasons);
        return view('seasons.farmer_seasons')
            ->with('seasons', $seasons);
    }




}
