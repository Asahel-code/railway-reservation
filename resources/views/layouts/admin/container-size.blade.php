@extends('admin')

@section('title')
Container size charge
@endsection

@section('content')
<div id="content">
    <div class="container">
        <div class="row my-4">
            <div class="col-sm-10 page-content">
                <div class="inner-box">
                    <div class="admin-title-section d-flex justify-content-between p-2">
                        <h3 class="title-2"><i class="bi bi-credit-card"></i> Container size</h3>
                        <a href="{{route('container-size.create')}}" class="action-btn btn-sm btn-success bi bi-plus-circle"> Add</a>
                    </div>
                    <div class="table-responsive">
                        @if($message = Session::get('success'))
                        <div class="my-4">
                            <div class="alert alert-success alert-block">
                                <strong>{{$message}}</strong>
                            </div>
                        </div>
                        @endif
                        <table class="table table-striped table-bordered add-manage-table">
                            <thead>
                                <tr>
                                    <th data-type="numeric"></th>
                                    <th>Container size</th>
                                    <th>Price</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($container_sizes as $container_size)
                                <tr>
                                    <td class="add-img-selector">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$container_size->name}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$container_size->price}}</h5>
                                    </td>
                                    <td class="action-td d-flex justify-content-around">
                                        <p class="">
                                            <a class="action-btn btn-primary btn-xs" href="{{route('container-size.edit', ['container_size'=>$container_size->id])}}"> <i class="bi bi-pencil-square"></i> Edit</a>
                                        </p>
                                        <p class="">
                                            <a class="action-btn btn-danger btn-xs" href="{{route('container-size.destroy', ['container_size'=>$container_size->id])}}"> <i class=" bi bi-trash"></i> Delete</a>
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection