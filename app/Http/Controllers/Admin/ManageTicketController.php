<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Train;
use App\Models\SeatType;
use App\Models\ContainerSize;
use App\Models\PassengerAge;

class ManageTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('seat')->with('container')->with('train')->get();
        return view('layouts.admin.tickets', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $age_groups = PassengerAge::get();
        $seat_prices = SeatType::get();
        $container_sizes = ContainerSize::get();
        $trains = Train::get();

        return view(
            'layouts.admin.add.add-tickets',
            [
                'age_groups' => $age_groups, 'seat_prices' => $seat_prices,
                'container_sizes' => $container_sizes, 'trains' => $trains
            ]
        );
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
            'ticket_name' => 'required',
            'ticket_type' => 'required',
            'age_group' => 'required',
            'train' => 'required'
        ]);

        $name = $request->input('ticket_name');
        $ticket_type = $request->input('ticket_type');
        $age_group = $request->input('age_group');
        $seat_price = $request->input('seat');
        $container_price = $request->input('container');
        $train = $request->input('train');

        $ticket = new Ticket;
        $ticket->name = $name;
        $ticket->ticket_type = $ticket_type;
        $ticket->passengerAge_id = $age_group;
        $ticket->seat_id = $seat_price;
        $ticket->container_id = $container_price;
        $ticket->train_id = $train;

        $ticket->save();

        return redirect()->route('ticket.index')->withSuccess('A new set of tickets have been added successfully');
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
        $age_groups = PassengerAge::get();
        $seat_prices = SeatType::get();
        $container_sizes = ContainerSize::get();
        $trains = Train::get();

        $ticket = Ticket::where('id', $id)->first();
        return view(
            'layouts.admin.edit.edit-tickets',
            [
                'ticket' => $ticket, 'age_groups' => $age_groups,
                'seat_prices' => $seat_prices, 'container_sizes' => $container_sizes, 'trains' => $trains
            ]
        );
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
            'ticket_name' => 'required',
            'ticket_type' => 'required',
            'age_group' => 'required',
            'train' => 'required'
        ]);

        $name = $request->input('ticket_name');
        $ticket_type = $request->input('ticket_type');
        $age_group = $request->input('age_group');
        $seat_price = $request->input('seat');
        $container_price = $request->input('container');
        $train = $request->input('train');

        Ticket::where('id', $id)->update([
            'name' => $name,
            'ticket_type' => $ticket_type,
            'passengerAge_id' => $age_group,
            'seat_id' => $seat_price,
            'container_id' => $container_price,
            'train_id' => $train
        ]);

        return redirect()->route('ticket.index')->withSuccess('A set of tickets have been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::where('id', $id)->delete();

        return redirect()->route('ticket.index')->withSuccess('A set of tickets have been deleted successfully');
    }
}
