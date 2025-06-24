@extends('tablar::page')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Keluarga</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('license_holder_families.store') }}" method="POST">
                            @csrf

                            {{-- Hidden ID --}}
                            <input type="hidden" name="license_holder_id" value="{{ $license_holder->id }}">

                            {{-- Informasi Pemilik --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Pemilik Lisensi</label>
                                <input type="text" class="form-control" value="{{ $license_holder->name }}" disabled>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama <code>*</code></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="relationship" class="form-label">Hubungan dengan Pemilik <code>*</code></label>
                                    <select name="relationship" class="form-select" required>
                                        <option value="">-- Pilih Hubungan --</option>
                                        <option value="1">Suami</option>
                                        <option value="2">Istri</option>
                                        <option value="3">Anak</option>
                                        <option value="4">Orang Tua</option>
                                        <option value="5">Famili Lain</option>
                                    </select>
                                </div>


                            </div>

                            {{-- Tahun Masuk & Lulus --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin <code>*</code></label>
                                    <select name="gender" class="form-select" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="1">Laki - Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="birth_date" class="form-control"
                                        value="{{ old('birth_date') }}"
                                        pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                </div>
                              
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="job" class="form-label">Pekerjaan <code>*</code></label>
                                    <input type="text" name="job" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="job_phone" class="form-label">Telepon Kantor <code>*</code></label>
                                    <input type="number" name="job_phone" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="last_education_level" class="form-label">Pendidikan Terakhir <code>*</code></label>
                                    <select name="last_education_level" class="form-select" required>
                                        <option value="">-- Pilih Jenjang --</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="institution_name" class="form-label">Nama Sekolah / Universitas <code>*</code></label>
                                    <input type="text" name="institution_name" class="form-control" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('license_holders.show', $license_holder->id) }}" class="btn btn-secondary">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan Pekerjaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
