@extends('admin')

@section('title')
Trains
@endsection 

@section('content')
<div id="content">
    <div class="container">
        <div class="row my-4">
            <div class="col-sm-12 page-content">
                <div class="inner-box">
                    <div class="admin-title-section d-flex justify-content-between p-2">
                        <h3 class="title-2"><i class="bi bi-credit-card"></i> Train</h3>
                        <a href="{{route('train.create')}}" class="action-btn btn-sm btn-success bi bi-plus-circle"> Add</a>
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
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>First class seats</th>
                                    <th>Economy seats</th>
                                    <th>Departure time</th>
                                    <th>Arrival time</th>
                                    <th>Travel date</th>
                                    <th>Source</th>
                                    <th>Destination</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trains as $train)
                                <tr>
                                    <td class="add-img-selector">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->number}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->name}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->first_class_seats}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->economy_seats}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->departure}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->arrival}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->date}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->source->name}}</h5>
                                    </td>
                                    <td class="destination-td">
                                        <h5>{{$train->destination->name}}</h5>
                                    </td>

                                    <td class="action-td d-flex justify-content-around">
                                        <p class="pr-2">
                                            <a class="action-btn btn-primary btn-xs" href="{{route('train.edit', ['train'=>$train->id])}}"> <i class="bi bi-pencil-square"></i></a>
                                        </p>
                                        <p class="">
                                            <a class="action-btn btn-danger btn-xs" href="{{route('train.destroy', ['train'=>$train->id])}}"> <i class=" bi bi-trash"></i></a>
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