@extends('tablar::page')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Riwayat Pekerjaan</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('license_holder_workers.store') }}" method="POST">
                            @csrf

                            {{-- Hidden ID --}}
                            <input type="hidden" name="license_holder_id" value="{{ $license_holder->id }}">

                            {{-- Informasi Pemilik --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Pemilik Lisensi</label>
                                <input type="text" class="form-control" value="{{ $license_holder->fullname }}" disabled>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_name" class="form-label">Nama Lembaga / Perusahaan <code>*</code></label>
                                    <input type="text" name="company_name" class="form-control" required>
                                </div>

                                
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">Kota <code>*</code></label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                            </div>

                            {{-- Tahun Masuk & Lulus --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telepon Kantor <code>*</code></label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="position" class="form-label">Posisi</label>
                                    <input type="text" name="position" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="employment_type" class="form-label">Status Karywan <code>*</code></label>
                                    <select name="employment_type" class="form-select" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1">Penuh Waktu</option>
                                        <option value="2">Sampingan</option>
                                        <option value="3">Magang</option>
                                        <option value="4">Pekerja Lepas</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                <label for="is_current" class="form-label">Masih Bekerja? <code>*</code></label>
                                <select name="is_current" class="form-select" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Masih Bkerja</option>
                                    <option value="0">Sudah Keluar</option>
                                </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Tanggal Mulai Kerja *</label>
                                    <input type="date" name="start_date" class="form-control" required
                                        value="{{ old('start_date') }}"
                                        pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Tanggal Berakhir Kerja</label>
                                    <input type="date" name="end_date" class="form-control"
                                        value="{{ old('end_date') }}"
                                        pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="skills_used" class="form-label">Kompetensi Utama</label>
                                    <input type="text" name="skills_used" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="job_description" class="form-label">Deskripsi Tanggungjawab</label>
                                    <input type="text" name="job_description" class="form-control">
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
