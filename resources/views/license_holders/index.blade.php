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
                        Pemilik Lisensi
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                 @can('pemilik-lisensi.tambah')       
                  <span class="d-none d-sm-inline">
                        <a href="{{ route("license_holders.create") }}" class="btn btn-primary d-none d-sm-inline-block" >
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Tambah Data Pemilik
                        </a>
                 </span>
                 @endcan
                        
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
                            <p class="text-center mb-4" style="font-size: 1.5rem; font-weight: 400; font-family: 'Poppins', sans-serif;">
                                 Pemilik Lisensi
                            </p>
                        </div>
                        <div class="table-responsive">
                            <table id="tableLicenseHolders" class="table card-table table-vcenter text-nowrap" style="font-size: 0.9rem; font-weight: 500; font-family: 'Poppins', sans-serif;">
                                <thead>
                                    <tr>
                                        <th class="w-1">Id Lisensi</th>
                                        <th>Nama Lisensi</th>
                                        <th>Nama Pemilik</th>
                                        <th>Agama</th>
                                        <th>Nomor KTP</th>
                                        <th>Nomor SIM</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Provinsi</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Kode Pos</th>
                                        <th>Telepon</th>
                                        <th>Hobi</th>
                                        <th>Status Pernikahan</th>
                                        <th>Tanggal Pernikahan</th>
                                        <th>Bahasa Indonesia(Baca/Tulis)</th>
                                        <th>Bahasa Indonesia(Bicara)</th>
                                        <th>Bahasa Arab (Baca/Tulis)</th>
                                        <th>Bahasa Arab (Bicara)</th>
                                        <th>Bahasa Inggris (Baca/Tulis)</th>
                                        <th>Bahasa Inggris (Bicara)</th>
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
            const table = $('#tableLicenseHolders').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{{ route("license_holders.index") }}',
                columns: [
                    { data: 'license_id', name: 'license_id' },
                    { data: 'license_name', name: 'license.name' },
                    { data: 'name', name: 'name' },
                    { data: 'religion_name', name: 'religion.name'},
                    { data: 'identity_number', name: 'identity_number' },
                    { data: 'driver_license_number', name: 'driver_license_number' },
                    { data: 'birth_place', name: 'birth_place'},
                    { data: 'birth_date', name: 'birth_date' },
                    { data: 'address', name: 'address' },
                    { data: 'province_name', name: 'province.name' },
                    { data: 'city_name', name: 'city.name'},
                    { data: 'district_name', name: 'district.name' },
                    { data: 'sub_district_name', name: 'sub_district_name' },
                    { data: 'postal_code', name: 'postal_code' },
                    { data: 'phone', name: 'phone'},
                    { data: 'hobby', name: 'hobby' },
                    { data: 'marital_status', name: 'marital_status' },
                    { data: 'married_date', name: 'married_date'},
                    { data: 'indonesian_literacy', name: 'indonesian_literacy' },
                    { data: 'indonesian_proficiency', name: 'indonesian_proficiency' },
                    { data: 'arabic_literacy', name: 'arabic_literacy'},
                    { data: 'arabic_proficiency', name: 'arabic_proficiency' },
                    { data: 'english_literacy', name: 'english_literacy' },
                    { data: 'english_proficiency', name: 'english_proficiency'},                    
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
    
            });

            // Delete user functionally
            $('table').on('click', '.delete-license_holder', function () {
            const license_holderId = $(this).data('id');

            Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data akan hilang secara permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'

            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({

                        url: `/license_holders/${license_holderId}`,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },

                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Pemilik telah dihapus.',
                                    timer: 2000,
                                    showConfirmButton: false
                            });

                        table.ajax.reload(null, false); // refresh datatable
                        } else {

                            Swal.fire('Gagal', response.message || 'Tidak bisa menghapus data.', 'error');
                        }
                        },

                    error: function () {

                    Swal.fire('Error', 'Terjadi kesalahan saat menghapus.', 'error');
                    }

                    });
                }
            });
            });


           
        });
    </script>

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif
@endpush