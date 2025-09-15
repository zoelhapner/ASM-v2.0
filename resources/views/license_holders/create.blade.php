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
                       Pemilik Lisensi
                    </p>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                 
                        <a href=" {{ route("license_holders.index") }} " class="btn btn-primary text-white d-none d-sm-inline-block" >
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
                                            Tambah Data Pemilik
                                        </p>
                                    </div>

                            <div class="card-body">
                                <form class="font-normal" action="{{ route('license_holders.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- SECTION 1: Informasi Lead --}}
                                    <h2 class="mt-4 mb-3">Data Pemilik</h2>
                                    <div class="row mb-4">

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama Pemilik</label>
                                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname') }}" required>
                                            @error('fullname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                         <div class="col-md-6 mb-3">
                                            <label class="required">Nama Panggilan</label>
                                            <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname" value="{{ old('nickname') }}" required>
                                            @error('nickname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Jenis Kelamin</label>
                                            <select name="gender" class="form-select" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="1">Laki - Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="email">Email:</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Pilih Lisensi</label>
                                            <select name="licenses[]" class="form-control select2" multiple required>
                                                @foreach($licenses as $license)
                                                    <option value="{{ $license->id }}">{{ $license->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="religion_id">Agama</label>
                                            <select name="religion_id" class="form-select" required>
                                                <option value="">-- Pilih Agama --</option>
                                                @foreach($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{ old('religion_id') == $religion->id ? 'selected' : '' }}>
                                                        {{ $religion->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nomor KTP</label>
                                            <input type="text" class="form-control @error('identity_number') is-invalid @enderror" id="identity_number" name="identity_number" maxlength="16" value="{{ old('identity_number') }}" required>
                                            @error('identity_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Nomor SIM</label>
                                            <input type="number" class="form-control @error('driver_license_number') is-invalid @enderror" id="driver_license_number" name="driver_license_number" value="{{ old('driver_license_number') }}">
                                            @error('driver_license_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tempat Lahir</label>
                                            <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place') }}" required>
                                            @error('birth_place')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Lahir</label>
                                            <input type="date" name="birth_date" class="form-control" required
                                                value="{{ old('birth_date') }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
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
                                                <option value="">-- Pilih Provinsi --</option>
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
                                            <select name="district_id" id="district" class="form-select select2" required>
                                                <option value="district">-- Pilih Kecamatan --</option>
                                            </select>
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
                                                <option value="postal_code">-- Pilih Desa --</option>
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
                                            <label class="required">Hobi</label>
                                            <input type="text" class="form-control @error('hobby') is-invalid @enderror" id="hobby" name="hobby" value="{{ old('hobby') }}" required>
                                            @error('hobby')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="photo" class="form-label">Upload Foto Diri</label>
                                            <input type="file" name="photo" class="form-control" accept="image/*">
                                            @error('photo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="photo" class="form-label required">Upload KTP</label>
                                            <input type="file" name="identity_photo" class="form-control" accept="image/*">
                                            @error('identity_photo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>

                                    {{-- SECTION 2: Data Kontak --}}
                                    <h2 class="mt-4 mb-3">Data Pernikahan</h2>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Status Pernikahan :</label>
                                            <select name="marital_status" class="form-select" required>
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lajang</option>
                                                <option value="2">Menikah</option>
                                                <option value="3">Duda</option>
                                                <option value="4">Janda</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Tanggal Pernikahan</label>
                                            <input type="date" name="married_date" class="form-control"
                                                value="{{ old('married_date') }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>

                                    {{-- SECTION 5: Sosial Media --}}
                                    <h2 class="mt-4 mb-3">Kemampuan Bahasa</h2>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Indonesia (Baca/Tulis) </label>
                                            <select name="indonesian_literacy" class="form-select">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Indonesia (Bicara) </label>
                                            <select name="indonesian_proficiency" class="form-select">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Arab (Baca/Tulis)</label>
                                            <select name="arabic_literacy" class="form-select">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Arab (Bicara)</label>
                                            <select name="arabic_proficiency" class="form-select">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Inggris (Baca/Tulis)</label>
                                            <select name="english_literacy" class="form-select">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Ingris (Bicara)</label>
                                            <select name="english_proficiency" class="form-select">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
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
                                            $('#province').change(function () {
                                            var id = $(this).val();
                                            $('#city').html('<option>Loading...</option>');
                                            $('#district').html('<option value="">-- Pilih kecamatan --</option>');
                                            $('#sub_district').html('<option value="">-- Pilih kelurahan --</option>');

                                            if (id) {
                                            $.get('/api/cities/' + id, function (data) {
                                            $('#city').empty().append('<option value="">-- Pilih city --</option>');
                                            $.each(data, function (i, city) {
                                                $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                                                    });
                                                });
                                                }
                                            });

                                            $('#city').change(function () {
                                            var id = $(this).val();
                                            $('#district').html('<option>Loading...</option>');
                                            $('#sub_district').html('<option value="">-- Pilih kelurahan --</option>');

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