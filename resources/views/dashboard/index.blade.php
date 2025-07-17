@extends('tablar::page')

@section('content')
<div class="container">
    {{-- Header --}}
    <div class="bg-primary text-white p-4 rounded mb-4">
        <h2 class="mb-1">Selamat Datang, {{ auth()->user()->name ?? 'Admin Utama' }}</h2>
        <p class="mb-0">Kelola seluruh cabang lembaga kursus Anda dengan mudah</p>
        <small class="d-block mt-2">Terakhir login: Hari ini, {{ now()->format('H:i') }}</small>
    </div>

    {{-- Info Box --}}
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-building" style="font-size: 1.5rem;"></i>
                    </div>
                    <h6 class="card-title">Total Lisensi</h6>
                    <h3 class="card-text">{{ $licensesCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-people-fill" style="font-size: 1.5rem;"></i>
                    </div>
                    <h6 class="card-title">Total Siswa</h6>
                    <h3 class="card-text">{{ number_format($studentsCount) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-person-badge" style="font-size: 1.5rem;"></i>
                    </div>
                    <h6 class="card-title">Total Karyawan</h6>
                    <h3 class="card-text">{{ $employeesCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="bi bi-currency-dollar" style="font-size: 1.5rem;"></i>
                    </div>
                    <h6 class="card-title">Pendapatan Bulan Ini</h6>
                    <h3 class="card-text">{{ $monthlyRevenue }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Performa --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3"><i class="bi bi-trophy-fill"></i> Performa Cabang Terbaik</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Cabang</th>
                            <th>Siswa</th>
                            <th>Pendapatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                        <tr>
                            <td>
                                <strong>{{ $branch->name }}</strong><br>
                                <small class="text-muted">Pemilik: {{ $branch->owner_name }}</small>
                            </td>
                            <td>{{ $branch->students }}</td>
                            <td>{{ $branch->revenue }}</td>
                            <td>
                                <span class="badge bg-success">{{ $branch->status }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Aksi Cepat --}}
    <div class="row g-3">
        <div class="col-md-3">
            <a href="{{ route('licenses.create') }}" class="btn btn-primary w-100">
                <i class="bi bi-plus-circle"></i> Tambah Cabang
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('students.create') }}" class="btn btn-success w-100">
                <i class="bi bi-person-plus-fill"></i> Daftarkan Siswa
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('accounting.index') }}" class="btn btn-warning w-100">
                <i class="bi bi-file-earmark-text"></i> Akuntasi
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('license_holders.index') }}" class="btn btn-secondary w-100">
                <i class="bi bi-people-fill"></i> List Pemilik Lisensi
            </a>
        </div>
    </div>
</div>
@endsection
