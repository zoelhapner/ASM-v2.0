@extends('tablar::page')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Jurnal</h2>
        <button class="btn btn-danger">
            <i class="bi bi-file-earmark-arrow-down"></i> Export
        </button>
    </div>

    {{-- Filter --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <label class="form-label">No. Transaksi</label>
            <input type="text" class="form-control" placeholder="Cari...">
        </div>
        <div class="col-md-3">
            <label class="form-label">Tanggal</label>
            <input type="date" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Lisensi</label>
            <select class="form-select">
                <option value="">Pilih Lisensi</option>
                @foreach($licenses as $license)
                    <option value="{{ $license->id }}">{{ $license->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No. Akun</th>
                    <th>Nama Akun</th>
                    <th>Deskripsi</th>
                    <th>User</th>
                    <th class="text-end">Debit</th>
                    <th class="text-end">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalDebit = 0;
                    $totalCredit = 0;
                @endphp
                @foreach($journal->details as $detail)
                    @php
                        $totalDebit += $detail->debit;
                        $totalCredit += $detail->credit;
                    @endphp
                    <tr>
                        <td>{{ $detail->account->account_code ?? '-' }}</td>
                        <td>{{ $detail->account->account_name ?? '-' }}</td>
                        <td>{{ $detail->description ?? '-' }}</td>
                        <td>{{ $detail->person_name ?? '-' }}</td>
                        <td class="text-end">Rp. {{ number_format($detail->debit, 2, ',', '.') }}</td>
                        <td class="text-end">Rp. {{ number_format($detail->credit, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="fw-bold">
                <tr>
                    <td colspan="4" class="text-end">Total Debit</td>
                    <td class="text-end">Rp. {{ number_format($totalDebit, 2, ',', '.') }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-end">Total Kredit</td>
                    <td></td>
                    <td class="text-end">Rp. {{ number_format($totalCredit, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- Tombol --}}
    <div class="d-flex justify-content-start gap-2 mt-3">
        <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-danger">
            <i class="bi bi-pencil"></i> Ubah
        </a>
        <button class="btn btn-danger">
            <i class="bi bi-printer"></i> Cetak
        </button>
    </div>

    {{-- Footer --}}
    <div class="text-end text-muted small mt-3">
        Terakhir diubah oleh <strong>{{ $journal->creator->name ?? 'Sistem' }}</strong> 
        pada {{ \Carbon\Carbon::parse($journal->updated_at)->translatedFormat('d F Y H:i') }} GMT+7
    </div>
</div>
@endsection

