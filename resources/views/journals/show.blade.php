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
            <label class="form-label fw-bold">No. Transaksi</label>
            <div>{{ $journal->journal_code }}</div>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-bold">Tanggal Transaksi</label>
            <div>{{ \Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y') }}</div>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-bold">Lisensi</label>
            <div>{{ $journal->license->name ?? '-' }}</div>
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
                    <th>Debit</th>
                    <th>Kredit</th>
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
                    <td colspan="4">Total</td>
                    <td class="text-end">Rp. {{ number_format($totalDebit, 2, ',', '.') }}</td>
                    <td class="text-end">Rp. {{ number_format($totalCredit, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label fw-bold">Keterangan</label>
        <div>{{ $journal->description}}</div>
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

