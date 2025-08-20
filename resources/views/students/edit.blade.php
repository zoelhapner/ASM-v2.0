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
                        SIswa
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                  
                        <a href=" {{ route("students.index") }} " class="btn btn-primary d-none d-sm-inline-block" >
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
                                Edit Data Siswa
                            </p>
                        </div>

                        <div class="card-body">
                            <form  class="font-normal" action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                    <h2 class="mt-4 mb-3">Data Siswa</h2>
                                    <div class="row mb-4">

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Pilih Lisensi </label>
                                            <select name="license_id" class="form-control" required>
                                                @foreach($licenses as $license)
                                                    <option value="{{ $license->id }}"
                                                        {{ $student->license_id == $license->id ? 'selected' : '' }}>
                                                        {{ $license->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">NIS </label>
                                            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis', $student->nis) }}" required readonly>
                                            @error('nis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama Lengkap Siswa </label>
                                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname', $student->fullname) }}" required>
                                            @error('fullname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama Panggilan </label>
                                            <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname" value="{{ old('nickname', $student->nickname) }}" required>
                                            @error('nickname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Jenis Kelamin </label>
                                            <select name="gender" class="form-select" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="1" {{ $student->gender == 1 ? 'selected' : '' }}>Laki - Laki</option>
                                                <option value="2" {{ $student->gender == 2 ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email: </label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="religion_id">Agama </label>
                                            <select name="religion_id" class="form-control" required>
                                                <option value="">-- Pilih Agama --</option>
                                                @foreach($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{ old('religion_id', $student->religion_id) == $religion->id ? 'selected' : '' }}>
                                                        {{ $religion->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tempat Lahir </label>
                                            <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place', $student->birth_place) }}" required>
                                            @error('birth_place')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Lahir </label>
                                            <input type="date" name="birth_date" class="form-control" required
                                                value="{{ old('birth_date', $student->birth_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Umur</label>
                                            <input type="text" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', $student->age) }}">
                                            @error('age')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Alamat </label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $student->address) }}" required>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Provinsi </label>
                                            <select name="province_id" id="province" class="form-select select2" required>
                                                <option value="province">-- Pilih Provinsi --</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}"
                                                        {{ $student->province_id == $province->id ? 'selected' : '' }}>
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kabupaten/Kota </label>
                                            <select name="city_id" id="city" class="form-select select2" required>
                                                <option value="city">-- Pilih Kota --</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ $student->city_id == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kecamatan </label>
                                            <select name="district_id" id="district" class="form-select select2" required>
                                                <option value="district">-- Pilih Kecamatan --</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $student->district_id == $district->id ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Desa </label>
                                            <select name="sub_district_id" id="sub_district" class="form-select select2" required>
                                                <option value="sub_district">-- Pilih Desa --</option>
                                                @foreach($subDistricts as $sub_district)
                                                    <option value="{{ $sub_district->id }}"
                                                        {{ $student->sub_district_id == $sub_district->id ? 'selected' : '' }}>
                                                        {{ $sub_district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kode Pos </label>
                                            <select name="postal_code_id" id="postal_code" class="form-select select2" required>
                                                <option value="postal_code">-- Pilih Desa --</option>
                                                @foreach($postalCodes as $postal_code)
                                                    <option value="{{ $postal_code->id }}"
                                                        {{ $student->postal_code_id == $postal_code->id ? 'selected' : '' }}>
                                                        {{ $postal_code->postal_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama Ayah </label>
                                            <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ old('father_name', $student->father_name) }}" required>
                                            @error('father_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nomor HP Ayah </label>
                                            <input type="number" class="form-control @error('father_phone') is-invalid @enderror" id="father_phone" name="father_phone" value="{{ old('father_phone', $student->father_phone) }}" required>
                                            @error('father_phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama Bunda </label>
                                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ old('mother_name', $student->mother_name) }}" required>
                                            @error('mother_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nomor HP Bunda </label>
                                            <input type="number" class="form-control @error('mother_phone') is-invalid @enderror" id="mother_phone" name="mother_phone" value="{{ old('mother_phone', $student->mother_phone) }}" required>
                                            @error('mother_phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Nomor HP Siswa</label>
                                            <input type="number" class="form-control @error('student_phone') is-invalid @enderror" id="student_phone" name="student_phone" value="{{ old('student_phone', $student->student_phone) }}">
                                            @error('student_phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row mb-3 align-items-center">
                                            <div class="col-md-6">
                                                <label>Foto Saat Ini:</label><br>
                                                @if ($student->photo)
                                                    <img src="{{ asset('storage/photos/' . $student->photo) }}" class="rounded mb-2" width="150">
                                                @else
                                                <div class="me-3">
                                                    <p class="text-muted mb-0">Belum ada foto</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="photo" class="form-label">Ganti Foto</label>
                                                <input type="file" name="photo" class="form-control" accept="image/*">
                                                @error('photo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    {{-- SECTION 2: Data Kontak --}}
                                    <h2 class="mt-4 mb-3">Data Sekolah</h2>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nama Sekolah Asal </label>
                                            <input type="text" class="form-control @error('previous_school') is-invalid @enderror" id="previous_school" name="previous_school" value="{{ old('previous_school', $student->previous_school) }}" required>
                                            @error('previous_school')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Kelas </label>
                                            <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ old('grade', $student->grade) }}" required>
                                            @error('grade')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Status </label>
                                            <select name="status" class="form-select">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Aktif" {{ $student->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Alumni" {{ $student->status == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Pendaftaran </label>
                                            <input type="date" name="registered_date" class="form-control" required
                                                value="{{ old('registered_date', $student->registered_date) }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tau Darimana </label>
                                            <select name="where_know" class="form-select" required>
                                                <option value="">-- Pilih Info --</option>
                                                <option value="1" {{ $student->where_know == 1 ? 'selected' : '' }}>Teman/Keluarga</option>
                                                <option value="2" {{ $student->where_know == 2 ? 'selected' : '' }}>Website AHA</option>
                                                <option value="3" {{ $student->where_know == 3 ? 'selected' : '' }}>Instagram</option>
                                                <option value="4" {{ $student->where_know == 4 ? 'selected' : '' }}>Tiktok</option>
                                                <option value="5" {{ $student->where_know == 5 ? 'selected' : '' }}>Facebook</option>
                                                <option value="6" {{ $student->where_know == 6 ? 'selected' : '' }}>Youtube</option>
                                                <option value="7" {{ $student->where_know == 7 ? 'selected' : '' }}>Whatsapp</option>
                                                <option value="8" {{ $student->where_know == 8 ? 'selected' : '' }}>Banner</option>
                                                <option value="9" {{ $student->where_know == 9 ? 'selected' : '' }}>Kantor AHA</option>
                                            </select>
                                        </div>
                                    </div>

                                <button type="submit" class="btn btn-primary text-white mt-4">Update</button>
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
    $(document).ready(function () {
        const $licenseSelect = $('select[name="license_id"]');
        const $nisInput = $('input[name="nis"]');

        // Inisialisasi select2 jika belum
        if (!$licenseSelect.hasClass("select2-hidden-accessible")) {
            $licenseSelect.select2();
        }

        function generateNis(licenseId) {
            console.log("Mengambil NIS untuk licenseId:", licenseId); // Debug
            $.ajax({
                url: `/students/generate-nis/${licenseId}`,
                type: 'GET',
                success: function (response) {
                    console.log("Response NIS:", response); // Debug
                    if (response.nis) {
                        $nisInput.val(response.nis);
                    } else {
                        $nisInput.val('');
                    }
                },
                error: function (xhr) {
                    console.error("Gagal mengambil NIS:", xhr.status);
                    $nisInput.val('');
                }
            });
        }

        // Saat user mengganti lisensi → generate ulang nis
        $licenseSelect.on('change', function () {
            const selected = $(this).val();
            if (selected) {
                generateNis(selected);
            } else {
                $nisInput.val('');
            }
        });

        // Optional: Trigger generate otomatis saat halaman edit dibuka
        // const initialSelected = $licenseSelect.val();
        // if (initialSelected) {
        //     generateNis(initialSelected);
        // }
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