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
                    <p class="page-title">
                        Lisensi
                    </p>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                 
                        <a href=" {{ route("licenses.index") }} " class="btn btn-primary text-white d-none d-sm-inline-block" >
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
                                        <p class="text-center mb-4">
                                            Tambah Data Lisensi
                                        </p>
                                    </div>

                            <div class="card-body">
                                <form action="{{ route('licenses.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- SECTION 1: Informasi Lead --}}
                                    <h5 class="mt-4 mb-3">Data Lisensi</h5>
                                    <div class="row mb-4">

                                        {{-- <div class="col-md-6 mb-3">
                                            <label class="required" for="license_id">ID Lisensi :</label>
                                            <input type="text" class="form-control @error('license_id') is-invalid @enderror" id="license_id" name="license_id" value="{{ old('license_id') }}" required>
                                            @error('license_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="license_type">Tipe Lisensi :</label>
                                                <select name="license_type" id="license_type" class="form-select" required>
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="FO">FO</option>
                                                <option value="SO">SO</option>
                                                <option value="LO">LO</option>
                                                <option value="LC">LC</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Alamat</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Provinsi</label>
                                            <select name="province_id" id="province" class="form-select select2" required>
                                                <option value="province">-- Pilih Provinsi --</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kabupaten/Kota</label>
                                            <select name="city_id" id="city" class="form-select select2" required>
                                                <option value="city">-- Pilih Kota --</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kecamatan</label>
                                            <select name="district_id" id="district" class="form-select select2 @error('district_id') is-invalid @enderror" required>
                                                <option value="district">-- Pilih Kecamatan --</option>
                                            </select>
                                            @error('district_id')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Desa</label>
                                            <select name="sub_district_id" id="sub_district" class="form-select select2" required>
                                                <option value="sub_district">-- Pilih Desa --</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kode Pos</label>
                                            <select name="postal_code_id" id="postal_code" class="form-select select2" required>
                                                <option value="postal_code">-- Pilih Kode Pos --</option>
                                            </select>
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Telepon</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Bergabung</label>
                                            <input type="date" id= "join_date" name="join_date" class="form-control" required
                                                value="{{ old('join_date') }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Expired</label>
                                            <input type="date" id="expired_date" name="expired_date" class="form-control" required
                                                value="{{ old('expired_date') }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nomor Aqad</label>
                                            <input type="text" class="form-control @error('contract_agreement_number') is-invalid @enderror" id="contract_agreement_number" name="contract_agreement_number" value="{{ old('contract_agreement_number') }}" required>
                                            @error('contract_agreement_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="contract_document" class="form-label">Upload Dokumen Aqad (PDF)</label>
                                            <input type="file" id="contract_document" name="contract_document" class="form-control" accept="application/pdf" required>
                                            @error('contract_document')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="document_form" class="form-label">Upload Dokumen Form Lisensi (PDF)</label>
                                            <input type="file" id="document_form" name="document_form" class="form-control" accept="application/pdf" required>
                                            @error('document_form')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status Lisensi</label>
                                            <input type="text" class="form-control" value="{{ old('status', 'akan ditentukan otomatis') }}" disabled>
                                            <small class="text-muted">Status akan ditentukan otomatis berdasarkan tanggal expired.</small>
                                        </div>


                                    </div>

                                    {{-- SECTION 2: Data Kontak --}}
                                    <h5 class="mt-4 mb-3">Data Lokasi</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>Tipe Bangunan</label>
                                            <select name="building_type" class="form-select">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Rukan</option>
                                                <option value="2">Residence</option>
                                                <option value="3">Ruko</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status Bangunan</label>
                                            <select name="building_status" class="form-select">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="1">Milik</option>
                                                <option value="2">Sewa</option>
                                                <option value="3">Lain-Lain</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Sisa masa Sewa </label>
                                            <input type="date" name="building_rent_expired_date" class="form-control"
                                                value="{{ old('building_rent_expired_date') }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label>Luas Bangunan </label>
                                            <input type="text" name="building_area" id="building_area" class="form-control @error('building_area') is-invalid @enderror" value="{{old('building_area')}}">
                                                @error('building_area')<div class="invalid-feedback"> {{$message}}</div>
                                                @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Kondisi Bangunan </label>
                                            <select name="building_condition" class="form-select">
                                                <option value="">-- Pilih Kondisi --</option>
                                                <option value="1">Baik</option>
                                                <option value="2">Cukup</option>
                                                <option value="3">Tidak Baik</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>AC </label>
                                            <select name="building_has_ac" class="form-select">
                                                <option value="">-- Pilih ac --</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- SECTION 5: Sosial Media --}}
                                    <h5 class="mt-4 mb-3">Akun Sosial Media</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-4 mb-3">
                                            <label>Instagram</label>
                                            <input type="url" name="instagram" class="form-control" value="{{ old('instagram') }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Facebook</label>
                                            <input type="url" name="facebook_page" class="form-control" value="{{ old('facebook_page') }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Tiktok</label>
                                            <input type="url" name="tiktok" class="form-control" value="{{ old('tiktok') }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Youtube</label>
                                            <input type="url" name="youtube" class="form-control" value="{{ old('youtube') }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Google Maps</label>
                                            <input type="url" name="google_maps" class="form-control" value="{{ old('google_maps') }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Landing Page</label>
                                            <input type="url" name="landing_page_student_registration" class="form-control" value="{{ old('landing_page_student_registration') }}">
                                        </div>
                                    </div>

                                    {{-- Submit Button --}}
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary text-white">Simpan</button>
                                        </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

                                    @push('js')
                                        <script>
                                            $(document).ready(function() {
                                                $('.select2').select2({
                                                    placeholder: "-- Pilih --",
                                                    width: '100%'
                                                });
                                            });
                                        </script>

                                        <script>
document.addEventListener('DOMContentLoaded', function () {
    const licenseTypeSelect = document.getElementById('license_type');
    const wilayahFields = ['province', 'city', 'district', 'sub_district', 'postal_code'];
    const lainFields = ['join_date', 'expired_date', 'contract_agreement_number', 'contract_document', 'document_form'];

    function toggleWilayah() {
        const isFO = licenseTypeSelect.value === 'FO';
        wilayahFields.forEach(id => {
            const field = document.getElementById(id);
            if (isFO) {
                field.removeAttribute('required');
                field.setAttribute('disabled', 'disabled');
                $(field).val('').trigger('change');
            } else {
                field.removeAttribute('disabled');
                field.setAttribute('required', 'required');
            }
        });
    }

    function toggleLain() {
        const isFO = licenseTypeSelect.value === 'FO';
        lainFields.forEach(id => {
            const field = document.getElementById(id);
            if (isFO) {
                field.removeAttribute('required');
                field.setAttribute('disabled', 'disabled');
                $(field).val('').trigger('change');
            } else {
                field.removeAttribute('disabled');
                field.setAttribute('required', 'required');
            }
        });
    }

    licenseTypeSelect.addEventListener('change', function () {
        toggleWilayah();
        toggleLain();
    });

    // Jalankan awal
    toggleWilayah();
    toggleLain();
});

                                            $('#province').change(function () {
                                            var id = $(this).val();
                                            $('#city').html('<option>Loading...</option>');
                                            $('#district').html('<option value="">-- Pilih kecamatan --</option>');
                                            $('#sub_district').html('<option value="">-- Pilih kelurahan --</option>');

                                            if (id) {
                                            $.get('/api/cities/' + id, function (data) {
                                            $('#city').empty().append('<option value="">-- Pilih Kota --</option>');
                                            $.each(data, function (i, city) {
                                                $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                                                    });
                                                });
                                                }
                                            });

                                            $('#city').change(function () {
                                            var id = $(this).val();
                                            $('#district').html('<option>Loading...</option>');
                                            $('#sub_district').html('<option value="">-- Pilih Kelurahan --</option>');

                                            if (id) {
                                                $.get('/api/districts/' + id, function (data) {
                                                    $('#district').empty().append('<option value="">-- Pilih kecamatan --</option>');
                                                    $.each(data, function (i, district) {
                                                        $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                                                            });
                                                        });
                                                    }
                                                });

                                            $('#district').change(function () {
                                            var id = $(this).val();
                                            $('#sub_district').html('<option>Loading...</option>');

                                                if (id) {
                                                    $.get('/api/sub_districts/' + id, function (data) {
                                                        $('#sub_district').empty().append('<option value="">-- Pilih kelurahan --</option>');
                                                        $.each(data, function (i, sub_district) {
                                                            $('#sub_district').append('<option value="' + sub_district.id + '">' + sub_district.name + '</option>');
                                                        });
                                                    });
                                                }
                                            });

                                            $('#sub_district').change(function () {
                                            var id = $(this).val();
                                            $('#postal_code').html('<option>Loading...</option>');

                                            if (id) {
                                                $.get('/api/postal_codes/' + id, function (data) {
                                                    $('#postal_code').empty().append('<option value="">-- Pilih kode pos --</option>');
                                                    $.each(data, function (i, postal_code) {
                                                        $('#postal_code').append('<option value="' + postal_code.id + '">' + postal_code.postal_code + '</option>');
                                                    });
                                                });
                                              }
                                         });
                                    
                                        </script>
                                    @endpush


