<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeatType;

class SeatTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seat_types = SeatType::get();
        return view('layouts.admin.seat-type',['seat_types' => $seat_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.add.add-seat-type');
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
            'seat_type_name' => 'required',
            'seat_type_price' => 'required'
        ]);

        $seat_type_name = $request->input('seat_type_name');
        $price = $request->input('seat_type_price');

        $seat_type = new SeatType;
        $seat_type->name = $seat_type_name;
        $seat_type->price = $price;

        $seat_type->save();

        return redirect()->route('seat-type.index')->withSuccess('A new seat pricing has been added successfully');
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
        $seat_type = SeatType::where('id', $id)->first();

        return view('layouts.admin.edit.edit-seat-type',['seat_type'=> $seat_type]);
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
            'seat_type_name' => 'required',
            'seat_type_price' => 'required'
        ]);

        $seat_type_name = $request->input('seat_type_name');
        $price = $request->input('seat_type_price');

        SeatType::where('id', $id)->update([
            'name' => $seat_type_name,
            'price' => $price
        ]);

        return redirect()->route('seat-type.index')->withSuccess('A seat pricing has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SeatType::where('id', $id)->delete();

        return redirect()->route('seat-type.index')->withSuccess('A seat pricing has been deleted successfully');

    }
}
