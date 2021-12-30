@extends('admin')

@section('title')
Add Train
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex justify-content-center">
            <h3 class="h3 admin-form-title text-uppercase">Add a train</h3>
        </div>
        <form method="POST" action="{{route('train.store')}}">
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-8">Number</label>
                <input class="col-md-12" name="train_number" type="text" placeholder="Train number" />
            </div>
            <div class="row d-flex my-4">
                <label class="col-md-8">Name</label>
                <input class="col-md-12" name="train_name" type="text" placeholder="Train name" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-8">First class seats</label>
                <input class="col-md-12" name="first_class" type="text" placeholder="number of seats" />
            </div> 

            <div class="row d-flex my-4">
                <label class="col-md-8">Economy seats</label>
                <input class="col-md-12" name="economy" type="text" placeholder="number of seats" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-8">Departure</label>
                <input class="col-md-12" name="departure_time" type="time" placeholder="departure time" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-8">Arrival</label>
                <input class="col-md-12" name="arrival_time" type="time" placeholder="arrival time" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-8">Travel date</label>
                <input class="col-md-12" name="travel_date" type="date" placeholder="MM/DD/YY" />
            </div>
            <div class="row">
                <label class="col-md-8">Source</label>
                <select class="col-md-12 py-2" name="source" required>
                    <option value=""></option>
                    @foreach($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <label class="col-md-8">Destination</label>
                <select class="col-md-12 py-2" name="destination" required>
                    <option value=""></option>
                    @foreach($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn col-md-12 mt-4 text-uppercase">submit</button>
        </form>
    </div>
</section>
@endsection