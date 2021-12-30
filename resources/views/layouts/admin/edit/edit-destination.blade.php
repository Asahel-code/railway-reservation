@extends('admin')

@section('title')
Edit destinations
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex">
            <h3 class="h3 admin-form-title text-uppercase">Edit a destination</h3>
        </div>
        <form enctype="multipart/form-data" method="POST" action="{{route('destination.update', ['destination'=>$destination->id])}}">
            @method('PUT')
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-4">Name</label>
                <input class="col-md-12" name="destination_name" type="text" placeholder="destination name" value="{{$destination->name}}" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-4">Image</label>
                <input class="col-md-12 mt-2 form-control" type="file" name="destination_image" value="{{$destination->price}}" />
            </div>

            <button type="submit" class="btn col-md-12 text-uppercase">update</button>
        </form>
    </div>
</section>
@endsection