<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Passenger;
use App\Models\PaymentInfo;

class PaymentInfoController extends Controller
{
    public $ticket_value;
    public $f_name;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ticket_value, $f_name)
    {
        $this->ticket_value =$ticket_value;
        $this->passenger_name = $f_name;
        $tickets = Ticket::where('name', $this->ticket_value)->first();
        $ticket_id = $tickets->id;
        $passengers = Passenger::where('first_name', $this->passenger_name)->first();
        $passenger_id = $passengers->id;

        return view('layouts.ticket-payment-details',['ticket_id'=>$ticket_id, 'passenger_id'=>$passenger_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'dob' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'ticket' => 'required',
            'number' => 'required'
        ]);

        $pf_name = $request->input('first_name');
        $pl_name = $request->input('last_name');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $ticket = $request->input('ticket');
        $passenger = $request->input('passenger');
        $payment_number = $request->input('number');

        $paymentInfo = new PaymentInfo;
        $paymentInfo->first_name = $pf_name;
        $paymentInfo->last_name = $pl_name;
        $paymentInfo->date_of_birth = $dob;
        $paymentInfo->gender = $gender;
        $paymentInfo->email = $email;
        $paymentInfo->ticket_id = $ticket;
        $paymentInfo->passenger_id = $passenger;
        $paymentInfo->payment_number = $payment_number;

        $paymentInfo->save();

        $tickets = Ticket::where('id', $ticket)->first();
        $ticket_name = $tickets->name;

        $passengers = Passenger::where('id', $passenger)->first();
        $f_name = $passengers->first_name;

        return redirect()->route('payment.index', [$ticket_name, $f_name, $pf_name]);
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
