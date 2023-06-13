@extends('layout.master')
@section('content')
    <h1>City</h1>
    <div class="text-end mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcity">
            <i class="bi bi-plus"></i> Add City
        </button>
    </div>

    <table class="table" id="data-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Status</th>
                <th scope="col">Delivery Charge</th>
                <th scope="col">Radius</th>
                <th scope="col">Action</th>

            </tr>

        </thead>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('cityDatatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'latitude',
                        name: 'latitude'
                    },
                    {
                        data: 'longitude',
                        name: 'longitude'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },
                    {
                        data: 'delivery_charge',
                        name: 'delivery_charge'
                    },
                    {
                        data: 'radius',
                        name: 'radius'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>


    <!-- Modal add-->
    <div class="modal fade" id="addcity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New City</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('city.add') }} " method="POST">
                        @csrf
                        <div class="from-group d-flex align-items-center">
                            <label class="col-3">City Name :- </label>
                            <input type="text" name="name" class="form-control col-8" placeholder="Enter city name">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-3">Latitude :- </label>
                            <input type="text" name="latitude" class="form-control col-8" placeholder="Enter Latitude">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-3">Longitude :- </label>
                            <input type="text" name="longitude" class="form-control col-8" placeholder="Enter Longitude">
                        </div>

                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-3">Delivery Charge :- </label>
                            <input type="text" name="delivery_charge" class="form-control col-8"
                                placeholder="Enter Delivery Charge">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1 mb-2">
                            <label class="col-3">Radius :- </label>
                            <input type="text" name="radius" class="form-control col-8" placeholder="Enter radius">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    @foreach ($cities as $city)
        <!-- Modal delete-->
        <div class="modal fade" id="deletecity{{ $city->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Back</button>
                        <a type="submit" class="btn btn-danger" href="{{ route('city.delete', $city->id) }}">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit-->
        <div class="modal fade" id="editcity{{ $city->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('city.edit') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $city->id }}" name="id">
                            <div class="form-group">
                                <label>City Name</label>
                                <input type="text" value="{{ $city->name }}" name="name" class="form-control"
                                    placeholder="Enter city name">

                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" value="{{ $city->latitude }}" name="latitude" class="form-control"
                                    placeholder="Enter city name">

                            </div>
                            <div class="form-group">
                                <label>Longtitude</label>
                                <input type="text" value="{{ $city->longitude }}" name="longitude" class="form-control"
                                    placeholder="Enter city name">

                            </div>
                            <div class="form-group">
                                <label>Delivery Charge</label>
                                <input type="text" value="{{ $city->delivery_charge }}" name="delivery_charge" class="form-control"
                                    placeholder="Enter city name">

                            </div>
                            <div class="form-group">
                                <label>Radius</label>
                                <input type="text" value="{{ $city->radius }}" name="radius" class="form-control"
                                    placeholder="Enter city name">

                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
