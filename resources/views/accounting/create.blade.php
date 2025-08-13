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
                       Akun Akuntansi
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                                    <div class="card-header">
                                        <p class="text-center mb-4">
                                            Tambah Akun Akuntansi
                                        </p>
                                    </div>

                            <div class="card-body">
                                <form action="{{ route('accounting.store') }}" method="POST">
                                    @csrf

                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                                @include('components.select-license', [
                                                    'licenses' => $licenses,
                                                    'selectedLicenseId' => old('license_id', $yourModel->license_id ?? null)
                                                ])
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Kode Akun</label>
                                            <input type="text" name="account_code" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>Nama Akun</label>
                                            <input type="text" name="account_name" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Jenis Akun</label>
                                            <input type="text" name="account_type" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>Debit/Kredit</label>
                                            <select name="balance_type" class="form-select" required>
                                                <option value="Debit">Debit</option>
                                                <option value="Kredit">Kredit</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Saldo Awal</label>
                                            <input type="number" step="0.01" name="initial_balance" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-3">
                                            <label>Apakah Akun Induk?</label>
                                            <input type="checkbox" name="is_parent" value="1">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Akun Induk</label>
                                            <select name="parent_id" class="form-select">
                                                <option value="">-- Tidak Ada --</option>
                                                @foreach ($parentAccounts as $parent)
                                                    <option value="{{ $parent->id }}">{{ $parent->account_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- <div class="container">
    <h1 class="mb-4">Tambah Akun</h1>

    
</div> --}}
@endsection
