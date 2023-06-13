@extends('layout.master')
@section('content')
    <h1>Edit</h1>
        <div>
            <form action="{{ route('updateitem') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="id">
                <div class="form-group">
                    <label>Item Name</label>
                    <input type="text" value="{{ $item->name }}" name="name" class="form-control"
                        placeholder="Enter item name">

                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" value="{{ $item->price }}" name="price" class="form-control"
                        placeholder="Enter item name">

                </div>
                <div>
                    <label>
                        Current Image
                    </label>
                    <img src="{{ asset($item->image) }}" alt="item"
                        style="height:5vw;width:5vw" />

                </div>
                <div class="form-group mt-2">
                    <label>
                        Upload New Image
                    </label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label class="col-3">Store :-</label>
                    <select class="form-controll col-2" name="store_id" value="{{ $item->store_id }}">
                        @foreach ($stores as $store)
                            <option @if ($store->id === $item->store_id) selected

                            @endif value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-3">Item Category :-</label>
                    <select class="form-controll col-2" name="item_category_id"  value="{{ $item->item_category_id }}">
                        @foreach ($itemCategories as $itemCategory)
                            <option
                            @if ($itemCategory->id === $itemCategory->name) selected

                            @endif value="{{ $itemCategory->id }}">{{ $itemCategory->name }}</option>
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
