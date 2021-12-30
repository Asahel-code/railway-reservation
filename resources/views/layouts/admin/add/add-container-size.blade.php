@extends('admin')

@section('title')
Add Container size
@endsection

@section('content')
<section class="container d-flex align-items-center justify-content-center">
    <div class="my-4 p-4 border">
        <div class="d-flex justify-content-center">
            <h3 class="h3 admin-form-title text-uppercase">Add a container size</h3>
        </div>
        <form method="POST" action="{{route('container-size.store')}}">
            @csrf
            <div class="row d-flex my-4">
                <label class="col-md-4">Size</label>
                <input class="col-md-12" name="container_name" type="text" placeholder="container size" />
            </div>

            <div class="row d-flex my-4">
                <label class="col-md-4">Price</label>
                <input class="col-md-12" name="container_price" type="text" placeholder="container price" />
            </div>

            <button type="submit" class="btn col-md-12 text-uppercase">submit</button>
        </form>
    </div>
</section>
@endsection