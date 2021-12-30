@extends('welcome')

@section('title')
Passagers details
@endsection

@section('content')
<section class="container">
    <div class="row my-4">
        <div class="col-3 filter-section mr-4">

        </div>
        <div class="col-8">
            <form action="{{route('passenger-details.store')}}" method="POST">
                @csrf
                <div class="border px-2 mb-2 ">
                    <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                        <div class="passenger">
                            <span class="passenger-no"> Passager</span>
                        </div>

                    </div>
                    <div class="">

                    </div>
                    <div class="py-4">
                        <div class="d-flex justify-content-between pb-2">
                            <div class="">
                                <label class="">First name</label>
                                <input type="text" name="first_name" placeholder="First name" required/>
                            </div>
                            <div class="">
                                <label class="">Last name</label>
                                <input type="text"name="last_name" placeholder="First name" required/>
                            </div>
                            <div class="select-age">
                                <label class="">Age</label>
                                <select name="age" required>
                                    <option value="0"></option>
                                    @foreach($passenger_ages as $passenger_age)
                                    <option value="{{$passenger_age->id}}">{{$passenger_age->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <div class="col-3">
                                <label class="">Date of birth</label>
                                <input type="date" name="dob" placeholder="MM/DD/YY" required/>
                            </div>
                            <div class="col-3 ticket-section">
                                <label class="">Selected Train</label>
                                <input type="text" name="ticket" value="{{$ticket_id}}" required/>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="buy-ticket-btn mt-4">
                    <button type="submit" class="text-uppercase py-2 px-4">buy ticket</button>
                </div>
            </form>

        </div>
</section>
@endsection