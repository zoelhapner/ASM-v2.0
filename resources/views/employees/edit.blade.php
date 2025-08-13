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
                        Data Karyawan
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                  
                        <a href=" {{ route("employees.index") }} " class="btn btn-primary d-none d-sm-inline-block" >
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
                                Edit Data Karyawan
                            </p>
                        </div>

                        <div class="card-body">
                            <form  class="font-normal" style="font-weight: 400; font-family: 'Poppins', sans-serif;" action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        @php
                                            $disabled = auth()->user()->hasRole('Karyawan') ? 'disabled' : '';
                                        @endphp

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                    <h2 class="mt-4 mb-3">Data Karyawan</h2>
                                    <div class="row mb-4">

                                   <div class="col-md-6 mb-3">
                                    <label class="required" for="licenses">Pilih Lisensi</label>

                                    @if(auth()->user()->hasAnyRole(['Pemilik Lisensi', 'Karyawan', 'Akuntan']))
                                        {{-- Dropdown nonaktif hanya untuk tampilan --}}
                                        <select class="form-control select2" multiple disabled>
                                            @foreach($licenses as $license)
                                                <option value="{{ $license->id }}"
                                                    {{ $employee->licenses->contains($license->id) ? 'selected' : '' }}>
                                                    {{ $license->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        {{-- Hidden input untuk tetap mengirim data lisensi --}}
                                        @foreach($employee->licenses as $license)
                                            <input type="hidden" name="licenses[]" value="{{ $license->id }}">
                                        @endforeach

                                    @else
                                        {{-- Role lain (HR/Admin) bisa pilih lisensi --}}
                                        <select name="licenses[]" class="form-control select2" multiple required>
                                            @foreach($licenses as $license)
                                                <option value="{{ $license->id }}"
                                                    {{ collect(old('licenses', $employee->licenses->pluck('id')->toArray()))->contains($license->id) ? 'selected' : '' }}>
                                                    {{ $license->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>


                                        <div class="col-md-6 mb-3">
                                            <label class="required">NIK</label>
                                            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $employee->nik) }}" required readonly>
                                            @error('nik')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama Karyawan</label>
                                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname', $employee->fullname) }}" required>
                                            @error('fullname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama Panggilan</label>
                                            <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname" value="{{ old('nickname', $employee->nickname) }}" required>
                                            @error('nickname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Jenis Kelamin </label>
                                            <select name="gender" class="form-select" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="1" {{ $employee->gender == 1 ? 'selected' : '' }}>Laki - Laki</option>
                                                <option value="2" {{ $employee->gender == 2 ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="email">Email: </label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $employee->user->email) }}"
                                            @if(auth()->user()->hasRole('Karyawan')) readonly @endif>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="religion_id">Agama</label>
                                            <select name="religion_id" class="form-select" required>
                                                <option value="">-- Pilih Agama --</option>
                                                @foreach($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{ old('religion_id', $employee->religion_id) == $religion->id ? 'selected' : '' }}>
                                                        {{ $religion->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nomor KTP</label>
                                            <input type="number" class="form-control @error('identity_number') is-invalid @enderror" id="identity_number" name="identity_number" maxlength="16" value="{{ old('identity_number', $employee->identity_number) }}" required>
                                            @error('identity_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tempat Lahir</label>
                                            <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place', $employee->birth_place) }}" required>
                                            @error('birth_place')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Lahir</label>
                                            <input type="date" name="birth_date" class="form-control" required
                                                value="{{ old('birth_date', $employee->birth_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Alamat</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $employee->address) }}" required>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Provinsi</label>
                                            <select name="province_id" id="province" class="form-select select2" required>
                                                <option value="">-- Pilih Provinsi --</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}"
                                                        {{ $employee->province_id == $province->id ? 'selected' : '' }}>
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kabupaten/Kota</label>
                                            <select name="city_id" id="city" class="form-select select2" required>
                                                <option value="">-- Pilih Kota --</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ $employee->city_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kecamatan</label>
                                            <select name="district_id" id="district" class="form-select select2" required>
                                                <option value="">-- Pilih Kecamatan --</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $employee->district_id == $district->id ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Desa</label>
                                            <select name="sub_district_id" id="sub_district" class="form-select select2" required>
                                                <option value="">-- Pilih Desa --</option>
                                                @foreach($subDistricts as $sub_district)
                                                    <option value="{{ $sub_district->id }}"
                                                        {{ $employee->sub_district_id == $sub_district->id ? 'selected' : '' }}>
                                                        {{ $sub_district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kode Pos</label>
                                            <select name="postal_code_id" id="postal_code" class="form-select select2" required>
                                                <option value="">-- Pilih Desa --</option>
                                                @foreach($postalCodes as $postal_code)
                                                    <option value="{{ $postal_code->id }}"
                                                        {{ $employee->postal_code_id == $postal_code->id ? 'selected' : '' }}>
                                                        {{ $postal_code->postal_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Telepon</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Jabatan</label>
                                            <select name="position[]" multiple class="form-control select2">
                                                @php
                                                    $positions = is_array($employee->position)
                                                        ? $employee->position
                                                        : json_decode($employee->position ?? '[]', true);
                                                @endphp

                                                <option value="Komisaris" {{ in_array("Komisaris", $positions) ? 'selected' : '' }}>Komisaris</option>
                                                <option value="Direktur" {{ in_array("Direktur", $positions) ? 'selected' : '' }}>Direktur</option>
                                                <option value="Manager" {{ in_array("Manager", $positions) ? 'selected' : '' }}>Manager</option>
                                                <option value="Supervisor" {{ in_array("Supervisor", $positions) ? 'selected' : '' }}>Supervisor</option>
                                                <option value="Staff" {{ in_array("Staff", $positions) ? 'selected' : '' }}>Staff</option>
                                            </select>

                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Departemen</label>
                                            <select name="department[]" multiple class="form-control select2">
                                                @php
                                                    $departments = is_array($employee->department)
                                                        ? $employee->department
                                                        : json_decode($employee->department ?? '[]', true);
                                                @endphp


                                                <option value="Networking" {{ in_array("Networking", $departments) ? 'selected' : '' }}>Networking</option>
                                                <option value="Produksi" {{ in_array("Produksi", $departments) ? 'selected' : '' }}>Produksi</option>
                                                <option value="Keuangan" {{ in_array("Keuangan", $departments) ? 'selected' : '' }}>Keuangan</option>
                                                <option value="HR" {{ in_array("HR", $departments) ? 'selected' : '' }}>HR</option>
                                                <option value="Marketing" {{ in_array("Marketing", $departments) ? 'selected' : '' }}>Marketing</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Unit Kerja</label>
                                            <select id="unit" name="unit[]" multiple class="form-control select2">
                                               @php
                                                    $units = is_array($employee->unit)
                                                        ? $employee->unit
                                                        : json_decode($employee->unit ?? '[]', true);
                                                @endphp

                                                <option value="Lisensi" {{ in_array("Lisensi", $units) ? 'selected' : '' }}>Lisensi</option>
                                                <option value="Event" {{ in_array("Event", $units) ? 'selected' : '' }}>Event</option>
                                                <option value="Training" {{ in_array("Training", $units) ? 'selected' : '' }}>Training</option>
                                                <option value="Trainer Pusat" {{ in_array("Trainer Pusat", $units) ? 'selected' : '' }}>Trainer Pusat</option>
                                                <option value="Trainer Wilayah" {{ in_array("Trainer Wilayah", $units) ? 'selected' : '' }}>Trainer Wilayah</option>
                                                <option value="Pengadaan" {{ in_array("Pengadaan", $units) ? 'selected' : '' }}>Pengadaan</option>
                                                <option value="Kursus" {{ in_array("Kursus", $units) ? 'selected' : '' }}>Kursus</option>
                                                <option value="Instruktur" {{ in_array("Instruktur", $units) ? 'selected' : '' }}>Instruktur</option>

                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Status Karyawan</label>
                                            <select name="employment_status" class="form-select">
                                                <option value="Tetap" {{ $employee->employment_status == "Tetap" ? 'selected' : '' }}>Tetap</option>
                                                <option value="Kontrak" {{ $employee->employment_status == "Kontrak" ? 'selected' : '' }}>Kontrak</option>
                                                <option value="Harian" {{ $employee->employment_status == "Harian" ? 'selected' : '' }}>Harian</option>
                                                <option value="Honorer" {{ $employee->employment_status == "Honorer" ? 'selected' : '' }}>Honorer</option>
                                            </select>
                                        </div>

                                        @if(auth()->user()->hasAnyRole(['Pemilik Lisensi', 'Karyawan', 'Akuntan']))
                                            <div class="col-md-6 mb-3">
                                                <label class="required" for="role">Role:</label>
                                                @php $selectedRole = $employee->user->roles->pluck('name')->first(); @endphp

                                                <input type="hidden" name="role" value="{{ $selectedRole }}">

                                                <select class="form-select" required disabled>
                                                    <option value="">-- Pilih Role --</option>
                                                    @foreach (\Spatie\Permission\Models\Role::all() as $role)
                                                        <option value="{{ $role->name }}" {{ $selectedRole === $role->name ? 'selected' : '' }}>
                                                            {{ ucfirst($role->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Mulai Kerja</label>
                                            <input type="date" name="start_date" class="form-control" required
                                                value="{{ old('start_date', $employee->start_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Status Pernikahan</label>
                                            <select name="marital_status" class="form-select" required>
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1" {{ $employee->marital_status == 1 ? 'selected' : '' }}>Lajang</option>
                                                <option value="2" {{ $employee->marital_status == 2 ? 'selected' : '' }}>Menikah</option>
                                                <option value="3" {{ $employee->marital_status == 3 ? 'selected' : '' }}>Duda</option>
                                                <option value="4" {{ $employee->marital_status == 4 ? 'selected' : '' }}>Janda</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- SECTION 2: Data Kontak --}}
                                    <h2 class="mt-4 mb-3">Upload File</h2>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>PDF Saat Ini:</label><br>
                                            @if ($employee->contract_letter_file)
                                                 <a href="{{ asset('storage/' . $employee->contract_letter_file) }}" 
                                                    target="_blank" 
                                                    class="btn btn-sm btn-outline-primary">
                                                        Lihat / Unduh PDF
                                                </a>
                                            @else
                                            <div class="me-3">
                                                <p class="text-muted mb-0">Belum ada surat perjanjian kerja.</p>
                                            </div>
                                            @endif
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="contract_letter_file" class="form-label">Upload Surat Perjanjian Kerja Baru (PDF)</label>
                                            <input type="file" name="contract_letter_file" class="form-control" accept="application/pdf">
                                            <small class="text-muted">Kosongkan jika tidak ingin mengubah file.</small>
                                        </div>

                                        <div id="upload-sertifikat-container" style="display: none;" class="row mb-3 align-items-start">
                                            {{-- PDF Saat Ini --}}
                                            <div class="col-md-6">
                                                <label>PDF Saat Ini:</label><br>
                                                @if ($employee->instructure_certificate)
                                                    <a href="{{ asset('storage/' . $employee->instructure_certificate) }}" 
                                                    target="_blank" 
                                                    class="btn btn-sm btn-outline-primary">
                                                        Lihat / Unduh PDF
                                                    </a>
                                                @else
                                                    <p class="text-muted mb-0">Belum ada sertifikat</p>
                                                @endif
                                            </div>

                                            {{-- Upload File Baru --}}
                                            <div class="col-md-6">
                                                <label for="instructure_certificate" class="form-label">Upload Sertifikat Instruktur Terbaru (PDF)</label>
                                                <input type="file" name="instructure_certificate" class="form-control" accept="application/pdf">
                                                <small class="text-muted">Kosongkan jika tidak ingin mengubah file.</small>

                                                <label for="expired_date_certificate" class="form-label mt-3">Tanggal Expired Sertifikat</label>
                                                <input type="date" name="expired_date_certificate" class="form-control"
                                                    value="{{ old('expired_date_certificate', $employee->expired_date_certificate) }}"
                                                    pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                                @error('expired_date_certificate')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 align-items-center">
                                            <div class="col-md-6">
                                                <label for="photo" class="form-label">Ganti Foto</label>
                                                <input type="file" name="photo" class="form-control" accept="image/*">
                                                @error('photo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Foto Saat Ini:</label><br>
                                                @if ($employee->photo)
                                                    <img src="{{ asset('storage/' . $employee->photo) }}" class="rounded mb-2" width="150">
                                                @else
                                                    <p class="text-muted mb-0">Belum ada foto</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3 align-items-center">
                                            <div class="col-md-6">
                                                <label for="identity_photo" class="form-label">Ganti Foto KTP</label>
                                                <input type="file" name="identity_photo" class="form-control" accept="image/*">
                                                @error('identity_photo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Foto KTP Saat Ini:</label><br>
                                                @if ($employee->identity_photo)
                                                    <img src="{{ asset('storage/' . $employee->identity_photo) }}" class="rounded mb-2" width="150">
                                                @else
                                                    <p class="text-muted mb-0">Belum ada foto KTP</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                        

                                        {{-- <div class="col-md-6 mb-3">
                                            <label>Tanggal Pernikahan</label>
                                            <input type="date" name="married_date" class="form-control"
                                                value="{{ old('married_date', $employee->married_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div> --}}
                                    

                                    {{-- SECTION 5: Sosial Media --}}
                                    <h2 class="mt-4 mb-3">Data Penggajian</h2>
                                    <div class="row mb-4">
    {{-- Gaji Pokok --}}
    <div class="col-md-6 mb-3">
        <label class="required">Gaji Pokok</label>
        @if(auth()->user()->hasRole('Karyawan'))
            <input type="hidden" name="basic_salary" value="{{ $employee->basic_salary }}">
            <input type="number" class="form-control" value="{{ $employee->basic_salary }}" disabled>
        @else
            <input type="number" class="form-control @error('basic_salary') is-invalid @enderror"
                name="basic_salary" value="{{ old('basic_salary', $employee->basic_salary) }}" required>
            @error('basic_salary')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        @endif
    </div>

    {{-- Tunjangan --}}
    <div class="col-md-6 mb-3">
        <label class="required">Tunjangan</label>
        @if(auth()->user()->hasRole('Karyawan'))
            <input type="hidden" name="allowance" value="{{ $employee->allowance }}">
            <input type="number" class="form-control" value="{{ $employee->allowance }}" disabled>
        @else
            <input type="number" class="form-control @error('allowance') is-invalid @enderror"
                name="allowance" value="{{ old('allowance', $employee->allowance) }}" required>
            @error('allowance')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        @endif
    </div>

    {{-- Potongan --}}
    <div class="col-md-6 mb-3">
        <label class="required">Potongan</label>
        @if(auth()->user()->hasRole('Karyawan'))
            <input type="hidden" name="deduction" value="{{ $employee->deduction }}">
            <input type="number" class="form-control" value="{{ $employee->deduction }}" disabled>
        @else
            <input type="number" class="form-control @error('deduction') is-invalid @enderror"
                name="deduction" value="{{ old('deduction', $employee->deduction) }}" required>
            @error('deduction')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        @endif
    </div>

    {{-- Bonus --}}
    <div class="col-md-6 mb-3">
        <label class="required">Bonus</label>
        @if(auth()->user()->hasRole('Karyawan'))
            <input type="hidden" name="bonus" value="{{ $employee->bonus }}">
            <input type="number" class="form-control" value="{{ $employee->bonus }}" disabled>
        @else
            <input type="number" class="form-control @error('bonus') is-invalid @enderror"
                name="bonus" value="{{ old('bonus', $employee->bonus) }}" required>
            @error('bonus')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        @endif
    </div>

    {{-- THR --}}
    <div class="col-md-6 mb-3">
        <label class="required">THR</label>
        @if(auth()->user()->hasRole('Karyawan'))
            <input type="hidden" name="thr" value="{{ $employee->thr }}">
            <input type="number" class="form-control" value="{{ $employee->thr }}" disabled>
        @else
            <input type="number" class="form-control @error('thr') is-invalid @enderror"
                name="thr" value="{{ old('thr', $employee->thr) }}" required>
            @error('thr')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        @endif
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

                                    @push('js')
<script>
    $(document).ready(function () {
        function toggleSertifikatInstruktur() {
            let selectedUnits = $('#unit').val();
            let container = $('#upload-sertifikat-container');
            let input = $('input[name="instructure_certificate"]');

            if (selectedUnits && selectedUnits.includes("Instruktur")) {
                container.show();
                input.prop('required', true);
            } else {
                container.hide();
                input.prop('required', false);
            }
        }

        // Inisialisasi Select2
        $('.select2').select2({
            placeholder: "-- Pilih --",
            width: '100%'
        });

        // Jalankan saat halaman dimuat dan ketika user ganti pilihan
        toggleSertifikatInstruktur();
        $('#unit').on('change', toggleSertifikatInstruktur);
    });
</script>

<script>
    $(document).ready(function () {
        const $licenses = $('select[name="licenses[]"]');
        const $nikInput = $('input[name="nik"]');

        // Inisialisasi select2 jika belum
        if (!$licenses.hasClass("select2-hidden-accessible")) {
            $licenses.select2();
        }

        function generateNik(licenseId) {
            $.ajax({
                url: `/employees/generate-nik/${licenseId}`,
                type: 'GET',
                success: function (response) {
                    if (response.nik) {
                        $nikInput.val(response.nik);
                    } else {
                        $nikInput.val('');
                    }
                },
                error: function () {
                    console.error("Gagal mengambil NIK.");
                    $nikInput.val('');
                }
            });
        }

        // Saat user mengganti lisensi → generate ulang NIK
        $licenses.on('change', function () {
            const selected = $(this).val();
            if (Array.isArray(selected) && selected.length > 0) {
                generateNik(selected[0]); // Gunakan lisensi pertama
            } else {
                $nikInput.val('');
            }
        });

        // Optional: Trigger generate otomatis saat halaman edit dibuka (kalau ingin refresh NIK)
        // Uncomment baris ini kalau memang perlu
        const initialSelected = $licenses.val();
        if (Array.isArray(initialSelected) && initialSelected.length > 0) {
            generateNik(initialSelected[0]);
        }
    });
</script>


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
                                    @endpush