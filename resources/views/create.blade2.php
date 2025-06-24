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
                 
                        <a href=" {{ route("license_holder_educations.index") }} " class="btn btn-primary d-none d-sm-inline-block" >
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
                                            Tambah Data Pendidikan
                                        </p>
                                    </div>

                            <div class="card-body">
                                <form class="font-normal" style="font-weight: 400; font-family: 'Poppins', sans-serif;" action="{{ route('license_holder_educations.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- SECTION 1: Informasi Lead --}}
                                    <h2 class="mt-4 mb-3">Data Pendidikan</h2>
                                    <div class="row mb-4">

                                        <div class="col-md-6 mb-3">
                                            <label for="license_holder_id">Pilih Lisensi <code>*</code></label>
                                            <select name="license_holder_id" class="form-control" required>
                                                <option value="">-- Pilih Lisensi --</option>
                                                @foreach($license_holder as $license_holder)
                                                    <option value="{{ $license_holder->id }}">{{ $license_holder->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label>Nama Pemilik *</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="religion_id">Agama *</label>
                                            <select name="religion_id" class="form-control" required>
                                                <option value="">-- Pilih Agama --</option>
                                                @foreach($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{ old('religion_id') == $religion->id ? 'selected' : '' }}>
                                                        {{ $religion->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Nomor KTP *</label>
                                            <input type="number" class="form-control @error('identity_number') is-invalid @enderror" id="identity_number" name="identity_number" maxlength="16" value="{{ old('identity_number') }}" required>
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
                                            <label>Tempat Lahir *</label>
                                            <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place') }}" required>
                                            @error('birth_place')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label>Tanggal Lahir *</label>
                                            <input type="date" name="birth_date" class="form-control" required
                                                value="{{ old('birth_date') }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Alamat *</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Telepon *</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Hobi *</label>
                                            <input type="text" class="form-control @error('hobby') is-invalid @enderror" id="hobby" name="hobby" value="{{ old('hobby') }}" required>
                                            @error('hobby')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                         <div class="col-md-6 mb-3">
                                            <label for="photo" class="form-label">Upload Photo</label>
                                            <input type="file" name="photo" class="form-control" accept="image/*">
                                            @error('photo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>

                                    {{-- SECTION 2: Data Kontak --}}
                                    <h2 class="mt-4 mb-3">Data Pernikahan</h2>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>Status Pernikahan *</label>
                                            <select name="marital_status" class="form-control">
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
                                            <select name="indonesian_literacy" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Indonesia (Bicara) </label>
                                            <select name="indonesian_proficiency" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Arab (Baca/Tulis)</label>
                                            <select name="arabic_literacy" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Arab (Bicara)</label>
                                            <select name="arabic_proficiency" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Inggris (Baca/Tulis)</label>
                                            <select name="english_literacy" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Ingris (Bicara)</label>
                                            <select name="english_proficiency" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lancar</option>
                                                <option value="2">Tidak Lancar</option>
                                            </select>
                                        </div>

                                    </div>

                                    {{-- Submit Button --}}
                                        <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection