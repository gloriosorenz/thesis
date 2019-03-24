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
// use App\Mail\SeasonCreated;
use Mail;
use PDF;
use App\Notifications\SeasonCreated;
use App\Notifications\SeasonComplete;
use Notification;

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

        // Get latest season
        $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();

    
        // dd($seasons, $statuses);
        return view('seasons.index')
            ->with('seasons', $seasons)
            ->with('statuses', $statuses)
            ->with('latest_season', $latest_season);
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
            'season_start' => 'required',
            'season_types_id' => 'required',
        ]);
        

        $season = new Season;
        $season->season_start = $request->input('season_start');
        $season->season_types_id = $request->input('season_types_id');
        $season->season_statuses_id =1;
        $season->save();

    

       
        // Notification
        $recipients = User::where('roles_id', 3)->get();
        Notification::send($recipients, new SeasonCreated());


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

        $lists = DB::table('season_lists')
                ->join('seasons', 'season_lists.seasons_id', '=', 'seasons.id')
                ->join('users', 'season_lists.users_id', '=', 'users.id')
                ->where('season_lists.seasons_id', $season->id)
                ->select('users.barangays_id', 
                        DB::raw("SUM(planned_hectares) as planned_hectares"), 
                        DB::raw("SUM(planned_num_farmers) as planned_num_farmers"),
                        DB::raw("SUM(planned_qty) as planned_qty"),
                        DB::raw("SUM(actual_hectares) as actual_hectares"), 
                        DB::raw("SUM(actual_num_farmers) as actual_num_farmers"),
                        DB::raw("SUM(actual_qty) as actual_qty")
                        )
                ->groupBy('barangays_id')
                ->get();

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
        $season = Season::findOrFail($id);
        $types = SeasonType::get()->pluck('type', 'id');
        $products = Product::all();

        //  FOR ADMIN
        // Get Rice Farmers
        $users = User::where('roles_id', '=', 2)->get()->pluck('company', 'id');

        // dd($farmer);
        $season_lists = SeasonList::where('seasons_id', $season->id)->get();
        $product_lists = ProductList::where('seasons_id', $season->id)->get();



        // FOR RICE FARMER
        // Get Rice Farmer
         $farmer = SeasonList::where('users_id', auth()->user()->id)
         ->where('seasons_id', $season->id)
         ->get();

         $farmer_product = ProductList::where('seasons_id', $season->id)
            ->where('users_id', auth()->user()->id)
            ->get();

        return view('seasons.edit')
            ->with('season', $season)
            ->with('types', $types)
            ->with('users', $users)
            ->with('season_lists', $season_lists)
            ->with('products', $products)
            ->with('product_lists', $product_lists)
            ->with('farmer', $farmer)
            ->with('farmer_product', $farmer_product);
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
            "season_end" => "required",
            // "actual_hectares.*"  => "required",
            // "actual_num_farmers.*"  => "required",
            // "actual_qty.*"  => "required",
            // "orig_quantity.*"  => "required",
            // "harvest_date.*"  => "required",
            // "price.*"  => "required",
        ]);

        $season = Season::findOrFail($id);
        $season->season_end = $request->input('season_end');
        // $season->season_statuses_id = 2;
        $season->save();

        

        // Notification
        $recipients = User::where('roles_id', 3)->get();
        Notification::send($recipients, new SeasonComplete());


     
        return redirect()->route('seasons.index')->with('success','Season Updated ');
    }


    // Update Single Farmer
    public function update_farmer(Request $request, $id){
        $season = Season::findOrFail($id);

        $season_list = SeasonList::where('seasons_id', $season->id)->get();
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




    // Complete Season
    public function complete_season($id){

        // Get latest season
        $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();

        $season = Season::findOrFail($latest_season->id);
        $season->season_statuses_id = 2;
        $season->save();

        $season_list = SeasonList::all();

        foreach($season_list as $list){
            if($list->seasons_id == $latest_season->id){
                $list->season_list_statuses_id == 2;
                $list->save();
            }
        }

        return redirect('/seasons')->with('success', 'Season Complete');
    }

    // Generate PDF
    public function pdfview(Request $request, $id)
    {
        $season = Season::find($id);
        // $lists = SeasonList::where('seasons_id', $season->id)->get();

        $lists = DB::table('season_lists')
        ->join('seasons', 'season_lists.seasons_id', '=', 'seasons.id')
        ->join('users', 'season_lists.users_id', '=', 'users.id')
        ->where('season_lists.seasons_id', $season->id)
        ->select('users.barangays_id', 
                DB::raw("SUM(planned_hectares) as planned_hectares"), 
                DB::raw("SUM(planned_num_farmers) as planned_num_farmers"),
                DB::raw("SUM(planned_qty) as planned_qty"),
                DB::raw("SUM(actual_hectares) as actual_hectares"), 
                DB::raw("SUM(actual_num_farmers) as actual_num_farmers"),
                DB::raw("SUM(actual_qty) as actual_qty")
                )
        ->groupBy('barangays_id')
        ->get();

        // pass view file
        $pdf = PDF::loadView('pdf.season_report', compact('season', 'lists'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('season_report.pdf');
    }




}
