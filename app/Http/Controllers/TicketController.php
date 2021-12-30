<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PassengerAge;
use App\Models\Ticket;
use App\Models\Passenger;

class TicketController extends Controller
{
    public $ticket_value;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ticket_value)
    {
        $this->ticket_value =$ticket_value;
        $passenger_ages = PassengerAge::get();
        $tickets = Ticket::where('name', $this->ticket_value)->first();
        $ticket_id = $tickets->id;

        return view('layouts.passenger-details',['passenger_ages'=>$passenger_ages,'ticket_id'=>$ticket_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'dob' => 'required',
            'ticket' => 'required'
        ]);

        $f_name = $request->input('first_name');
        $l_name = $request->input('last_name');
        $age = $request->input('age');
        $dob = $request->input('dob');
        $ticket = $request->input('ticket');

        $passenger = new Passenger;
        $passenger->first_name = $f_name;
        $passenger->last_name = $l_name;
        $passenger->passengerAge_id = $age;
        $passenger->date_of_birth = $dob;
        $passenger->ticket_id = $ticket;

        $passenger->save();

        $tickets = Ticket::where('id', $ticket)->first();
        $ticket_name = $tickets->name;

        return redirect()->route('paymentinfo.index', [$ticket_name , $f_name]);
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
        //
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
        //
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
