<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Passenger;
use App\Models\PaymentInfo;

class PaymentController extends Controller
{
    public $ticket_value;
    public $f_name;
    public $pf_name;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ticket_value, $f_name, $pf_name)
    {
        $this->ticket_value =$ticket_value;
        $this->passenger_name = $f_name;
        $this->payment_name = $pf_name;
        $ticket = Ticket::where('name', $this->ticket_value)->first();
        $ticket_price = $ticket->seat->price;

        $passenger = Passenger::with('passengerAge')->where('first_name', $this->passenger_name)->first();
        //$passe_price = $passenger->passengerAge->price;

        $payment_details = PaymentInfo::where('first_name', $this->payment_name)->first();

        //$total_price = dd($ticket_price + $payment_details);
        
        return view('layouts.validation',['ticket'=> $ticket, 'passenger' => $passenger, 'payment_details'=>$payment_details]);
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
        return redirect()->route('payment.notification');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_value)
    {
       
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
