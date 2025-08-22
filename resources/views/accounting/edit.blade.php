@extends('tablar::page')

@section('title', 'Edit Akun')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Akun</h1>

    <form action="{{ route('accounting.update', $account->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
                @include('components.select-license', [
                    'licenses' => $licenses,
                    'selectedLicenseId' => $account->license_id
                ])
        </div>

        <div class="mb-3">
            <label>Kode Akun</label>
            <input type="text" name="account_code" value="{{ $account->account_code }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Akun</label>
            <input type="text" name="account_name" value="{{ $account->account_name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="category" value="{{ $account->account_type }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Sub kategori</label>
            <select name="sub_category" class="form-select" required>
                <option value="">-- Pilih Sub kategori --</option>
                <option value="Kas & Bank" {{ $account->sub_category == "Kas & Bank" ? 'selected' : '' }}>Kas & Bank</option>
                <option value="Persediaan Barang" {{ $account->sub_category == "Persediaan Barang" ? 'selected' : '' }}>Persediaan Barang</option>
                <option value="Piutang" {{ $account->sub_category == "Piutang" ? 'selected' : '' }}>Piutang</option>
                <option value="Dana Belum Disetor" {{ $account->sub_category == "Dana Belum Disetor" ? 'selected' : '' }}>Dana Belum Disetor</option>
                <option value="Pajak Bayar Dimuka" {{ $account->sub_category == "Pajak Bayar Dimuka" ? 'selected' : '' }}>Pajak Bayar Dimuka</option>
                <option value="Aset Tetap" {{ $account->sub_category == "Aset Tetap" ? 'selected' : '' }}>Aset Tetap</option>
                <option value="Penyusutan" {{ $account->sub_category == "Penyusutan" ? 'selected' : '' }}>Penyusutan</option>
                <option value="Hutang" {{ $account->sub_category == "Hutang" ? 'selected' : '' }}>Hutang</option>
                <option value="Uang Muka Penjualan" {{ $account->sub_category == "Uang Muka Penjualan" ? 'selected' : '' }}>Uang Muka Penjualan</option>
                <option value="Pajak" {{ $account->sub_category == "Pajak" ? 'selected' : '' }}>Pajak</option>
                <option value="Modal" {{ $account->sub_category == "Modal" ? 'selected' : '' }}>Modal</option>
                <option value="Pendapatan Lisensi" {{ $account->sub_category == "Pendapatan Lisensi" ? 'selected' : '' }}>Pendapatan Lisensi</option>
                <option value="Pendapatan Modul" {{ $account->sub_category == "Pendapatan Modul" ? 'selected' : '' }}>Pendapatan Modul</option>
                <option value="Pendapatan Siswa" {{ $account->sub_category == "Pendapatan Siswa" ? 'selected' : '' }}>Pendapatan Siswa</option>
                <option value="Pendapatan Merchandise" {{ $account->sub_category == "Pendapatan Merchandise" ? 'selected' : '' }}>Pendapatan Merchandise</option>
                <option value="Pendapatan Lainnya" {{ $account->sub_category == "Pendapatan Lainnya" ? 'selected' : '' }}>Pendapatan Lainnya</option>
                <option value="Biaya Lisensi" {{ $account->sub_category == "Biaya Lisensi" ? 'selected' : '' }}>Biaya Lisensi</option>
                <option value="Biaya Pembelian Modul" {{ $account->sub_category == "Biaya Pembelian Modul" ? 'selected' : '' }}>Biaya Pembelian Modul</option>
                <option value="Biaya Pembelian Merchandise" {{ $account->sub_category == "Biaya Pembelian Merchandise" ? 'selected' : '' }}>Biaya Pembelian Merchandise</option>
                <option value="Biaya Produksi Modul" {{ $account->sub_category == "Biaya Produksi Modul" ? 'selected' : '' }}>Biaya Produksi Modul</option>
                <option value="Biaya Produksi Merchandise" {{ $account->sub_category == "Biaya Produksi Merchandise" ? 'selected' : '' }}>Biaya Produksi Merchandise</option>
                <option value="Beban Penjualan & Pemasaran" {{ $account->sub_category == "Beban Penjualan & Pemasaran" ? 'selected' : '' }}>Beban Penjualan & Pemasaran</option>
                <option value="Beban Administrasi & Umum" {{ $account->sub_category == "Beban Administrasi & Umum" ? 'selected' : '' }}>Beban Administrasi & Umum</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Saldo Awal</label>
            <input type="number" step="0.01" name="initial_balance" value="{{ $account->initial_balance }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Apakah Akun Induk?</label>
            <input type="checkbox" name="is_parent" value="1" {{ $account->is_parent ? 'checked' : '' }}>
        </div>

        <div class="mb-3">
            <label>Akun Induk</label>
            <select name="parent_id" class="form-control">
                <option value="">-- Tidak Ada --</option>
                @foreach ($parentAccounts as $parent)
                    <option value="{{ $parent->id }}" @if($account->parent_id == $parent->id) selected @endif>
                        {{ $parent->account_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-end">
            <button class="btn btn-primary text-white">Update</button>
        </div>
    </form>
</div>
@endsection
