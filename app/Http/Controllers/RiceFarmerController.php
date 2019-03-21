<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\RiceFarmer;
use App\User;
use App\Barangay;
use App\City;
use App\Province;
use App\Region;
use Mail;
use App\Mail\SendPassword;

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
        //282 Santa Rosa Region 3  0349
        //433 City of Santa Rosa Region 4 province 0434 ->> LAGUNA 043428
        /*
            Tagapo
            Pooc
            Labas
            Sinalhan
            Aplaya
            Balibago
            Macabling
            Caingin
            Dita
            Dila
            Malitlit
            Pulong Sta. Cruz
        */

        $barangays = Barangay::orderBy('name')->get();
        $lagunabarangays = Barangay::where('cities_id','=', 43428)->whereNotIn('id', array(11218, 11219, 11223,11224,11225,11228))->get();
            // dd($lagunabarangays);
        $cities = City::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();
        $calabarzon = Region::where('id','=', 4)->get();
        $starosa = City::where('id','=', 433)->get();
        $laguna = Province::where('id','=',19)->get();
      
        return view('rice_farmers.create')
            ->with('barangays', $barangays)
            ->with('lagunabarangays', $lagunabarangays)
            ->with('cities', $cities)
            ->with('provinces', $provinces)
            ->with('calabarzon', $calabarzon)
            ->with('laguna',$laguna)
            ->with('starosa',$starosa)
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
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
        $password = substr($random, 0, 6);
        
        // Validation
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'unique:users,email,$this->id,id',
            'phone' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required',
            'city' => 'required',
            'province' => 'required',
            'company' => 'required|string|max:255',
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
        $user->no_farmers = $request->input('no_farmers');
        $user->hectares = $request->input('hectares');
        $user->password = Hash::make($password);
        $user->roles_id = 2;
        $user->save();


         // EMAIL
         $first_name = $user->first_name;
         $data = array(
             'password' => $password,
             'first_name' => $first_name,
         );
          // Mail to User
          Mail::to($user->email)->send(
              new SendPassword($data)
          );

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
        $lagunabarangays = Barangay::where('cities_id','=', 43428)->whereNotIn('id', array(11218, 11219, 11223,11224,11225,11228))->get();
            // dd($lagunabarangays);
        $cities = City::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();
        $calabarzon = Region::where('id','=', 4)->get();
        $starosa = City::where('id','=', 433)->get();
        $laguna = Province::where('id','=',19)->get();
      
        return view('rice_farmers.edit')
            ->with('barangays', $barangays)
            ->with('lagunabarangays', $lagunabarangays)
            ->with('cities', $cities)
            ->with('provinces', $provinces)
            ->with('calabarzon', $calabarzon)
            ->with('laguna',$laguna)
            ->with('starosa',$starosa)
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
