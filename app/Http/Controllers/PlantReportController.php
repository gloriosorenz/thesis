<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlantReport;
use App\PlantData;
use App\Barangay;
use PDF;

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

        return view('reports.plant_reports.index')
            ->with('preports', $preports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangays = Barangay::orderBy('name')->get();

        $tagapo = Barangay::where('id', 11230)->first();
        $malitlit = Barangay::where('id', 9148)->first();
        $dita = Barangay::where('id', 8995)->first();
        $caingin = Barangay::where('id', 5875)->first();
        $sinalhan = Barangay::where('id', 11229)->first();
        $pooc = Barangay::where('id', 8757)->first();
        $labas = Barangay::where('id', 10711)->first();
        $balibago = Barangay::where('id', 7234)->first();
        $macabling = Barangay::where('id', 11221)->first();;
        $pulong = Barangay::where('id', 11227)->first();

        

        $data=array(
            'Tagapo' => $tagapo,
            'Malitlit' => $malitlit,
            'Dita' => $dita,
            'Caingin' => $caingin,
            'Sinalhan' => $sinalhan,
            'Pooc' => $pooc,
            'Labas' => $labas,
            'Balibago' => $balibago,
            'Macabling' => $macabling,
            'Pulong' => $pulong,
        );
        // dd($data);
        
        return view('reports.plant_reports.create')
            ->with('data', $data)
            ->with('tagapo', $tagapo)
            ->with('barangays', $barangays);
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
            // 'barangay' => 'required',
            // 'plant_area' => 'required|string|max:255',
        ]);
        
        $preport = new PlantReport;
        $preport->save();
    
        foreach($request->barangays_id as $key => $value) {
            $data=array(
                        'plant_reports_id'=>$preport->id,
                        'barangays_id'=>$request->barangays_id [$key],
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preport = PlantReport::findOrFail($id);
        $pdatas = PlantData::where('plant_reports_id', $preport->id)->get();

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
        $barangays = Barangay::orderBy('name')->get();

        return view('reports.plant_reports.edit')
            ->with('preport', $preport)
            ->with('barangays', $barangays);
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
        $preport = PlantReport::findOrFail($id);
        $preport->barangays_id = $request->get('barangay');
        $preport->plant_area = $request->get('plant_area');
        $preport->farmers = $request->get('farmers');
        $preport->save();

        return redirect('plant_reports')->with('success','Plant Report Upsated ');
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

        // pass view file
        $pdf = PDF::loadView('pdf.plant_report', compact('preport'), compact('pdatas'))->setPaper('a4', 'landscape');
        // download pdf
        return $pdf->stream('plant_report.pdf');
    }
}
