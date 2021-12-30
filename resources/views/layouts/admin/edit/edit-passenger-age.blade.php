@extends('admin')

@section('title')
Edit Age group
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex justify-content-center">
            <h3 class="h3 admin-form-title text-uppercase">Edit a passenger age group</h3>
        </div>
        <form method="POST" action="{{route('passenger-age.update', ['passenger_age'=>$age_group->id])}}">
            @method('PUT')
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-4">Name</label>
                <input class="col-md-12" name="age_group_name" type="text" placeholder="age group name" value="{{$age_group->name}}" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-4">Price</label>
                <input class="col-md-12" name="age_group_price" type="text" placeholder="age group price" value="{{$age_group->price}}" />
            </div>

            <button type="submit" class="btn col-md-12 text-uppercase">update</button>
        </form>
    </div>
</section>
@endsection