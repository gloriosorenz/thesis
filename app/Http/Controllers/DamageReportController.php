<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DamageReport;
use App\Region;
use App\Province;
use PDF;

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

        return view('damage_reports.index')
            ->with('dreports', $dreports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();

        return view('damage_reports.create')
            ->with('regions', $regions)
            ->with('provinces', $provinces);
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
            'calamity' => 'required|string|max:255',
            'narrative' => 'required|string|max:255',
        ]);

        $dreport = new DamageReport;
        $dreport->calamity = $request->input('calamity');
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


        return redirect()->route('damage_reports.index')->with('success','Damage Report Created ');
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
        return view('damage_reports.show')
            ->with('dreport', $dreport);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dreport = DamageReport::findOrFail($id);
        $regions = Region::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();

        return view('damage_reports.edit')
            ->with('dreport', $dreport)
            ->with('regions', $regions)
            ->with('provinces', $provinces);
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
        $dreport->calamity = $request->input('calamity');
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


        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('pdf.damage_report', compact('dreport'));

        // $pdf = PDF::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');
  
        return $pdf->stream('damage_report.pdf');
    }
}
