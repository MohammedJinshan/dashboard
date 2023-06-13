@extends('layout.master')
@section('content')
    <h1>Store Category</h1>
    <div class="text-end mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storecategory">
            <i class="bi bi-plus"></i> Add Store Category
        </button>
    </div>
    <table class="table" id="store-category-datatable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">StoreCategory Name</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#store-category-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('storecategoryDatatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'image',
                        name: 'image'
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
                ]
            });

        });
    </script>

    <!-- Modal add-->
    <div class="modal fade" id="storecategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Store Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Storestorecategory.add') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="from-group d-flex align-items-center">
                            <label class="col-3">StoreCategory Name :- </label>
                            <input type="text" name="name" class="form-control col-8"
                                placeholder="Enter StoreCategory Name">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-3">Image :- </label>
                            <input type="file" name="image" class="course form-control mb-3">
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

    @foreach ($store_categories as $storecategory)
        <!-- Modal edit-->
        <div class="modal fade" id="storecategory{{$storecategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Store Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Storestorecategory.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $storecategory->id }}" name="id">
                            <div class="form-group">
                                <label>Storecategory Name</label>
                                <input type="text" value="{{ $storecategory->name }}" name="name" class="form-control"
                                    placeholder="Enter Storecategory name">

                            </div>
                            <div>
                                <label>
                                    Current Image
                                </label>
                                <img src="{{ asset($storecategory->image) }}" alt="storecategory"
                                    style="height:5vw;width:5vw" />

                            </div>
                            <div class="form-group">
                                <label class="text-danger-emphasis"></label>
                                <input type="file" name="image" class="form-control">

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

        <!-- Modal delete -->
        <div class="modal fade" id="storecategorydelete{{$storecategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6> You Want To Delete!!!</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a type="submit" class="btn btn-danger" href="{{ route('Storestorecategory.delete', $storecategory->id) }}">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
