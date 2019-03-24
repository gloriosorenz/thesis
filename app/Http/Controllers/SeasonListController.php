<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Season;
use App\SeasonList;
use App\User;
use DB;
use App\Mail\FarmerSeasonDone;
use Mail;

class SeasonListController extends Controller
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

        // Farmer Side
        $ongoing = SeasonList::where('season_list_statuses_id', 1)
                    ->where('seasons_id', $latest_season->id)
                    ->where('users_id', auth()->user()->id)
                    ->get();
        $done = SeasonList::where('season_list_statuses_id', 2)
                    ->where('seasons_id', $latest_season->id)
                    ->where('users_id', auth()->user()->id)
                    ->get();

        $season_lists = SeasonList::where('users_id', auth()->user()->id)
                    ->get();


        // Admin Side
        $current = SeasonList::where('seasons_id', $latest_season->id)->get();
        $all_season_lists =SeasonList::all();


        $active = SeasonList::where('seasons_id', $latest_season->id)
                    ->where('users_id', auth()->user()->id)
                    ->get()
                    ->count();
        
        
        

        // dd($active);

        return view('season_lists.index')
            ->with('all_season_lists', $all_season_lists)
            ->with('current', $current)
            ->with('season_lists', $season_lists)
            ->with('ongoing', $ongoing)
            ->with('done', $done)
            ->with('active', $active)
            ->with('latest_season', $latest_season);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('roles_id', '=', 2)->get()->pluck('company', 'id');

        return view('season_lists.create')
            ->with('users', $users);
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
            "planned_hectares.*"  => "required",
            "planned_num_farmers.*"  => "required|integer",
            "planned_qty.*"  => "required|integer",
            "users_id.*"  => "required|distinct",
        ]);


        // Get latest season
        $season = DB::table('seasons')
            ->where('season_statuses_id', 1)
            ->first();

        //  Store Season List
        foreach($request->users_id as $key => $value) {
            $data=array(
                        'seasons_id' => $season->id,
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
    
    return redirect()->route('season_lists.index')->with('success','Plan Report Created ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $season_list = SeasonList::findOrFail($id);


        return view('season_lists.show')
            ->with('season_list', $season_list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season_list = SeasonList::findOrFail($id);

        return view('season_lists.edit')
            ->with('season_list', $season_list);
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

        $season_list = SeasonList::findOrFail($id);

        // Get latest season
        $season = DB::table('seasons')
        ->where('season_statuses_id', 1)
        ->first();

        $season_list->actual_hectares = $request->input('actual_hectares');
        $season_list->actual_num_farmers = $request->input('actual_num_farmers');
        $season_list->season_list_statuses_id = 2;
        $season_list->save();


        // Get email
        $admin = User::where('roles_id',1)->pluck('email');
        // Get Season 
        $season = $season_list->seasons->id;

        // Mail to User
        Mail::to($admin)->send(new FarmerSeasonDone($season_list));

        return redirect()->route('season_lists.index')->with('success','Season List Updated ');
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

    public function complete_season_farmer($id){
        $list = SeasonList::findOrFail($id);
        $list->season_list_statuses_id = 2;
        $list->save();

        return redirect('/season_lists')->with('success', 'Farmer Done');
    }

    public function cancel($id){
        $list = SeasonList::findOrFail($id);
        $list->season_list_statuses_id = 1;
        $list->save();

        return redirect('/season_lists')->with('success', 'Cancelled');
    }

    
}
