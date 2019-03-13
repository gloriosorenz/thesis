<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use App\CustomerType;
use App\User;
use App\Barangay;
use App\City;
use App\Province;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Customers
        $customers = User::where('roles_id', '=', 3)->get();

        return view('customers.index')
                ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangays = Barangay::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();

        return view('customers.create')
            ->with('barangays', $barangays)
            ->with('provinces', $provinces)
            ->with('cities', $cities);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 6);
        
         // Validation
         $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
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
        $user->password = Hash::make($password);
        $user->roles_id = 3;
        $user->save();


        return redirect()->route('customers.index')->with('success','Customer Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::find($id);
        return view('customers.show')
            ->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::find($id);
        $barangays = Barangay::orderBy('name')->get();

        return view('customers.edit')
            ->with('customer', $customer)
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
        $customer = User::find($id);
        $customer->company = $request->input('company');
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->barangay = $request->input('barangay');
        $customer->save();

        // dd($customer);

     

        return redirect('customers')->with('success','Customer Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
