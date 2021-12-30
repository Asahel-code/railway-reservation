@extends('admin')

@section('title')
Add destinations
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex">
            <h3 class="h3 admin-form-title text-uppercase">Add a destination</h3>
        </div>
        <form enctype="multipart/form-data" method="POST" action="{{route('destination.store')}}"> 
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-4">Name</label>
                <input class="col-md-12" name="destination_name" type="text" placeholder="destination name" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-4">Image</label>
                <input class="col-md-12 mt-2 form-control" type="file" name="destination_image" />
            </div>

            <button type="submit" class="btn col-md-12 text-uppercase">submit</button>
        </form>
    </div>
</section>
@endsection