@extends('tablar::page')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Riwayat Pendidikan</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('employee_educations.store') }}" method="POST">
                            @csrf

                            {{-- Hidden ID --}}
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                            {{-- Informasi Pemilik --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Pemilik Lisensi</label>
                                <input type="text" class="form-control" value="{{ $employee->fullname }}" disabled>
                            </div>

                            {{-- Jenjang Pendidikan --}}
                            <div class="mb-3">
                                <label for="education_level" class="form-label">Jenjang Pendidikan <code>*</code></label>
                                <select name="education_level" class="form-select" required>
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

                            {{-- Nama Institusi --}}
                            <div class="mb-3">
                                <label for="institution_name" class="form-label">Nama Sekolah / Universitas <code>*</code></label>
                                <input type="text" name="institution_name" class="form-control" required>
                            </div>

                            {{-- Tahun Masuk & Lulus --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_year" class="form-label">Tahun Masuk <code>*</code></label>
                                    <input type="number" name="start_year" class="form-control" placeholder="Contoh: 2015" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="end_year" class="form-label">Tahun Lulus</label>
                                    <input type="number" name="end_year" class="form-control" placeholder="Contoh: 2019">
                                </div>
                            </div>

                            {{-- Lulus? --}}
                            <div class="mb-3">
                                <label for="is_graduated" class="form-label">Status Kelulusan</label>
                                <select name="is_graduated" class="form-select">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Lulus</option>
                                    <option value="0">Belum Lulus</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-secondary">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Simpan Pendidikan
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
