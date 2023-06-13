@extends('layout.master')
@section('content')
    <h1>Edit</h1>
    <div>
        <form action="{{ route('storeupdated') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $store->id }}" name="id">
            <div class="form-group">
                <label>Store Name</label>
                <input type="text" value="{{ $store->name }}" name="name" class="form-control"
                    placeholder="Enter store name">

            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" value="{{ $store->description }}" name="description" class="form-control"
                    placeholder="Enter Description">

            </div>
            <div>
                <label>
                    Current Image
                </label>
                <img src="{{ asset($store->image) }}" alt="store" style="height:5vw;width:5vw" />

            </div>
            <div class="form-group mt-2">
                <label>
                    Upload New Image
                </label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label class="col-3">Store Category :-</label>
                <select class="form-controll col-2" name="store_category_id" value="{{ $store->store_category_id }}">
                    @foreach ($store_categories as $storecategory)
                        <option @if ($storecategory->id === $store->store_category_id) selected @endif value="{{ $storecategory->id }}">
                            {{ $storecategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Rating</label>
                <input type="text" value="{{ $store->rating }}" name="rating" class="form-control"
                    placeholder="Enter Rating">

            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input type="text" value="{{ $store->latitude }}" name="latitude" class="form-control"
                    placeholder="Enter Latitude">

            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input type="text" value="{{ $store->longitude }}" name="longitude" class="form-control"
                    placeholder="Enter Longitude">

            </div>
            <div class="form-group">
                <label class="col-3">City :-</label>
                <select class="form-controll col-2" name="city_id" value="{{ $store->city_id }}">
                    @foreach ($cities as $city)
                        <option @if ($city->id === $store->city_id) selected @endif value="{{ $city->id }}">
                            {{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="footer mt-2">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
@endsection
