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
                        Pemilik Lisensi
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                  
                        <a href=" {{ route("license_holders.index") }} " class="btn btn-primary d-none d-sm-inline-block" >
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
                                Edit Data Pemilik Lisensi
                            </p>
                        </div>

                        <div class="card-body">
                            <form  class="font-normal" style="font-weight: 400; font-family: 'Poppins', sans-serif;" action="{{ route('license_holders.update', $license_holder->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                    <h2 class="mt-4 mb-3">Data Pemilik</h2>
                                    <div class="row mb-4">

                                        <div class="col-md-6 mb-3">
                                            <label for="license_id">Pilh Lisensi <code>*</code></label>
                                            <select name="license_id" class="form-control" required>
                                            <option value="">-- Pilih Lisensi --</option>
                                            @foreach($licenses as $license)
                                                <option value="{{ $license->id }}" {{ old('license_id', $license_holder->license_id) == $license->id ? 'selected' : '' }}>
                                                    {{ $license->name }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Nama Pemilik *</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $license_holder->name) }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="religion_id">Agama *</label>
                                            <select name="religion_id" class="form-control" required>
                                                <option value="">-- Pilih Agama --</option>
                                                @foreach($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{ old('religion_id', $license_holder->religion_id) == $religion->id ? 'selected' : '' }}>
                                                        {{ $religion->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Nomor KTP *</label>
                                            <input type="number" class="form-control @error('identity_number') is-invalid @enderror" id="identity_number" name="identity_number" maxlength="16" value="{{ old('identity_number', $license_holder->identity_number) }}" required>
                                            @error('identity_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Nomor SIM</label>
                                            <input type="number" class="form-control @error('driver_license_number') is-invalid @enderror" id="driver_license_number" name="driver_license_number" value="{{ old('driver_license_number', $license_holder->driver_license_number) }}">
                                            @error('driver_license_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label>Tempat Lahir *</label>
                                            <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place', $license_holder->birth_place) }}" required>
                                            @error('birth_place')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label>Tanggal Lahir *</label>
                                            <input type="date" name="birth_date" class="form-control" required
                                                value="{{ old('birth_date', $license_holder->birth_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Alamat *</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $license_holder->address) }}" required>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Telepon *</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $license_holder->phone) }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Hobi *</label>
                                            <input type="text" class="form-control @error('hobby') is-invalid @enderror" id="hobby" name="hobby" value="{{ old('hobby', $license_holder->hobby) }}" required>
                                            @error('hobby')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Foto Saat Ini:</label><br>
                                            @if ($license_holder->photo)
                                                <img src="{{ asset('storage/photos/' . $license_holder->photo) }}" class="rounded mb-2" width="150">
                                            @else
                                            <div class="me-3">
                                                <p class="text-muted mb-0">Belum ada foto</p>
                                            </div>
                                            @endif
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="photo" class="form-label">Ganti Foto</label>
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
                                            <select name="marital_status" class="form-control" required>
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $license_holder->marital_status == 1 ? 'selected' : '' }}>Lajang</option>
                                                <option value="2" {{ $license_holder->marital_status == 2 ? 'selected' : '' }}>Menikah</option>
                                                <option value="3" {{ $license_holder->marital_status == 3 ? 'selected' : '' }}>Duda</option>
                                                <option value="4" {{ $license_holder->marital_status == 4 ? 'selected' : '' }}>Janda</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Tanggal Pernikahan</label>
                                            <input type="date" name="married_date" class="form-control"
                                                value="{{ old('married_date', $license_holder->married_date) }}"
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
                                                <option value="1" {{ $license_holder->indonesian_literacy == 1 ? 'selected' : '' }}>Lancar</option>
                                                <option value="2" {{ $license_holder->indonesian_literacy == 2 ? 'selected' : '' }}>Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Indonesia (Bicara) </label>
                                            <select name="indonesian_proficiency" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $license_holder->indonesian_proficiency == 1 ? 'selected' : '' }}>Lancar</option>
                                                <option value="2" {{ $license_holder->indonesian_proficiency == 2 ? 'selected' : '' }}>Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Arab (Baca/Tulis)</label>
                                            <select name="arabic_literacy" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $license_holder->arabic_literacy == 1 ? 'selected' : '' }}>Lancar</option>
                                                <option value="2" {{ $license_holder->arabic_literacy == 2 ? 'selected' : '' }}>Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Arab (Bicara)</label>
                                            <select name="arabic_proficiency" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $license_holder->arabic_proficiency == 1 ? 'selected' : '' }}>Lancar</option>
                                                <option value="2" {{ $license_holder->arabic_proficiency == 2 ? 'selected' : '' }}>Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Inggris (Baca/Tulis)</label>
                                            <select name="english_literacy" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $license_holder->english_literacy == 1 ? 'selected' : '' }}>Lancar</option>
                                                <option value="2" {{ $license_holder->english_literacy == 2 ? 'selected' : '' }}>Tidak Lancar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Bahasa Inngris (Bicara)</label>
                                            <select name="english_proficiency" class="form-control">
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $license_holder->english_proficiency == 1 ? 'selected' : '' }}>Lancar</option>
                                                <option value="2" {{ $license_holder->english_proficiency == 2 ? 'selected' : '' }}>Tidak Lancar</option>
                                            </select>
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