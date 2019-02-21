<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Season;
use App\SeasonList;
use App\SeasonStatus;
use App\RiceFarmer;
use DB;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::orderBy('id', 'desc')->get();

        // dd($seasons);
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
        $statuses = SeasonStatus::get()->pluck('status', 'id');

        return view('seasons.create')
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
        // Validation
        $request->validate([
            // 'season_start' => 'required|date|',
            // 'season_types_id' => 'required|int',
            // 'planned_hectares' => 'required|int',
            // 'planned_num_farmers' => 'required|string|max:255',
            // 'planned_qty' => 'required|string|max:255',
        ]);

        $season = new Season;
        $season->season_start = $request->input('season_start');
        $season->season_types_id = $request->input('season_types_id');
        $season->season_statuses_id =1;

        if($season->save()){
            $id = $season->id;
            foreach($request->rice_farmers_id as $key => $value) {
                $data=array(
                            'seasons_id' => $id,
                            'rice_farmers_id'=>$request->rice_farmers_id [$key],
                            'planned_hectares'=>$request->planned_hectares [$key],
                            'planned_num_farmers'=>$request->planned_num_farmers [$key],
                            'planned_qty'=>$request->planned_qty [$key]);

                SeasonList::insert($data);
            }  
        }
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
        $types = \App\SeasonType::get()->pluck('type', 'id');
        $rice_farmers = \App\RiceFarmer::get()->pluck('company', 'id');
        $lists = SeasonList::where('seasons_id', $season->id)->get();

        return view('seasons.edit')
            ->with('season', $season)
            ->with('types', $types)
            ->with('rice_farmers', $rice_farmers)
            ->with('lists', $lists);
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
        $season->season_end = $request->input('season_end');
        $season->season_statuses_id =2;

        if($season->save()){
            $id = $season->id;
       
            $season_lists = $request->all();

            $lists = SeasonList::where('seasons_id', $season->id)->get(); 
            foreach($lists as $list){
                $key = array_search($list->id, $season_lists['id']);
                $list->actual_hectares = $request->actual_hectares[$key];
                $list->actual_num_farmers = $request->actual_num_farmers[$key];
                $list->actual_qty = $request->actual_qty[$key];
                $list->save();
            
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




}
