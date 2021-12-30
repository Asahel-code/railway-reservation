<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PassengerAge;

class PassengerAgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $age_groups = PassengerAge::get();
        return view('layouts.admin.passenger-age',['age_groups' => $age_groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.add.add-passenger-age');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'age_group_name' => 'required',
            'age_group_price' => 'required'
        ]);

        $age_group_name = $request->input('age_group_name');
        $price = $request->input('age_group_price');

        $age_group = new PassengerAge;
        $age_group->name = $age_group_name;
        $age_group->price = $price;

        $age_group->save();

        return redirect()->route('passenger-age.index')->withSuccess('A new age group has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $age_group = PassengerAge::where('id', $id)->first();

        return view('layouts.admin.edit.edit-passenger-age',['age_group'=> $age_group]);
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
        $request->validate([
            'age_group_name' => 'required',
            'age_group_price' => 'required'
        ]);

        $age_group_name = $request->input('age_group_name');
        $price = $request->input('age_group_price');

        PassengerAge::where('id', $id)->update([
            'name' => $age_group_name,
            'price' => $price
        ]);

        return redirect()->route('passenger-age.index')->withSuccess('A age group has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PassengerAge::where('id', $id)->delete();

        return redirect()->route('passenger-age.index')->withSuccess('A age group has been deleted successfully');
    }
}
