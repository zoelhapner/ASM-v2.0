{{-- Penting --}}
@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Users
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                 
                        <a href=" {{ route("users.index") }} " class="btn btn-primary d-none d-sm-inline-block" >
                            Kembali
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data</h3>
                        </div>
                        <div class="card-body">
                             <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!--

@push('js')
    <script>
        $(function() {
            const table = $('#tableUsers').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route("users.index") }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                columnDefs: [
                    {
                        target: [1],
                        className: "dt-right"
                    }
                ]
            });

            // Delete user functionally
            $('table').on('click', '.delete-user', function() {
                const userId = $(this).data('id');
                
                if (userId) {
                    if (confirm('Are you sure, you want to delete?')) {
                        $.ajax({
                            url: `{{ url('users/delete') }}/${userId}`,
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success:function(response) {
                                if (response.status === 'success') {
                                    table.ajax.reload(null, false);
                                } else {
                                    alert(response.message);
                                }
                            },
                            errror: function(error) {
                                alert('something went wrong!')
                            }
                    })

                    }
                    
                }
            });

            const editableColumns = [1, 2];
            let currentEditableRow = null;

            // Edit user functionally
            $('table').on('click', '.edit-user', function() {
                const userId = $(this).data('id');
                const currentRow = $(this).closest('tr');

                // Check if current row is editable then this will reset the other row edit
                if (currentEditableRow && currentEditableRow !== currentRow) {
                    resetEditableRow(currentEditableRow);
                }

                // Calling Make Editable Row Function
                makeEditableRow(currentRow);

                // Updating the current row to editable
                currentEditableRow = currentRow;

                // Appending action buttons in the lasr column
                currentRow.find('td:last').html(`
                    <button class="btn btn-primary btn-sm btn-update" data-id="${userId}">Update</button>
                    <button data-id="${userId}" class="btn btn-danger btn-sm delete-user">Delete</button> 
                `);
                
            });

            // Function : Make Editable Row
            function makeEditableRow(currentRow) {
                currentRow.find('td').each(function(index) {

                    const currentCell = $(this);
                    const currentText = currentCell.text().trim();

                if (editableColumns.includes(index)) {
                        currentCell.html(`<input type="text" class="form-control editable-input" value="${currentText}" />`);
                }
                });

                
            }

            // Function : Reset Current Row Editable
            function resetEditableRow(currentEditableRow) {
                currentEditableRow.find('td').each(function(index) {

                    const currentCell = $(this);

                    if (editableColumns.includes(index)) {
                        const currentValue = currentCell.find('input').val();
                        currentCell.html(`${currentValue}`);
                    }
                });

                const userId = currentEditableRow.find('.btn-update').data('id');

                currentEditableRow.find('td:last').html(`
                    <button class="btn btn-success btn-sm btn-edit" data-id="${userId}">Edit</button>
                    <button data-id="${userId}" class="btn btn-danger btn-sm delete-user">Delete</button>
                
                `);
            }

            // Update function
            $('table').on('click', '.btn-update', function() {
                const userId = $(this).data('id');

                const currentRow = $(this).closest('tr');

                const updatedUserData = {};

                currentRow.find('td').each(function(index) {
                    if (editableColumns.includes(index)) {
                        const inputValue = $(this).find('input').val();

                        if(index === 1)
                            updatedUserData.name = inputValue;

                        if(index === 2)
                            updatedUserData.email = inputValue;

                    }
                });


                // Ajax call to update user data

                $.ajax({
                    url: '{{ route("users.update") }}',
                    type: 'PUT',
                    data: {
                        id: userId,
                        name: updatedUserData.name,
                        email : updatedUserData.email,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response){
                        if (response.status === 'success') {
                            table.ajax.reload(function() {
                                $('#row-id-' + userId).addClass('highlight');
                            });
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(errorResponse) {
                        alert(errorResponse.message);
                    }
                });
            });
        });
    </script>
@endpush -->