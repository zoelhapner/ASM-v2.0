@extends('tablar::page')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Jurnal Umum</h2>
        <button class="btn btn-danger">
            <i class="bi bi-file-earmark-arrow-down"></i> Export
        </button>
    </div>

    {{-- Filter --}}
    <form method="GET" action="{{ route('journals.general') }}" class="row g-2 mb-3">
        <div class="col-auto">
            <label class="form-label">Dari</label>
            <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
        </div>
        <div class="col-auto">
            <label class="form-label">Sampai</label>
            <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">
        </div>
        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
            <th>Tanggal</th>
            <th>No Bukti</th>
            <th>Keterangan</th>
            <th>Akun</th>
            <th>Debit</th>
            <th>Kredit</th>
        </tr>
            </thead>
                <tbody>
                    @foreach ($journals as $journal)
                        @foreach ($journal->details as $detail)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y') }}</td>
                                <td>{{ $journal->journal_code ?? '-' }}</td>
                                <td>{{ $detail->description }}</td>
                                <td>{{ $detail->account->account_code }} - {{ $detail->account->account_name }}</td>
                                <td class="text-end">{{ number_format($detail->debit, 0, ',', '.') }}</td>
                                <td class="text-end">{{ number_format($detail->credit, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
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

    {{-- Tombol --}}
    {{-- <div class="d-flex justify-content-start gap-2 mt-3">
        <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-danger">
            <i class="bi bi-pencil"></i> Ubah
        </a>
        <button class="btn btn-danger">
            <i class="bi bi-printer"></i> Cetak
        </button>
    </div> --}}

    {{-- Footer --}}
    {{-- <div class="text-end text-muted small mt-3">
        Terakhir diubah oleh <strong>{{ $journal->creator->name ?? 'Sistem' }}</strong> 
        pada {{ \Carbon\Carbon::parse($journal->updated_at)->translatedFormat('d F Y H:i') }} GMT+7
    </div> --}}
</div>
@endsection