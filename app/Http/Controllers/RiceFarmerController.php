<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\RiceFarmer;
use App\User;
use App\Barangay;

class RiceFarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rice_farmers = RiceFarmer::all();
        return view('rice_farmers.index', compact('rice_farmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangays = Barangay::orderBy('name')->get();
      
        return view('rice_farmers.create')
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);
        
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->barangay = $request->input('barangay');
        $user->password = Hash::make($request['password']);
        $user->roles_id = 2;
        
        $user->save();

        //Rice Farmer
        $farmer = new RiceFarmer;
        $farmer->company = $request->input('company');
        $farmer->users_id= $user->id;
        $farmer->save();


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
        $farmer = RiceFarmer::find($id);

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
        $farmer = RiceFarmer::find($id);
        $barangays = Barangay::orderBy('name')->get();

        return view('rice_farmers.edit')
            ->with('farmer', $farmer)
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
        $farmer = RiceFarmer::find($id);
        $farmer->company = $request->input('company');
        $farmer->users()->first_name = $request->input('first_name');
        $farmer->users()->last_name = $request->input('last_name');
        $farmer->users()->email = $request->input('email');
        $farmer->users()->phone = $request->input('phone');
        $farmer->users()->barangay = $request->input('barangay');
        // $farmer->users()->associate($farmer);
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
