@extends('welcome')

@section('title')
Confirmation
@endsection

@section('content')
<section class="container">
    <div class="row my-4">
        <div class="col-3 filter-section mr-4">
        </div>
        <div class="col-8">
            <form action="{{route('payment.store')}}" method="POST">
                @csrf
                <div class="border mb-4">
                    <div class="p-2 border-bottom section-title">
                        <span class="text-capitalize">Train</span>
                    </div>
                    <div class="row">
                        <div class="ticket-section-1 col-3 d-flex align-items-center justify-content-center pt-2 border-right">
                            <div class="">
                                <div class="ticket-image d-flex justify-content-center py-2">
                                    <img src="{{asset('assets/images/train-icon.png')}}" alt="" />
                                </div>
                                <div>
                                    <span>{{$ticket->train->number}}</span>
                                    <p>{{$ticket->train->name}}</p>
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
                                    <p class="p-0 m-0 date">{{$ticket->date}}</p>
                                    <p class="text-capitalize p-0 m-0 place">{{$ticket->train->destination->name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="ticket-section-3 col-3 d-flex align-items-center justify-content-center">
                            <div class="">
                                <div class="ticketcost mb-4">
                                    <span class="amount">Ksh.{{$ticket->seat->price}}</span>
                                    <span class="size">/person</span>
                                </div>
                                <div class="change-btn d-flex align-items-center justify-content-center">
                                    <span class="text-capitalize"><a href="/">change</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border mb-4">
                    <div class="p-2 border-bottom section-title">
                        <span class="text-capitalize">Passagers</span>
                    </div>
                    <div class="row">
                        <div class="col-9 border-right">
                            <div class="border-bottom">
                                <div class="p-2">
                                    <h5 class="section-subTitle text-capitalize">adult</h5>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-4 placeholders">
                                        <p class="">name :</p>
                                        <p>Date of Birth :</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="">{{$passenger->first_name}} {{$passenger->last_name}}</p>
                                        <p>{{$passenger->date_of_birth}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="">
                                <div class="ticketcost mb-4">
                                    <span class="amount">Ksh. 100</span>
                                    <div class="change-btn d-flex align-items-center justify-content-center">
                                        <span class="text-capitalize"><a href="#">change</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border mb-4">
                    <div class="p-2 border-bottom section-title">
                        <span class="text-capitalize">Payment</span>
                    </div>
                    <div class="row">
                        <div class="col-9 border-right">
                            <div class="border-bottom">
                                <div class="p-2">
                                    <h5 class="section-subTitle text-capitalize">personal information</h5>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-4 placeholders">
                                        <p class="">name :</p>
                                        <p>Date of Birth :</p>
                                    </div>
                                    <div class="col-8">
                                        <p class="">{{$payment_details->first_name}} {{$payment_details->last_name}}</p>
                                        <p>{{$payment_details->date_of_birth}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom">
                                <div class="p-2">
                                    <h5 class="section-subTitle text-capitalize">payment number</h5>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-4 placeholders">
                                        <p class="">number :</p>
                                    </div>
                                    <div class="col-5">
                                        <p>{{$payment_details->payment_number}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="">
                                <div class="ticketcost my-4">
                                    <div class="change-btn d-flex align-items-center justify-content-center">
                                        <span class="text-capitalize"><a href="#">change</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center terms-and-condition">
                     Total Cost<span class="pl-2 total-amount">Ksh. 150</span>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="text-uppercase py-2 px-4">buy ticket</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection