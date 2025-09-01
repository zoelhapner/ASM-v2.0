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
        

        @if(auth()->user()->hasRole('Super-Admin'))
            <div class="col-md-4 mb-3">
                <label for="license_id" class="form-label required">Filter Lisensi</label>
                <select name="license_id" id="license_id" class="form-select select2" required>
                    <option value="">-- Pilih Lisensi --</option>
                    @foreach ($licenses as $license)
                        <option value="{{ $license->id }}" 
                            {{ $activeLicenseId == $license->id ? 'selected' : '' }}>
                            {{ $license->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @else
            {{-- Kalau bukan Super Admin, tetap pakai hidden --}}
            <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
        @endif

        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-primary text-white">Filter</button>
        </div>
    </form>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
            <th>Tanggal</th>
            <th>No Jurnal</th>
            <th>Deskripsi</th>
            <th>No. Akun</th>
            <th>Nama Akun</th>
            <th class="text-end">Debit</th>
            <th clas="text-end">Kredit</th>
        </tr>
            </thead>
                <tbody>
                    @foreach ($journals as $journal)
                        @php
                            $rowCount = $journal->details->count();
                        @endphp
                        @foreach ($journal->details as $i=>$detail)
                            <tr>
                                @if($i == 0)
                                    {{-- Merge kolom tanggal --}}
                                    <td rowspan="{{ $rowCount }}">
                                        {{ \Carbon\Carbon::parse($journal->transaction_date)->format('d-m-Y') }}
                                    </td>
                                    {{-- Merge kolom kode jurnal --}}
                                    <td rowspan="{{ $rowCount }}">
                                        <a href="{{ route('journals.show', $journal->id) }}" 
                                            class="text-decoration-none fw-bold text-primary">
                                            {{ $journal->journal_code }}
                                        </a>
                                    </td>
                                @endif
                                <td>{{ $detail->description }}</td>
                                <td>{{ $detail->account->account_code }}</td>
                                <td>{{ $detail->account->account_name }}</td>
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

    
</div>
@endsection

@push('js')
<script>
 $('.select2').select2({
            placeholder: "-- Pilih --",
            width: '100%'
        });
</script>
@endpush

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