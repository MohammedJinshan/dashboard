@extends('layout.master')
@section('content')
<div>
    <form action="{{ route('Stores.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="from-group d-flex align-items-center">
            <label class="col-3">Store Name :- </label>
            <input type="text" name="name" class="form-control col-8" placeholder="Enter store name">
        </div>
        <div class="from-group d-flex align-items-center mt-1">
            <label class="col-3">Description :- </label>
            <input type="text" name="description" class="form-control col-8" placeholder="Enter Description">
        </div>
        <div class="from-group d-flex align-items-center mt-1">
            <label class="col-3">Image :- </label>
            <input type="file" name="image" class="course form-control mb-3 col-8">
        </div>
        <div class="form-group">
            <label class="col-3">Store Category :-</label>
            <select class="form-controll col-2" name="store_category_id">
                @foreach ($storecategories as $storecategory)
                    <option value="{{ $storecategory->id }}">{{ $storecategory->name }}</option>

                @endforeach
            </select>
        </div>
        <div class="from-group d-flex align-items-center mt-1 mb-2">
            <label class="col-3">Rating :- </label>
            <input type="text" name="rating" class="form-control col-8" placeholder="Enter Rating">
        </div>
        <div class="from-group d-flex align-items-center mt-1 mb-2">
            <label class="col-3">Latitude :- </label>
            <input type="text" name="latitude" class="form-control col-8" placeholder="Enter Latitude">
        </div>
        <div class="from-group d-flex align-items-center mt-1 mb-2">
            <label class="col-3">Longitude :- </label>
            <input type="text" name="longitude" class="form-control col-8" placeholder="Enter Longitude">
        </div>
        <div class="form-group">
            <label class="col-3">City :-</label>
            <select class="form-controll col-2" name="city_id">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>

                @endforeach
            </select>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary mr-1" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

@endsection
