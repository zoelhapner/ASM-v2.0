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
                  <span class="d-none d-sm-inline">
                  
                        <a href="{{ route("users.create") }}" class="btn btn-primary d-none d-sm-inline-block" >
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Tambah Pengguna Baru
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
                            <p class="text-center mb-4" style="font-size: 1.4rem; font-weight: 400; font-family: 'Figtree', sans-serif;">
                                 Users
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table id="tableUsers" class="table card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
            targets: 0, // Kolom "No."
            orderable: false,
            searchable: false,
            className: 'text-center',
            width: '5%'
        },
        {
            targets: 4, // Kolom terakhir (tombol Edit/Delete)
            orderable: false,
            searchable: false,
            className: 'text-center',
            width: '15%'
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

           // const editableColumns = [1, 2];
           // let currentEditableRow = null;

            // Edit user functionally
            // $('table').on('click', '.edit-user', function() {
            //     const userId = $(this).data('id');
            //     const currentRow = $(this).closest('tr');

            //     // Check if current row is editable then this will reset the other row edit
            //     if (currentEditableRow && currentEditableRow !== currentRow) {
            //         resetEditableRow(currentEditableRow);
            //     }

            //     // Calling Make Editable Row Function
            //     makeEditableRow(currentRow);

            //     // Updating the current row to editable
            //     currentEditableRow = currentRow;

            //     // Appending action buttons in the lasr column
            //     currentRow.find('td:last').html(`
            //         <button class="btn btn-primary btn-sm btn-update" data-id="${userId}">Update</button>
            //         <button data-id="${userId}" class="btn btn-danger btn-sm delete-user">Delete</button> 
            //     `);
                
            // });

            // Function : Make Editable Row
            // function makeEditableRow(currentRow) {
            //     currentRow.find('td').each(function(index) {

            //         const currentCell = $(this);
            //         const currentText = currentCell.text().trim();

            //     if (editableColumns.includes(index)) {
            //             currentCell.html(`<input type="text" class="form-control editable-input" value="${currentText}" />`);
            //     }
            //     });

                
            // }

            // Function : Reset Current Row Editable
            // function resetEditableRow(currentEditableRow) {
            //     currentEditableRow.find('td').each(function(index) {

            //         const currentCell = $(this);

            //         if (editableColumns.includes(index)) {
            //             const currentValue = currentCell.find('input').val();
            //             currentCell.html(`${currentValue}`);
            //         }
            //     });

            //     const userId = currentEditableRow.find('.btn-update').data('id');

            //     currentEditableRow.find('td:last').html(`
            //         <button class="btn btn-success btn-sm btn-edit" data-id="${userId}">Edit</button>
            //         <button data-id="${userId}" class="btn btn-danger btn-sm delete-user">Delete</button>
                
            //     `);
            // }

            // Update function
            // $('table').on('click', '.btn-update', function() {
            //     const userId = $(this).data('id');

            //     const currentRow = $(this).closest('tr');

            //     const updatedUserData = {};

            //     currentRow.find('td').each(function(index) {
            //         if (editableColumns.includes(index)) {
            //             const inputValue = $(this).find('input').val();

            //             if(index === 1)
            //                 updatedUserData.name = inputValue;

            //             if(index === 2)
            //                 updatedUserData.email = inputValue;

            //         }
            //     });


            //     // Ajax call to update user data

            //     $.ajax({
            //         url: '{{ route("users.update") }}',
            //         type: 'PUT',
            //         data: {
            //             id: userId,
            //             name: updatedUserData.name,
            //             email : updatedUserData.email,
            //             _token: '{{ csrf_token() }}',
            //         },
            //         success: function(response){
            //             if (response.status === 'success') {
            //                 table.ajax.reload(function() {
            //                     $('#row-id-' + userId).addClass('highlight');
            //                 });
            //             } else {
            //                 alert(response.message);
            //             }
            //         },
            //         error: function(errorResponse) {
            //             alert(errorResponse.message);
            //         }
            //     });
            // });
        });
    </script>
@endpush