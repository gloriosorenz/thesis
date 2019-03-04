<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\RiceFarmer;
use App\User;
use App\Barangay;
use App\City;
use App\Province;

class RiceFarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Rice Farmers
        $rice_farmers = User::where('roles_id', '=', 2)->get();

        // dd($rice_farmers);
        return view('rice_farmers.index')
                ->with('rice_farmers', $rice_farmers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangays = Barangay::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();
      
        return view('rice_farmers.create')
            ->with('barangays', $barangays)
            ->with('cities', $cities)
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'password' => 'required|string|min:6',
        ]);
        
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->street = $request->input('street');
        $user->barangays_id = $request->input('barangay');
        $user->cities_id = $request->input('city');
        $user->provinces_id = $request->input('province');
        $user->company = $request->input('company');
        $user->password = Hash::make($request['password']);
        $user->roles_id = 2;
        $user->save();

    
        // $farmers = RiceFarmer::create($request->all());
        // $users = User::create($request->all());

        return redirect()->route('rice_farmers.index')->with('success','Farmer Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $farmer = User::find($id);

        return view('rice_farmers.show')
            ->with('farmer', $farmer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $farmer = User::find($id);
        $barangays = Barangay::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();

        return view('rice_farmers.edit')
            ->with('farmer', $farmer)
            ->with('barangays', $barangays)
            ->with('cities', $cities)
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
        $farmer = User::find($id);
        $farmer->company = $request->input('company');
        $farmer->first_name = $request->input('first_name');
        $farmer->last_name = $request->input('last_name');
        $farmer->email = $request->input('email');
        $farmer->phone = $request->input('phone');
        $farmer->street = $request->input('street');
        $farmer->barangays_id = $request->input('barangay');
        $farmer->cities_id = $request->input('city');
        $farmer->provinces_id = $request->input('province');
        $farmer->save();

        // dd($farmer);

        return redirect('rice_farmers')->with('success','Farmer Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RiceFarmer  $riceFarmer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
