@extends('welcome')

@section('title')
Payment successful
@endsection

@section('content')
<section class="container">
    <div class="row">
        <div class="col-md-12 py-4">
            <h3 class="text-uppercase">e-ticket instructions</h3>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="d-flex justify-content-center">
            <div>
                <div class="instruction-icon-email">
                    <img src="{{asset('assets/images/mail.png')}}" alt="" />
                </div>
                <div>
                    <p>You will recieve an Email</p>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <div>
                <div class="instruction-icon-print">
                    <img src="{{asset('assets/images/icon-print.png')}}" alt="" />
                </div>
                <div>
                    <p>Save and print your E-ticket</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div>
                <div class="instruction-icon-checkIn">
                    <img src="{{asset('assets/images/check-in.png')}}" alt="" />
                </div>
                <div>
                    <p>Show your E-ticket on check-in</p>
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="row">
        <div class="col-md-12 py-4">
            <h3 class="text-uppercase">top travel destinations</h3>
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
<section class="success-notification d-flex align-items-center justify-content-center mt-2">
    <div>
        <div class="d-flex align-items-center justify-content-center success-icon">
            <div class="">
                <img src="{{asset('assets/images/checked.png')}}" alt="" />
            </div>
        </div>
        <div class="success-content">
            <div class="d-flex align-items-center justify-content-center">
                <h2 class="text-uppercase">thank you!</h2>
            </div>
            <p class="text-uppercase">booking process is successful completed</p>
        </div>
    </div>
</section>
@endsection