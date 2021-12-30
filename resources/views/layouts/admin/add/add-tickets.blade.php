@extends('admin')

@section('title')
Add Tickets
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex justify-content-center">
            <h3 class="h3 admin-form-title text-uppercase">Add tickets</h3>
        </div>
        <form method="POST" action="{{route('ticket.store')}}">
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-8">Name</label>
                <input class="col-md-12" name="ticket_name" type="text" placeholder="Ticket name" required/>
            </div>
            <div class="row">
                <label class="col-md-8">Ticket type</label>
                <select class="col-md-12 py-2" name="ticket_type" required>
                    <option value="0"></option>
                    <option value="1">One way</option>
                    <option value="2">Two way</option>
                </select>
            </div>

            <div class="row">
                <label class="col-md-8">Age group</label>
                <select class="col-md-12 py-2" name="age_group" required>
                    <option value="0"></option>
                    @foreach($age_groups as $age_group)
                    <option value="{{$age_group->id}}">{{$age_group->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <label class="col-md-8">Seat type</label>
                <select class="col-md-12 py-2" name="seat">
                    <option value="0"></option>
                    @foreach($seat_prices as $seat_price)
                    <option value="{{$seat_price->id}}">{{$seat_price->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <label class="col-md-8">Train name</label>
                <select class="col-md-12 py-2" name="train" required>
                    <option value="0"></option>
                    @foreach($trains as $train)
                    <option value="{{$train->id}}">{{$train->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn col-md-12 mt-4 text-uppercase">submit</button>
        </form>
    </div>
</section>
@endsection