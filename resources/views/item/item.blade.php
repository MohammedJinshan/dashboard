@extends('layout.master')
@section('content')
    <h1>Item</h1>
    <div class="text-end mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew">
            <i class="bi bi-plus"></i> Add Item
        </button>
    </div>
    <table class="table" id="item-datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Discription</th>
                <th scope="col">Image</th>
                <th scope="col">Store</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">Item Category</th>


            </tr>
        </thead>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#item-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('itemDatatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'store_id',
                        name: 'store_id'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'item_category_id',
                        name: 'item_category_id'
                    },
                ]
            });

        });
    </script>

    <!-- Modal add -->
    <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Item.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="from-group d-flex align-items-center">
                            <label class="col-4">Item Name :- </label>
                            <input type="text" name="name" class="form-control col-7" placeholder="Enter Item name">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-4">Price :- </label>
                            <input type="text" name="price" class="form-control col-7" placeholder="Enter Price">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-4">Description :- </label>
                            <input type="text" name="description" class="form-control col-7"
                                placeholder="Enter Description">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-4">Image :- </label>
                            <input type="file" name="image" class="course form-control mb-3 col-7">
                        </div>
                        <div class="form-group">
                            <label class="col-3">Store :-</label>
                            <select class="form-controll col-2" name="store_id">
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-3">Item Category :-</label>
                            <select class="form-controll col-2" name="item_category_id">
                                @foreach ($itemCategories as $itemCategory)
                                    <option value="{{ $itemCategory->id }}">{{ $itemCategory->name }}</option>
                                @endforeach
                            </select>
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

    @foreach ($items as $item)
        <!-- Modal Delete-->
        <div class="modal fade" id="deleteitem{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="color: red">
                        Do You Want To Delete!!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a type="submit" class="btn btn-danger" href="{{ route('Item.delete', $item->id) }}">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
