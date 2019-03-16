<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Barangay;
use App\City;
use App\Province;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Role::get()->pluck('title', 'id');
        $barangays = Barangay::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();

        return view('users.create')
            ->with('roles', $roles)
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
        $user->roles_id = $request->input('roles_id');
        // $user->password = Hash::make($request['password']);
        $user->password = Hash::make($password);
        $user->save();
        
        // $users = User::create($request->all());

        return redirect()->route('users.index')->with('success','User Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = \App\Role::get()->pluck('title', 'id');
        $barangays = Barangay::orderBy('name')->get();
        $provinces = Province::orderBy('name')->get();
        $cities = City::orderBy('name')->get();

        return view('users.edit')
            ->with('user', $user)
            ->with('barangays', $barangays)
            ->with('provinces', $provinces)
            ->with('cities', $cities)
            ->with('roles', $roles);
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
        // $user = User::find($id);
        // $user->first_name = $request->input('first_name');
        // $user->last_name = $request->input('last_name');
        // $user->email = $request->input('email');
        // $user->phone = $request->input('phone');
        // $user->address = $request->input('address');
        // $user->save();


        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->street = $request->input('street');
        $user->barangays_id = $request->input('barangay');
        $user->cities_id = $request->input('city');
        $user->provinces_id = $request->input('province');
        $user->company = $request->input('company');
        $user->roles_id = $request->input('roles_id');
        // $user->password = Hash::make($request['password']);
        // $user->password = Hash::make($password);
        $user->save();

        return redirect('users')->with('success','User Updated ');
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

}
