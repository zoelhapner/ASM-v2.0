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
                  
                        <a href=" {{ route("licenses.index") }} " class="btn btn-primary d-none d-sm-inline-block" >
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
                            <form  class="font-normal" style="font-weight: 400; font-family: 'Poppins', sans-serif;" action="{{ route('licenses.update', $license->id) }}" method="POST">
                                        @csrf
                                        @method('put')

                                    {{-- SECTION 1: Informasi Lead --}}
                                    <h5 class="mt-4 mb-3">Data Lisensi</h5>
                                    <div class="row mb-4">

                                        <div class="col-md-6 mb-3">
                                            <label for="license_id">ID Lisensi <code>*</code></label>
                                            <input type="text" class="form-control @error('license_id') is-invalid @enderror" id="license_id" name="license_id" value="{{ old('license_id', $license->license_id) }}" required>
                                            @error('license_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="license_type">Tipe Lisensi *:</label>
                                                <select name="license_type" class="form-control" required>
                                                <option value="">Pilih Data</option>
                                                <option value="fo" {{ $license->license_type == 'fo' ? 'selected' : '' }}>FO</option>
                                                <option value="so" {{ $license->license_type == 'so' ? 'selected' : '' }}>SO</option>
                                                <option value="lo" {{ $license->license_type == 'lo' ? 'selected' : '' }}>LO</option>
                                                <option value="lc" {{ $license->license_type == 'lc' ? 'selected' : '' }}>LC</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Nama *</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $license->name) }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Email *</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $license->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Alamat *</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $license->address) }}" required>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Provinsi *</label>
                                            <select name="province_id" id="province" class="form-control" required>
                                                <option value="">-- Pilih Provinsi --</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}"
                                                        {{ $license->province_id == $province->id ? 'selected' : '' }}>
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Kabupaten/Kota *</label>
                                            <select name="city_id" id="city" class="form-control" required>
                                                <option value="city">-- Pilih Kota --</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ $license->city_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Kecamatan *</label>
                                            <select name="district_id" id="district" class="form-control" required>
                                                <option value="district">-- Pilih Kecamatan --</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $license->district_id == $district->id ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Desa *</label>
                                            <select name="sub_district_id" id="sub_district" class="form-control" required>
                                                <option value="sub_district">-- Pilih Desa --</option>
                                                @foreach($subDistricts as $subdistrict)
                                                    <option value="{{ $subdistrict->id }}"
                                                        {{ $license->sub_district_id == $subdistrict->id ? 'selected' : '' }}>
                                                        {{ $subdistrict->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Kode Pos *</label>
                                            <select name="postal_code_id" id="postal_code" class="form-control" required>
                                                <option value="postal_code">-- Pilih Desa --</option>
                                                @foreach($postalCodes as $postal_code)
                                                    <option value="{{ $postal_code->id }}"
                                                        {{ $license->postal_code_id == $postal_code->id ? 'selected' : '' }}>
                                                        {{ $postal_code->postal_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Script AJAX -->
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
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
                                    
                                        <div class="col-md-6 mb-3">
                                            <label>Telepon *</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $license->phone) }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label>Tanggal Bergabung *</label>
                                            <input type="date" name="join_date" class="form-control" required
                                                value="{{ old('join_date', $license->join_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label>Tanggal Expired *</label>
                                            <input type="date" name="expired_date" class="form-control" required
                                                value="{{ old('expired_date', $license->expired_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label>Nomor Aqad *</label>
                                            <input type="text" class="form-control @error('contract_agreement_number') is-invalid @enderror" id="contract_agreement_number" name="contract_agreement_number" value="{{ old('contract_agreement_number', $license->contract_agreement_number) }}" required>
                                            @error('contract_agreement_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status Lisensi *</label>
                                            <select name="status" class="form-control" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="active" {{ $license->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" {{ $license->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                <option value="expired" {{ $license->status == 'expired' ? 'selected' : '' }}>Expired</option>
                                            </select>
                                        </div>

                                    </div>

                                    {{-- SECTION 2: Data Kontak --}}
                                    <h5 class="mt-4 mb-3">Data Lokasi</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>Tipe Bangunan *</label>
                                            <select name="building_type" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $license->building_type == '1' ? 'selected' : '' }}>Rukan</option>
                                                <option value="2" {{ $license->building_type == '2' ? 'selected' : '' }}>Residence</option>
                                                <option value="3" {{ $license->building_type == '3' ? 'selected' : '' }}>Ruko</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status Bangunan *</label>
                                            <select name="building_status" class="form-control">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="1" {{ $license->building_status == '1' ? 'selected' : '' }}>Milik</option>
                                                <option value="2" {{ $license->building_status == '2' ? 'selected' : '' }}>Sewa</option>
                                                <option value="3" {{ $license->building_status == '3' ? 'selected' : '' }}>Lain-Lain</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Sisa masa Sewa *</label>
                                            <input type="date" name="building_rent_expired_date" class="form-control"
                                                value="{{ old('building_rent_expired_date', $license->building_rent_expired_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label>Luas Bangunan *</label>
                                            <input type="text" name="building_area" id="building_area" class="form-control @error('building_area') is-invalid @enderror" value="{{old('building_area', $license->building_area)}}">
                                                @error('building_area')<div class="invalid-feedback"> {{$message}}</div>
                                                @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Kondisi Bangunan *</label>
                                            <select name="building_condition" class="form-control">
                                                <option value="">-- Pilih Kondisi --</option>
                                                <option value="1" {{ $license->building_condition == '1' ? 'selected' : '' }}>Baik</option>
                                                <option value="2" {{ $license->building_condition == '2' ? 'selected' : '' }}>Cukup</option>
                                                <option value="3" {{ $license->building_condition == '3' ? 'selected' : '' }}>Tidak Baik</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>AC *</label>
                                            <select name="building_has_ac" class="form-control">
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

                                <button type="submit" class="btn btn-primary mt-4">Update</button>
                             </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection