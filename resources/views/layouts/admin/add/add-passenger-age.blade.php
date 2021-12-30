@extends('admin')

@section('title')
Add Age group
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex justify-content-center">
            <h3 class="h3 admin-form-title text-uppercase">Add a passenger age group</h3>
        </div>
        <form method="POST" action="{{route('passenger-age.store')}}">
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-4">Name</label>
                <input class="col-md-12" name="age_group_name" type="text" placeholder="age group name" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-4">Price</label>
                <input class="col-md-12" name="age_group_price" type="text" placeholder="age group price" />
            </div>

            <button type="submit" class="btn col-md-12 text-uppercase">submit</button>
        </form>
    </div>
</section>
@endsection