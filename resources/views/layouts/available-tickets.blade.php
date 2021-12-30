@extends('welcome')

@section('title')
Tickets
@endsection

@section('content')
<section class="container">
    <div class="row my-4">
        <div class="col-3 filter-section mr-4">
            
        </div>
        <div class="col-8">
            <p>{{$tickets->count()}} of {{$total_tickets->count()}} found</p>
            @foreach($tickets as $ticket)
            @if($ticket->ticket_type == 1)
            <div class="ticket row border my-2">
                <div class="ticket-section-1 col-3 d-flex align-items-center justify-content-center pt-2 border-right">
                    <div class="">
                        <div class="ticket-image d-flex justify-content-center py-2">
                            <img src="{{asset('assets/images/train-icon.png')}}" alt="" />
                        </div>
                        <div>
                            <p class="m-0">{{$ticket->train->number}}</p>
                            <span>{{$ticket->train->name}}</span>
                        </div>
                    </div>
                </div>

                <div class="ticket-section-2 col-6 border-right">
                    <div class="to d-flex justify-content-around my-2">
                        <div>
                            <p class="p-0 m-0 time">{{$ticket->train->departure}}</p>
                            <p class="p-0 m-0 date">{{$ticket->train->date}}</p>
                            <p class="text-capitalize p-0 m-0 place">{{$ticket->train->source->name}}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="duration p-0 m-0">{{(int)$ticket->train->departure - (int)$ticket->train->arrival}}</p>
                                <i class="bi bi-arrow-right direction"></i>
                            </div>
                        </div>
                        <div>
                            <p class="p-0 m-0 time">{{$ticket->train->arrival}}</p>
                            <p class="p-0 m-0 date">{{$ticket->train->date}}</p>
                            <p class="text-capitalize p-0 m-0 place">{{$ticket->train->destination->name}}</p>
                        </div>
                    </div>
                </div>

                <div class="ticket-section-3 col-3 d-flex align-items-center justify-content-center">
                    <div class="">
                        <div class="ticketcost mb-4">
                            <span class="amount">ksh.{{$ticket->seat->price}}</span>
                            <span class="size">/person</span>
                        </div>
                        <div class="buy-btn">
                            <p class="btn text-capitalize"><a href="{{route('passenger-details.index', ['ticket_value'=> $ticket->name])}}">buy <span class="text-capitalize">now</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($ticket->ticket_type == 2)
            <div class="ticket row border my-2">
                <div class="ticket-section-1 col-3 d-flex align-items-center justify-content-center pt-2 border-right">
                    <div class="">
                        <div class="ticket-image d-flex justify-content-center py-2">
                            <img src="{{asset('assets/images/train-icon.png')}}" alt="" />
                        </div>
                        <div>
                            <p class="m-0">{{$ticket->train->number}}</p>
                            <span>{{$ticket->train->name}}</span>
                        </div>
                    </div>
                </div>
                <div class="ticket-section-2 col-6 border-right">
                    <div class="toandfro">
                        <div class="to d-flex justify-content-around my-2">
                            <div>
                                <p class="p-0 m-0 time">{{$ticket->train->departure}}</p>
                                <p class="p-0 m-0 date">{{$ticket->train->date}}</p>
                                <p class="text-capitalize p-0 m-0 place">{{$ticket->train->source->name}}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="duration p-0 m-0">{{(int)$ticket->train->departure - (int)$ticket->train->arrival}}</p>
                                    <i class="bi bi-arrow-right direction"></i>
                                </div>
                            </div>
                            <div>
                                <p class="p-0 m-0 time">{{$ticket->train->arrival}}</p>
                                <p class="p-0 m-0 date">{{$ticket->date}}</p>
                                <p class="text-capitalize p-0 m-0 place">{{$ticket->train->destination->name}}</p>
                            </div>
                        </div>
                        <div class="fro d-flex justify-content-around my-2">
                            <div>
                                <p class="p-0 m-0 time">{{$ticket->train->arrival}}</p>
                                <p class="p-0 m-0 date">{{$ticket->train->date}}</p>
                                <p class="text-capitalize p-0 m-0 place">{{$ticket->train->source->name}}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="duration p-0 m-0">{{(int)$ticket->train->departure - (int)$ticket->train->arrival}}</p>
                                    <i class="bi bi-arrow-left direction"></i>
                                </div>
                            </div>
                            <div>
                                <p class="p-0 m-0 time">{{$ticket->train->departure}}</p>
                                <p class="p-0 m-0 date">{{$ticket->train->date}}</p>
                                <p class="text-capitalize p-0 m-0 place">{{$ticket->train->destination->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ticket-section-3 col-3 d-flex align-items-center justify-content-center">
                    <div class="">
                        <div class="ticketcost mb-4">
                            <span class="amount">Ksh.{{$ticket->seat->price}}</span>
                            <span class="size">/person</span>
                        </div>
                        <div class="buy-btn">
                            <p class="btn text-capitalize"><a href="{{route('passenger-details.index',['ticket_value'=> $ticket->name])}}">buy <span class="text-capitalize">now</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            <div aria-label="Page navigation example">
            </div>

        </div>
    </div>
</section>
@endsection