@extends('welcome')

@section('title')
Home
@endsection
@section('content')
<section class="container my-4">
    <div class="row">
        @if($message = Session::get('fail'))
        <div class="my-2 col-md-12">
            <div class="alert alert-danger alert-block">
                <strong>{{$message}}</strong>
            </div>
        </div>
        @endif
        <div class="col-md-12">
            <h3 class="text-uppercase">to travel destinations</h3>
        </div>
        @foreach($destinations as $destination)
        @if($destination->image == NULL)

        @else
        <div class="top-destination col-md-4 col-sm-8 col-xs-12 mb-4">
            <div class="top-destination-image">
                <img class="" src="{{asset('storage/uploads')}}/{{$destination->image}}" alt="" />
            </div>
            <div class="from_to d-flex justify-content-center border-right border-left border-bottom pt-2">
                <p>{{$destination->name}}</p>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
@endsection

@section('search')
<div class="train-booking container d-flex justify-content-around">
    <div class=" d-flex align-items-center">
        <div class="content">
            <span class="text-uppercase text-white">welcome to book your train</span>
            <p class="text-white">We save your time both while purchasing, check-in and during the travel</p>
        </div>
    </div>

    <div class="ticket-search-section d-flex justify-content-center pt-4">
        <form class="" action="{{route('tickets.search')}}" method="GET">
            @csrf
            <div class="route pt-2">
                <label>Travelling route</label>
                <div class="d-flex">
                    <div class="styled-select mr-2">
                        <select name="from">
                            <option value="0">From</option>
                            @foreach($tickets as $ticket)
                            <option value="{{$ticket->train->source_id}}">{{$ticket->train->source->name}}</option>
                            @endforeach
                        </select>
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div class="styled-select ml-2">
                        <select name="to">
                            <option class="0">To</option>
                            @foreach($tickets as $ticket)
                            <option value="{{$ticket->train->destination_id}}">{{$ticket->train->destination->name}}</option>
                            @endforeach
                        </select>
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                </div>
            </div>
            <div class="dates pt-2">
                <label>Travelling Date</label>
                <div class="d-flex justify-content-around">
                    <div class="styled-select mr-2">
                        <input type="date" name="date" placeholder="MM/DD/YY" />
                        <i class="bi bi-calendar-fill"></i>
                    </div>
                    <div class="styled-select ml-2">
                        <select name="train_direction">
                            <option value="0"></option>
                            <option value="1">One way</option>
                            <option value="2">Two way</option>
                        </select>
                        <i class="bi bi-calendar-fill"></i>
                    </div>
                </div>
            </div>

            <div class=" search-ticket-btn mt-4">
                <button type="submit" class="text-uppercase py-2 px-4">search ticket</button>
            </div>
        </form>
    </div>
</div>
@endsection