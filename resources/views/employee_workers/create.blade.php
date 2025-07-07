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
                        <form action="{{ route('employee_workers.store') }}" method="POST">
                            @csrf

                            {{-- Hidden ID --}}
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                            {{-- Informasi Pemilik --}}
                            <div class="mb-3">
                                <label class="form-label">Nama Karyawan</label>
                                <input type="text" class="form-control" value="{{ $employee->fullname }}" disabled>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="company_name" class="form-label">Nama Lembaga / Perusahaan <code>*</code></label>
                                    <input type="text" name="company_name" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="last_position" class="form-label">Jabatan Terakhir</label>
                                    <input type="text" name="last_position" class="form-control">
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
                                    <label for="last_salary" class="form-label">Gaji Terakhir</label>
                                    <input type="text" name="last_salary" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="reason_for_leaving" class="form-label">Alasan Keluar</label>
                                    <input type="text" name="reason_for_leaving" class="form-control">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-secondary">
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
