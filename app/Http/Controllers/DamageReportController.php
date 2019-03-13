<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DamageReport;
use App\DamageData;
use App\Region;
use App\Province;
use App\Calamity;
use PDF;
use DB;

class DamageReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dreports = DamageReport::all();

        return view('reports.damage_reports.index')
            ->with('dreports', $dreports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calamities = Calamity::orderBy('type')->get();
        // $regions = Region::orderBy('name')->get();
        // $provinces = Province::orderBy('name')->get();
        // $calabarzon = Region::where('id','=', 4)->get()->pluck('name');
        $calabarzon = Region::where('id','=', 4)->get();
        $laguna = Province::where('id','=',19)->get();

        return view('reports.damage_reports.create')
            ->with('calabarzon', $calabarzon)
            ->with('calamities',$calamities)
            ->with('laguna',$laguna)
            // ->with('provinces', $provinces)
            ;
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
            'calamity' => 'required',
            'narrative' => 'required|string|max:255',
        ]);
        

        $dreport = new DamageReport;
        $dreport->calamities_id = $request->get('calamity');
        $dreport->narrative = $request->get('narrative');
        $dreport->regions_id = $request->get('region');
        $dreport->provinces_id = $request->get('province');
        $dreport->save();



        foreach($request['crop'] as $key => $value) {

            $data=array(
                        'damage_reports_id' => $dreport->id,
                        'crop'=>$request->crop [$key],
                        'crop_stage'=>$request->crop_stage [$key],
                        'production'=>$request->production [$key],
                        'animal'=>$request->animal [$key],
                        'animal_head'=>$request->animal_head [$key],
                        'fish'=>$request->fish [$key],
                        'area'=>$request->area [$key],
                        'fish_pieces'=>$request->fish_pieces [$key],
                        'created_at' =>  \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
                    );

            DamageData::insert($data);
        }  




        return redirect()->route('reports.damage_reports.index')->with('success','Damage Report Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dreport = DamageReport::findOrFail($id);
        $calamities = Calamity::orderBy('type')->get();
        $calabarzon = Region::where('id','=', 4)->get();
        $laguna = Province::where('id','=',19)->get();

        return view('reports.damage_reports.show')
            ->with('calabarzon', $calabarzon)
            ->with('calamities',$calamities)
            ->with('laguna',$laguna)
            ->with('dreport', $dreport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dreport = DamageReport::findOrFail($id);
        $ddatas = DamageData::where('damage_reports_id', $dreport->id)->get();
        $calamities = Calamity::orderBy('type')->get();
        $calabarzon = Region::where('id','=', 4)->get();
        $laguna = Province::where('id','=',19)->get();

        return view('reports.damage_reports.edit')
            ->with('dreport', $dreport)
            ->with('ddatas', $ddatas)
            ->with('calabarzon', $calabarzon)
            ->with('calamities',$calamities)
            ->with('laguna',$laguna);
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
        $dreport = DamageReport::findOrFail($id);
        $dreport->calamities_id = $request->input('calamity');
        $dreport->narrative = $request->input('narrative');
        $dreport->crop = $request->input('crop');
        $dreport->crop_stage = $request->input('crop_stage');
        $dreport->production = $request->input('production');
        $dreport->animal = $request->input('animal');
        $dreport->animal_head = $request->input('animal_head');
        $dreport->fish = $request->input('fish');
        $dreport->area = $request->input('area');
        $dreport->fish_pieces = $request->input('fish_pieces');
        $dreport->regions_id = $request->input('region');
        $dreport->provinces_id = $request->input('province');
        $dreport->save();

        return redirect('damage_reports')->with('success','Damage Report Updated ');

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
    public function generatePDF($id)
    {
        $dreport = DamageReport::findOrFail($id);
        $ddatas = DamageData::where('damage_reports_id', $dreport->id)->get();

        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        $pdf = PDF::loadView('pdf.damage_report', compact('dreport'), compact('ddatas'))->setPaper('a4', 'landscape');

        // $pdf = PDF::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');

  
        return $pdf->stream('damage_report.pdf');


   
    }


    public function pdfview(Request $request, $id)
    {

        $dreport = DamageReport::findOrFail($id);
        $ddatas = DamageData::where('damage_reports_id', $dreport->id)->get();

        $users = DB::table('users')->get();
        view()->share('users',$users);


        // pass view file
        $pdf = PDF::loadView('pdf.damage_report', compact('dreport'), compact('ddatas'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('damage_report.pdf');
    }
}
