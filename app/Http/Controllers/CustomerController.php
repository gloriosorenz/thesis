<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use App\CustomerType;
use App\User;
use App\Barangay;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = \App\CustomerType::get()->pluck('type', 'id');
        $barangays = Barangay::orderBy('name')->get();

        return view('customers.create', compact('types'))
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
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'company' => 'required|string|max:255',
        ]);
        
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->barangay = $request->input('barangay');
        $user->password = Hash::make($request['password']);
        $user->roles_id = 3;
        $user->save();

        // Customer
        $customer = new Customer;
        $customer->company = $request->input('company');
        $customer->users_id = $user->id;
        $customer->customer_types_id = $request->input('customer_types_id');
        $customer->save();

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
        $customer = Customer::find($id);
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
        $customer = Customer::find($id);
        $types = \App\CustomerType::get()->pluck('type', 'id');
        $barangays = Barangay::orderBy('name')->get();

        return view('customers.edit')
            ->with('customer', $customer)
            ->with('types', $types)
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
        $customer = Customer::find($id);
        $customer->company = $request->input('company');
        $customer->users->first_name = $request->input('first_name');
        $customer->users->last_name = $request->input('last_name');
        $customer->users->email = $request->input('email');
        $customer->users->phone = $request->input('phone');
        $customer->users->barangay = $request->input('barangay');
        $customer->customer_types_id = $request->input('customer_types_id');
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
