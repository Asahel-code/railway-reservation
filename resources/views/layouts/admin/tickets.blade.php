@extends('admin')

@section('title')
Tickets
@endsection 

@section('content')
<div id="content">
    <div class="container">
        <div class="row my-4">
            <div class="col-sm-12 page-content">
                <div class="inner-box">
                    <div class="admin-title-section d-flex justify-content-between p-2">
                        <h3 class="title-2"><i class="bi bi-credit-card"></i> Ticket</h3>
                        <a href="{{route('ticket.create')}}" class="action-btn btn-sm btn-success bi bi-plus-circle"> Add</a>
                    </div>
                    <div class="table-responsive">
                        @if($message = Session::get('success'))
                        <div class="my-4">
                            <div class="alert alert-success alert-block">
                                <strong>{{$message}}</strong>
                            </div>
                        </div>
                        @endif
                        <table class="table table-striped table-bordered add-manage-table">
                            <thead>
                                <tr>
                                    <th data-type="numeric"></th>
                                    <th>Name</th>
                                    <th>Ticket type</th>
                                    <th>Age group</th>
                                    <th>Type of seat</th>
                                    <th>Train name</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                <tr>
                                    <td class="add-img-selector">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$ticket->name}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$ticket->ticket_type}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$ticket->passengerAge_id}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$ticket->seat->name}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$ticket->train->name}}</h5>
                                    </td>

                                    <td class="action-td d-flex justify-content-around">
                                        <p class="">
                                            <a class="action-btn btn-primary btn-xs" href="{{route('ticket.edit', ['ticket'=>$ticket->id])}}"> <i class="bi bi-pencil-square-o"></i> Edit</a>
                                        </p>
                                        <p class="">
                                            <a class="action-btn btn-danger btn-xs" href="{{route('ticket.destroy', ['ticket'=>$ticket->id])}}"> <i class=" bi bi-trash"></i> Delete</a>
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection