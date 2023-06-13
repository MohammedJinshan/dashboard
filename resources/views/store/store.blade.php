@extends('layout.master')
@section('content')
    <h1>Store</h1>
    <div class="text-end mb-2">
        <a href="{{ route('Store.add') }}" type="button" class="btn btn-primary">
            <i class="bi bi-plus"></i> Add Store
        </a>
    </div>
    <table class="table" id="store-datatable" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Discription</th>
                <th scope="col">Image</th>
                <th scope="col">Store Category</th>
                <th scope="col">Rating</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">City</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#store-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('storeDatatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
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
                        data: 'store_category.name',
                        name: 'store_category.name'
                    },
                    {
                        data: 'rating',
                        name: 'rating'
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
                        data: 'city.name',
                        name: 'city.name'
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
    @foreach ($stores as $store)
        <!-- Modal -->
        <div class="modal fade" id="storedelete{{ $store->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <h6> You Want To Delete!!!</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a   class="btn btn-danger" href="{{ route('Stores.delete',$store->id)}}">Yes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
