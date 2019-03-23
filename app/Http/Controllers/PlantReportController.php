<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlantReport;
use App\PlantData;
use App\Barangay;
use App\User;
use PDF;
use DB;
use Carbon\Carbon;

class PlantReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preports = PlantReport::all();
        // $preports = PlantReport::with('plant_datas')->find();

        $check_date = PlantReport::whereMonth('created_at', '=', date('m'))
                    ->get();

        // dd($check_date);

        return view('reports.plant_reports.index')
            ->with('preports', $preports)
            ->with('check_date', $check_date)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('roles_id', '=', 2)->get()->pluck('company', 'id');

        
        return view('reports.plant_reports.create')
            ->with('users', $users);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // Validation
        $request->validate([
            // 'barangay' => 'required',
            // 'plant_area' => 'required|string|max:255',
            "plant_area.*"  => "required",
            "farmers.*"  => "required|integer",
            "users_id.*"  => "required|distinct",
        ]);
        

        $plant_report = PlantReport::findOrFail($id);
    
        foreach($request->users_id as $key => $value) {
            $data=array(
                        'plant_reports_id'=>$preport->id,
                        'users_id'=>$request->users_id [$key],
                        'plant_area'=>$request->plant_area [$key],
                        'farmers'=>$request->farmers [$key],
                        'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
                    );

            PlantData::insert($data);
            // dd($data);
        }  

        return redirect()->route('plant_reports.index')->with('success','Plant Report Created ');
    }


    public function addPlantReport(){
        // Get latest season
        $latest_season = DB::table('seasons')->orderBy('id', 'desc')->first();

        $preport = new PlantReport;
        $preport->seasons_id = $latest_season->id;
        $preport->save();

        return redirect()->back()->with('success','Plant Report Created ');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preport = PlantReport::findOrFail($id);

        // $pdatas = PlantData::where('plant_reports_id', $preport->id)->get();

        $pdatas = DB::table('plant_datas')
            ->join('users', 'plant_datas.users_id', '=', 'users.id')
            ->select('users.barangays_id', 	DB::raw("SUM(plant_area) as plant_area"), 	DB::raw("SUM(farmers) as farmers"))
            ->groupBy('barangays_id')
            ->get();

        // dd($pdatas);

        return view('reports.plant_reports.show')
            ->with('preport', $preport)
            ->with('pdatas',$pdatas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preport = PlantReport::findOrFail($id);
        $users = User::where('roles_id', '=', 2)->get()->pluck('company', 'id');


        return view('reports.plant_reports.edit')
            ->with('preport', $preport)
            ->with('users', $users)
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

        // Validation
        $request->validate([
            "plant_area.*"  => "required",
            "farmers.*"  => "required|integer",
            "users_id.*"  => "required|distinct",
        ]);
        

        $plant_report = PlantReport::findOrFail($id);
    
        foreach($request->users_id as $key => $value) {
            $data=array(
                        'plant_reports_id'=>$plant_report->id,
                        'users_id'=>$request->users_id [$key],
                        'plant_area'=>$request->plant_area [$key],
                        'farmers'=>$request->farmers [$key],
                        'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
                    );

            PlantData::insert($data);
            // dd($data);
        }  

        return redirect()->route('plant_reports.index')->with('success','Plant Report Created ');
       

        return redirect('plant_reports')->with('success','Plant Report Updated ');
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


    public function pdfview(Request $request, $id)
    {

        $preport = PlantReport::findOrFail($id);
        $pdatas = PlantData::where('plant_reports_id', $preport->id)->get();

        $pdatas = DB::table('plant_datas')
            ->join('users', 'plant_datas.users_id', '=', 'users.id')
            ->select('users.barangays_id', 	DB::raw("SUM(plant_area) as plant_area"), 	DB::raw("SUM(farmers) as farmers"))
            ->groupBy('barangays_id')
            ->get();

        // pass view file
        $pdf = PDF::loadView('pdf.plant_report', compact('preport'), compact('pdatas'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('plant_report.pdf');
    }


    public function deactivateReport($id){
        $preport = PlantReport::findOrFail($id);
        $preport->active = 2;
        $preport->save();
    }
}
