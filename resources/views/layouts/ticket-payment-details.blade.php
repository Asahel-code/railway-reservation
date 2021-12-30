@extends('welcome')

@section('title')
Payment info
@endsection

@section('content')
<section class="container">
    <div class="row my-4">
        <div class="col-2 filter-section mr-4">

        </div>
        <div class="col-9">
            <form action="{{route('paymentinfo.store')}}" method="POST">
                @csrf
                <input type="hidden" name="ticket" value="{{$ticket_id}}" required />
                <input type="hidden" name="passenger" value="{{$passenger_id}}" required />
                <div class="border mb-2">
                    <div class="personal-info-title d-flex align-items-center justify-content-between p-4 border-bottom">
                        <span class="text-capitalize">your personal information</span>
                    </div>
                    <div class="pb-2">
                        <div class="d-flex align-items-center justify-content-between py-4">
                            <div class="col-3">
                                <label class="">First name</label>
                                <input type="text" name="first_name" placeholder="First name" required/>
                            </div>
                            <div class="col-3">
                                <label class="">Last name</label>
                                <input type="text" name="last_name" placeholder="First name" required/>
                            </div>
                            <div class="col-3">
                                <label class="">Date of birth</label>
                                <input type="date" name="dob" placeholder="MM/DD/YY" required/>
                            </div>

                        </div>
                        <div class="d-flex align-items-center justify-content-around">
                            <div class="col-3">
                                <label class="">E-mail</label>
                                <input type="email" name="email" placeholder="Email" required/>
                            </div>
                            <div class="col-3 select-gender pr-4">
                                <label class="">Gender</label>
                                <select name="gender" required>
                                    <option value="0"></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            
                               
                        </div>
                    </div>

                    <div class="border mb-2">
                        <div class="personal-info-title d-flex align-items-center justify-content-between p-4 border-bottom">
                            <span class="text-capitalize">Payment number</span>
                        </div>
                        <div class="pb-2">
                            <div class="col-4 py-4">
                                <label>your number</label>
                                <input type="text" name="number" placeholder="Your payment number" required/>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-between terms-and-condition">
                            <input type="checkbox" class="" required/>
                            <label class="mt-2 pl-2">By continuing, you agree to the <a href="#">Term and Conditons</a></label>
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