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
                        Pendidikan
                    </h2>
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
                            <p class="text-center mb-4">
                                Edit Data Penddikan
                            </p>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('employee_educations.update', $education->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                                    <div class="mb-3">
                                        <label class="form-label">Nama Pemilik Lisensi</label>
                                        <input type="text" class="form-control" value="{{ $employee->fullname }}" disabled>
                                    </div>

                                <div class="mb-3">
                                        <label for="education_level" class="form-label">Jenjang Pendidikan </label>
                                        <select name="education_level" class="form-select" required>
                                            <option value="">-- Pilih Jenjang --</option>
                                            <option value="SD" {{ $education->education_level == 'SD' ? 'selected' : '' }}>SD</option>
                                            <option value="SMP" {{ $education->education_level == 'SMP' ? 'selected' : '' }}>SMP</option>
                                            <option value="SMA" {{ $education->education_level == 'SMA' ? 'selected' : '' }}>SMA</option>
                                            <option value="D3" {{ $education->education_level == 'D3' ? 'selected' : '' }}>D3</option>
                                            <option value="S1" {{ $education->education_level == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ $education->education_level == 'S2' ? 'selected' : '' }}>S2</option>
                                            <option value="S3" {{ $education->education_level == 'S3' ? 'selected' : '' }}>S3</option>
                                        </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Sekolah</label>
                                    <input type="text" name="institution_name" class="form-control" value="{{ old('institution_name', $education->institution_name) }}" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tahun Masuk</label>
                                        <input type="number" name="start_year" class="form-control" value="{{ old('start_year', $education->start_year) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tahun Lulus</label>
                                        <input type="number" name="end_year" class="form-control" value="{{ old('end_year', $education->end_year) }}">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="is_graduated" class="form-select">
                                        <option value="1" {{ $education->is_graduated ? 'selected' : '' }}>Lulus</option>
                                        <option value="0" {{ !$education->is_graduated ? 'selected' : '' }}>Belum Lulus</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-secondary text-white">Batal</a>
                                    <button type="submit" class="btn btn-success text-white">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection