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
                        License
                    </h2>
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
                            <p class="text-center mb-4" style="font-size: 1.5rem; font-weight: 400; font-family: 'Poppins', sans-serif;">
                                Edit Data Lisensi
                            </p>
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="font-normal" style="font-weight: 400; font-family: 'Poppins', sans-serif;" action="{{ route('licenses.update', $license->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @php
                                            $disabled = auth()->user()->hasRole('Pemilik Lisensi') ? 'disabled' : '';
                                        @endphp


                                    {{-- SECTION 1: Informasi Lead --}}
                                    <h5 class="mt-4 mb-3">Data Lisensi</h5>
                                    <div class="row mb-4">

                                        {{-- <div class="col-md-6 mb-3">
                                            <label class="required" for="license_id">ID Lisensi</label>
                                            <input type="text" class="form-control" value="{{ $license->license_id }}" {{ $disabled }}>
                                            @error('license_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="license_id" value="{{ $license->license_id }}">
                                        @endif --}}

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="license_type">Tipe Lisensi:</label>
                                                <select name="license_type" id="license_type" class="form-select" required {{ $disabled }}>
                                                <option value="">Pilih Data</option>
                                                <option value="FO" {{ $license->license_type == 'FO' ? 'selected' : '' }}>FO</option>
                                                <option value="SO" {{ $license->license_type == 'SO' ? 'selected' : '' }}>SO</option>
                                                <option value="LO" {{ $license->license_type == 'LO' ? 'selected' : '' }}>LO</option>
                                                <option value="LC" {{ $license->license_type == 'LC' ? 'selected' : '' }}>LC</option>
                                            </select>
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="license_type" value="{{ $license->license_type }}">
                                        @endif

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $license->name) }}" required {{ $disabled }}>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="name" value="{{ $license->name }}">
                                        @endif

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $license->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Alamat</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $license->address) }}" required {{ $disabled }}>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="address" value="{{ $license->address }}">
                                        @endif

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Provinsi</label>
                                            <select name="province_id" id="province" class="form-select select2" required {{ $disabled }}>
                                                <option value="province">-- Pilih Provinsi --</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}"
                                                        {{ $license->province_id == $province->id ? 'selected' : '' }}>
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="province_id" value="{{ $license->province_id }}">
                                        @endif

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kabupaten/Kota</label>
                                            <select name="city_id" id="city" class="form-select select2" required {{ $disabled }}>
                                                <option value="city">-- Pilih Kota --</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ $license->city_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="city_id" value="{{ $license->city_id }}">
                                        @endif

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kecamatan</label>
                                            <select name="district_id" id="district" class="form-select select2 @error('district_id') is-invalid @enderror" required {{ $disabled }}>
                                                <option value="district">-- Pilih Kecamatan --</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $license->district_id == $district->id ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="district_id" value="{{ $license->district_id }}">
                                        @endif

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Desa</label>
                                            <select name="sub_district_id" id="sub_district" class="form-select select2" required {{ $disabled }}>
                                                <option value="sub_district">-- Pilih Desa --</option>
                                                @foreach($subDistricts as $subdistrict)
                                                    <option value="{{ $subdistrict->id }}"
                                                        {{ $license->sub_district_id == $subdistrict->id ? 'selected' : '' }}>
                                                        {{ $subdistrict->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="sub_district_id" value="{{ $license->sub_district_id }}">
                                        @endif

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kode Pos</label>
                                            <select name="postal_code_id" id="postal_code" class="form-select select2" required {{ $disabled }}>
                                                <option value="postal_code">-- Pilih Kode Pos --</option>
                                                @foreach($postalCodes as $postal_code)
                                                    <option value="{{ $postal_code->id }}"
                                                        {{ $license->postal_code_id == $postal_code->id ? 'selected' : '' }}>
                                                        {{ $postal_code->postal_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="postal_code_id" value="{{ $license->postal_code_id }}">
                                        @endif
                                                                            
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Telepon</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $license->phone) }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Bergabung</label>
                                            <input type="date" id="join_date" name="join_date" class="form-control" required
                                                value="{{ old('join_date', $license->join_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD" {{ $disabled }}>
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="join_date" value="{{ $license->join_date }}">
                                        @endif
                                    

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Expired</label>
                                            <input type="date" id="expired_date" name="expired_date" class="form-control" required
                                                value="{{ old('expired_date', $license->expired_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD" {{ $disabled }}>
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="expired_date" value="{{ $license->expired_date }}">
                                        @endif
                                    

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nomor Aqad</label>
                                            <input type="text" class="form-control @error('contract_agreement_number') is-invalid @enderror" id="contract_agreement_number" name="contract_agreement_number" value="{{ old('contract_agreement_number', $license->contract_agreement_number) }}" required {{ $disabled }}>
                                            @error('contract_agreement_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                            <input type="hidden" name="contract_agreement_number" value="{{ $license->contract_agreement_number }}">
                                        @endif

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <label>PDF Aqad Saat Ini:</label><br>
                                                @if ($license->contract_document)
                                                    <embed src="{{ asset('storage/public' . $license->contract_document) }}" type="application/pdf" width="100%" height="100px" {{ $disabled }}>
                                                @else
                                                    <div class="me-3">
                                                        <p class="text-muted mb-0">Belum ada dokumen</p>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="contract_document" class="form-label">Upload Dokumen Aqad (PDF)</label>
                                                <input type="file" name="contract_document" class="form-control" accept="application/pdf" {{ $disabled }}>
                                                <small class="text-muted">Kosongkan jika tidak ingin mengubah file.</small>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <label>PDF Form Lisensi Saat Ini:</label><br>
                                                @if ($license->document_form)
                                                    <embed src="{{ asset('storage/public' . $license->document_form) }}" type="application/pdf" width="100%" height="100px" {{ $disabled }}>
                                                @else
                                                    <div class="me-3">
                                                        <p class="text-muted mb-0">Belum ada dokumen</p>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="document_form" class="form-label">Upload Dokumen Form Lisensi (PDF)</label>
                                                <input type="file" name="document_form" class="form-control" accept="application/pdf" {{ $disabled }}>
                                                <small class="text-muted">Kosongkan jika tidak ingin mengubah file.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status Lisensi :</label>
                                            <input type="text" class="form-control" value="{{ ucfirst($license->status) }}" readonly>
                                        </div>

                                    </div>

                                    {{-- SECTION 2: Data Kontak --}}
                                    <h5 class="mt-4 mb-3">Data Lokasi</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>Tipe Bangunan </label>
                                            <select name="building_type" class="form-select">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $license->building_type == '1' ? 'selected' : '' }}>Rukan</option>
                                                <option value="2" {{ $license->building_type == '2' ? 'selected' : '' }}>Residence</option>
                                                <option value="3" {{ $license->building_type == '3' ? 'selected' : '' }}>Ruko</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status Bangunan </label>
                                            <select name="building_status" class="form-select">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="1" {{ $license->building_status == '1' ? 'selected' : '' }}>Milik</option>
                                                <option value="2" {{ $license->building_status == '2' ? 'selected' : '' }}>Sewa</option>
                                                <option value="3" {{ $license->building_status == '3' ? 'selected' : '' }}>Lain-Lain</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Sisa masa Sewa </label>
                                            <input type="date" name="building_rent_expired_date" class="form-control"
                                                value="{{ old('building_rent_expired_date', $license->building_rent_expired_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label>Luas Bangunan </label>
                                            <input type="text" name="building_area" id="building_area" class="form-control @error('building_area') is-invalid @enderror" value="{{old('building_area', $license->building_area)}}">
                                                @error('building_area')<div class="invalid-feedback"> {{$message}}</div>
                                                @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Kondisi Bangunan </label>
                                            <select name="building_condition" class="form-select">
                                                <option value="">-- Pilih Kondisi --</option>
                                                <option value="1" {{ $license->building_condition == '1' ? 'selected' : '' }}>Baik</option>
                                                <option value="2" {{ $license->building_condition == '2' ? 'selected' : '' }}>Cukup</option>
                                                <option value="3" {{ $license->building_condition == '3' ? 'selected' : '' }}>Tidak Baik</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>AC </label>
                                            <select name="building_has_ac" class="form-select">
                                                <option value="">-- Pilih ac --</option>
                                                <option value="1" {{ $license->building_has_ac == '1' ? 'selected' : '' }}>Ya</option>
                                                <option value="0" {{ $license->building_has_ac == '0' ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- SECTION 5: Sosial Media --}}
                                    <h5 class="mt-4 mb-3">Akun Sosial Media</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-4 mb-3">
                                            <label>Instagram</label>
                                            <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $license->instagram) }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Facebook</label>
                                            <input type="url" name="facebook_page" class="form-control" value="{{ old('facebook_page', $license->facebook_page) }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Tiktok</label>
                                            <input type="url" name="tiktok" class="form-control" value="{{ old('tiktok', $license->tiktok) }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Youtube</label>
                                            <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $license->youtube) }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Google Maps</label>
                                            <input type="url" name="google_maps" class="form-control" value="{{ old('google_maps', $license->google_maps) }}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Landing Page</label>
                                            <input type="url" name="landing_page_student_registration" class="form-control" value="{{ old('landing_page_student_registration', $license->landing_page_student_registration) }}">
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary text-white mt-4">Update</button>
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
    
    // ID field sesuai di form edit kamu
    const provinceSelect = $('#province_id');
    const citySelect     = $('#city_id');
    const districtSelect = $('#district_id');
    const sub_districtSelect  = $('#sub_district_id');
    const postal_codeSelect = $('#postal_code_id');

    function setFieldStatus(isFO) {
        // Untuk Select2
        provinceSelect.prop('disabled', isFO).trigger('change');
        citySelect.prop('disabled', isFO).trigger('change');
        districtSelect.prop('disabled', isFO).trigger('change');
        sub_districtSelect.prop('disabled', isFO).trigger('change');
        postal_codeSelect.prop('disabled', isFO).trigger('change');
    }

    // Pas halaman load
    setFieldStatus(licenseTypeSelect.value === 'FO');

    // Kalau user ganti type lisensi di form edit/create
    licenseTypeSelect.addEventListener('change', function () {
        setFieldStatus(this.value === 'FO');
    });
});
                                        $('#province').change(function () {
                                        var id = $(this).val();
                                        $('#city').html('<option>Loading...</option>');
                                        $('#district').html('<option value="">-- Pilih kecamatan --</option>');
                                        $('#sub_district').html('<option value="">-- Pilih Kelurahan --</option>');

                                            if (id) {
                                            $.get('/api/cities/' + id, function (data) {
                                            $('#city').empty().append('<option value="">-- Pilih Kabupaten --</option>');
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
                                                        $('#district').empty().append('<option value="">-- Pilih Kecamatan --</option>');
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
                                                        $('#sub_district').empty().append('<option value="">-- Pilih Kelurahan --</option>');
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
                                                        $('#postal_code').empty().append('<option value="">-- Pilih Kode Pos --</option>');
                                                        $.each(data, function (i, postal_code) {
                                                            $('#postal_code').append('<option value="' + postal_code.id + '">' + postal_code.postal_code + '</option>');
                                                        });
                                                    });
                                                }
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
