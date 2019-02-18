<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Season;
use App\SeasonList;
use App\RiceFarmer;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();
        return view('seasons.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = \App\SeasonType::get()->pluck('type', 'id');
        $rice_farmers = \App\RiceFarmer::get()->pluck('company', 'id');
        return view('seasons.create')
            ->with('types', $types)
            ->with('rice_farmers', $rice_farmers);
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
            'planned_hectares' => 'required|string|max:255',
            'planned_num_farmers' => 'required|string|max:255',
            'planned_qty' => 'required|string|max:255',
        ]);


        $season = new Season;
        $season->season_types_id = $request->input('season_types_id');
        $season->save();

        
        $farmers = $request->get('rice_farmers_id');
            foreach($request->rice_farmers_id as $key => $value) {
                $season_list = new SeasonList;
                $season_list->seasons_id = $season->id;
                $season_list->rice_farmers_id = $farmers[$key];
                $season_list->planned_hectares =$request->input('planned_hectares');
                $season_list->planned_num_farmers =$request->input('planned_num_farmers');
                $season_list->planned_qty =$request->input('planned_qty');
                $season_list->save();
            }  

        // $season_list = new SeasonList;
        // $season_list->seasons_id = $season->id;
        // $season_list->rice_farmers_id = $request->input('rice_farmers_id');
        // $season_list->planned_hectares = $request->input('planned_hectares');
        // $season_list->planned_num_farmers = $request->input('planned_num_farmers');
        // $season_list->planned_qty = $request->input('planned_qty');


        // $season_list->actual_hectares = $request->input('actual_hectares');
        // $season_list->actual_num_farmers = $request->input('actual_num_farmers');
        // $season_list->actual_qty = $request->input('actual_qty');
        
        // $season_list->save();

        // $data=array('rice_farmers_id'=>$request->rice_farmers_id [$key],
        //                     'planned_hectares'=>$request->planned_hectares [$key],
        //                     'planned_num_farmers'=>$request->planned_num_famers [$key],
        //                     'planned_qty'=>$request->planned_qty [$key]);

        //         SeasonList::insert($data);
        

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

        return view('seasons.show')
            ->with('season', $season)
            ->with('lists', $lists);

        // $season = SeasonList::all();
        // dd($season);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        //
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









    public function add_farmer($id)
    {
        $season = Season::find($id);

        $rice_farmers = \App\RiceFarmer::get()->pluck('company', 'id');

        
        return view('seasons.add_farmer')
            ->with('rice_farmers', $rice_farmers);
    }


    public function store_farmer(Request $request)
    {
        // Validation
        $request->validate([
            'planned_hectares' => 'required|string|max:255',
            'planned_num_farmers' => 'required|string|max:255',
            'planned_qty' => 'required|string|max:255',
        ]);


        $season_list = new SeasonList;
        $season_list->seasons_id = 
        $season_list->rice_farmers_id = $request->input('rice_farmers_id');
        $season_list->planned_hectares = $request->input('planned_hectares');
        $season_list->planned_num_farmers = $request->input('planned_num_farmers');
        $season_list->planned_qty = $request->input('planned_qty');

        $season_list->actual_hectares = $request->input('actual_hectares');
        $season_list->actual_num_farmers = $request->input('actual_num_farmers');
        $season_list->actual_qty = $request->input('actual_qty');
        $season_list->save();

        return redirect()->route('seasons.index')->with('success','Season Added ');
    }
}
