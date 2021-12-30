@extends('admin')

@section('title')
Add Seat type
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex justify-content-center">
        <h3 class="h3 admin-form-title text-uppercase">Add a seat type</h3>
        </div>
       
        <form method="POST" action="{{route('seat-type.store')}}">
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-4">Name</label>
                <input class="col-md-12" name="seat_type_name" type="text" placeholder="seat name" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-4">Price</label>
                <input class="col-md-12" name="seat_type_price" type="text" placeholder="seat price" />
            </div>

            <button type="submit" class="btn col-md-12 text-uppercase">submit</button>
        </form>
    </div>
</section>
@endsection