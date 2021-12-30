@extends('admin')

@section('title')
Edit Container size
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex justify-content-center">
            <h3 class="h3 admin-form-title text-uppercase">Edit a container size</h3>
        </div>
        <form method="POST" action="{{route('container-size.update', ['container_size' => $container_size->id])}}">
            @method('PUT')
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-4">Name</label>
                <input class="col-md-12" name="container_name" type="text" placeholder="container name" value="{{$container_size->name}}" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-4">Price</label>
                <input class="col-md-12" name="container_price" type="text" placeholder="container price" value="{{$container_size->price}}" />
            </div>

            <button type="submit" class="btn col-md-12 text-uppercase">update</button>
        </form>
    </div>
</section>
@endsection