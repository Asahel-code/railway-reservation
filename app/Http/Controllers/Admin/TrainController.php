<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Train;
use App\Models\Destination;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trains = Train::with('source')->with('destination')->get();
        return view('layouts.admin.train',['trains' => $trains]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::get();
        return view('layouts.admin.add.add-train', ['destinations'=>$destinations]);
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
            'train_number' => 'required',
            'train_name' => 'required',
            'first_class' => 'required',
            'economy' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'travel_date' => 'required',
            'source' => 'required',
            'destination' => 'required'
        ]);

        $train_number = $request->input('train_number');
        $train_name = $request->input('train_name');
        $first_class_seats = $request->input('first_class');
        $economy_seats = $request->input('economy');
        $departure = $request->input('departure_time');
        $arrival = $request->input('arrival_time');
        $travel_date = $request->input('travel_date');
        $source = $request->input('source');
        $destination = $request->input('destination');
        

        $train = new Train;
        $train->number = $train_number;
        $train->name = $train_name;
        $train->first_class_seats = $first_class_seats;
        $train->economy_seats = $economy_seats;
        $train->departure = $departure;
        $train->arrival = $arrival;
        $train->date = $travel_date;
        $train->source_id = $source;
        $train->destination_id = $destination;

        $train->save();

        return redirect()->route('train.index')->withSuccess('A new train has been added successfully');
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
        $destinations = Destination::get();
        $train = Train::where('id', $id)->with('source')->with('destination')->first();
       
        return view('layouts.admin.edit.edit-train',['train'=> $train,'destinations'=>$destinations]);
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
            'train_number' => 'required',
            'train_name' => 'required',
            'first_class' => 'required',
            'economy' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'travel_date' => 'required',
            'source' => 'required',
            'destination' => 'required'
        ]);

        $train_number = $request->input('train_number');
        $train_name = $request->input('train_name');
        $first_class_seats = $request->input('first_class');
        $economy_seats = $request->input('economy');
        $departure = $request->input('departure_time');
        $arrival = $request->input('arrival_time');
        $travel_date = $request->input('travel_date');
        $source = $request->input('source');
        $destination = $request->input('destination');

        Train::where('id', $id)->update([
            'number' => $train_number,
            'name' => $train_name,
            'first_class_seats' => $first_class_seats,
            'economy_seats' => $economy_seats,
            'departure' => $departure,
            'arrival' => $arrival,
            'date' => $travel_date,
            'source_id' => $source,
            'destination_id' => $destination
        ]);

        return redirect()->route('train.index')->withSuccess('A train has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Train::where('id', $id)->delete();

        return redirect()->route('train.index')->withSuccess('A train has been deleted successfully');
    }
}
