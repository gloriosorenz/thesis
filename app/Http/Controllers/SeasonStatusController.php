<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Season;
use App\SeasonList;
use DB;

class SeasonStatusController extends Controller
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



        $season_list = SeasonList::all();
        $ongoing = Seasonlist::where('season_list_statuses_id', 1)
                ->where('seasons_id', $latest_season->id)->get();
        $done = Seasonlist::where('season_list_statuses_id', 2)
                ->where('seasons_id', $latest_season->id)->get();

        return view('season_statuses.index')
            ->with('latest_season', $latest_season)
            ->with('season_list', $season_list)
            ->with('ongoing', $ongoing)
            ->with('done', $done);
    }

    public function complete_season_farmer($id){
        $list = SeasonList::findOrFail($id);
        $list->season_list_statuses_id = 2;
        $list->save();

        return redirect('/season_statuses')->with('success', 'Farmer Done');
    }

    public function cancel($id){
        $list = SeasonList::findOrFail($id);
        $list->season_list_statuses_id = 1;
        $list->save();

        return redirect('/season_statuses')->with('success', 'Cancelled');
    }

    public function complete_season($id){

        // Get latest season
        $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();

        $list = Season::findOrFail($latest_season->id);
        $list->season_statuses_id = 2;
        $list->save();

        return redirect('/season_statuses')->with('success', 'Season Complete');
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
        //
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
}
