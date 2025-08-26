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
                       Karyawan
                    </p>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                 
                        <a href=" {{ route("employees.index") }} " class="btn btn-primary text-white d-none d-sm-inline-block" >
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
                                            Tambah Data Karyawan
                                        </p>
                                    </div>

                            <div class="card-body">
                                <form class="font-normal" style="font-weight: 400; font-family: 'Poppins', sans-serif;" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif


                                    {{-- SECTION 1: Informasi Lead --}}
                                    <h2 class="mt-4 mb-3">Data Karyawan</h2>
                                    <div class="row mb-4">

                                         <div class="col-md-6 mb-3">
                                            <label class="required">Pilih Lisensi</label>
                                            <select name="licenses[]" class="form-select select2" multiple required>
                                                @forelse($licenses as $license)
                                                    <option value="{{ $license->id }}">{{ $license->name }}</option>
                                                @empty
                                                    <option value="">Tidak ada lisensi tersedia</option>
                                                @endforelse
                                            </select>
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label class="required">NIK</label>
                                            <input type="text" name="nik" class="form-control" required readonly>
                                            <small class="text-muted">NIK akan terisi otomatis setelah memilih lisensi</small>
                                        </div>


                                         <div class="col-md-6 mb-3">
                                            <label class="required">Nama Lengkap</label>
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
                                            <label class="required" for="email">Email:</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Nomor KTP</label>
                                            <input type="number" class="form-control @error('identity_number') is-invalid @enderror" id="identity_number" name="identity_number" maxlength="16" value="{{ old('identity_number') }}" required>
                                            @error('identity_number')
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
                                            <label class="required">Jabatan </label>
                                            <select name="position[]" class="form-control select2" multiple required>
                                                <option value="Komisaris">Komisaris</option>
                                                <option value="Direktur">Direktur</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Supervisor">Supervisor</option>
                                                <option value="Staff">Staff</option>
                                            </select>
                                         </div>

                                          <div class="col-md-6 mb-3">
                                            <label class="required">Departemen </label>
                                            <select name="department[]" class="form-control select2" multiple required>                                            
                                                <option value="Networking">Networking</option>
                                                <option value="Produksi">Produksi</option>
                                                <option value="Keuangan">Keuangan</option>
                                                <option value="HR">HR</option>
                                                <option value="Marketing">Marketing</option>
                                            </select>
                                         </div>

                                          <div class="col-md-6 mb-3">
                                            <label class="required">Unit Kerja </label>
                                            <select id= "unit" name="unit[]" class="form-control select2" multiple required>
                                                <option value="Lisensi">Lisensi</option>
                                                <option value="Event">Event</option>
                                                <option value="Training">Training</option>
                                                <option value="Trainer Pusat">Trainer Pusat</option>
                                                <option value="Trainer WIlayah">Trainer Wilayah</option>
                                                <option value="Pengadaan">Pengadaan</option>
                                                <option value="Kursus">Kursus</option>
                                                <option value="Instruktur">Instruktur</option>
                                            </select>
                                         </div>

                                         <div class="col-md-6 mb-3">
                                            <label class="required" for="employment_status" >Status Karyawan</label>
                                            <select name="employment_status" class="form-select" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Tetap">Tetap</option>
                                                <option value="Kontrak">Kontrak</option>
                                                <option value="Harian">Harian</option>
                                                <option value="Honorer">Honorer</option>
                                            </select>
                                         </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="role">Role:</label>

                                            @if(auth()->user()->hasRole('Pemilik Lisensi'))
                                                {{-- Hidden input supaya tetap kirim value --}}
                                                <input type="hidden" name="role" value="Karyawan">

                                                {{-- Select ditampilkan tapi disabled --}}
                                                <select class="form-select" disabled>
                                                    <option value="Karyawan" selected>Karyawan</option>
                                                </select>
                                            @else
                                                {{-- Kalau bukan Pemilik Lisensi, bisa pilih bebas --}}
                                                <select name="role" class="form-select" required>
                                                    <option value="">-- Pilih Role --</option>
                                                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tanggal Mulai Kerja</label>
                                            <input type="date" name="start_date" class="form-control" required
                                                value="{{ old('start_date') }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="photo" class="form-label">Upload Foto Diri :</label>
                                            <input type="file" name="photo" class="form-control" accept="image/*">
                                            @error('photo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="identity_photo" class="form-label">Upload Foto KTP :</label>
                                            <input type="file" name="identity_photo" class="form-control" accept="image/*">
                                            @error('identity_photo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required" for="contract_letter_file" class="form-label">Upload Surat Perjanjian Kerja (PDF)</label>
                                            <input type="file" name="contract_letter_file" class="form-control" accept="application/pdf" required>
                                            @error('contract_letter_file')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div id="upload-sertifikat-container" style="display: none;" class="col-md-6 mb-3">
                                            <label for="instructure_certificate" class="form-label">Upload Sertifikat Instruktur (PDF)</label>
                                            <input type="file" name="instructure_certificate" class="form-control" accept="application/pdf">
                                            @error('instructure_certificate')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        
                                            <label for="expired_date_certificate" class="form-label mt-3">Tanggal Expired Sertifikat</label>
                                            <input type="date" name="expired_date_certificate" class="form-control"
                                                value="{{ old('expired_date_certificate') }}"
                                                pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                            @error('expired_date_certificate')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- SECTION 2: Data Kontak --}}
                                    <h2 class="mt-4 mb-3">Data Pernikahan</h2>
                                    <div class="row mb-4">
                                         <div class="col-md-6 mb-3">
                                            <label class="required">Status Pernikahan</label>
                                            <select name="marital_status" class="form-select" required>
                                                <option value="">-- Pilih Tipe --</option>
                                                <option value="1">Lajang</option>
                                                <option value="2">Menikah</option>
                                                <option value="3">Duda</option>
                                                <option value="4">Janda</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- SECTION 5: Sosial Media --}}
                                    <h2 class="mt-4 mb-3">Data Pekerjaan</h2>
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label class="required">Gaji Pokok</label>
                                            <input type="number" class="form-control @error('basic_salary') is-invalid @enderror" id="basic_salary" name="basic_salary" value="{{ old('basic_salary') }}" required>
                                            @error('basic_salary')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Tunjangan</label>
                                            <input type="number" class="form-control @error('allowance') is-invalid @enderror" id="allowance" name="allowance" value="{{ old('allowance') }}" required>
                                            @error('allowance')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Potongan</label>
                                            <input type="number" class="form-control @error('deduction') is-invalid @enderror" id="deduction" name="deduction" value="{{ old('deduction') }}" required>
                                            @error('deduction')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">Bonus</label>
                                            <input type="number" class="form-control @error('bonus') is-invalid @enderror" id="bonus" name="bonus" value="{{ old('bonus') }}" required>
                                            @error('bonus')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="required">THR *</label>
                                            <input type="number" class="form-control @error('thr') is-invalid @enderror" id="thr" name="thr" value="{{ old('thr') }}" required>
                                            @error('thr')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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

        // Inisialisasi Select2 (kalau belum)
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

        $licenses.on('change', function () {
            const selected = $(this).val();
            if (Array.isArray(selected) && selected.length > 0) {
                const licenseId = selected[0];
                generateNik(licenseId);
            } else {
                $nikInput.val('');
            }
        });

        // Trigger saat halaman dimuat (untuk form edit, jika perlu)
        if ($licenses.val()?.length > 0) {
            generateNik($licenses.val()[0]);
        }
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