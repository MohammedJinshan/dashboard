@extends('layout.master')
@section('content')
    <h1>Item Category</h1>
    <div class="text-end mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#itemcategory">
            <i class="bi bi-plus"></i> Add Item Category
        </button>
    </div>
    <table class="table" id="itemcategory-datatable">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#itemcategory-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('itemcategorieDatatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
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

    <!-- Modal -->
    <div class="modal fade" id="itemcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.additemCategory') }}">

                        @csrf
                        <div class="from-group d-flex align-items-center">
                            <label class="col-4">ItemCategory Name :- </label>
                            <input type="text" name="name" class="form-control col-7"
                                placeholder="Enter ItemCategory Name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
