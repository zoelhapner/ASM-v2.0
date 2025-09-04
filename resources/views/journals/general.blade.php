@extends('tablar::page')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Jurnal Umum</h2>
        
            <a href="{{ route('general.export', [
                    'start_date' => request('start_date'),
                    'end_date' => request('end_date'),
                    'license_id' => request('license_id')
                ]) }}" 
                class="btn btn-danger" target="_blank">
                <i class="ti ti-file-export"></i> Ekspor
            </a>
        
    </div>

    {{-- Filter --}}
    <form method="GET" action="{{ route('journals.general') }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <label class="form-label">Dari</label>
            <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
        </div>
        <div class="col-md-3">
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

        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary text-white">Filter</button>
        </div>
    </form>

    {{-- Tabel --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
        <tr>
            <th class="tanggal-column">Tanggal</th>
            <th class="kode-column">No Jurnal</th>
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
                                        {{ \Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y') }}
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
                                <td>Rp {{ number_format($detail->debit, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($detail->credit, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>


            <tfoot class="fw-bold">
                <tr>
                    <td colspan="5">Total</td>
                    <td class="text-end">Rp {{ number_format($totalDebit, 2, ',', '.') }}</td>
                    <td class="text-end">Rp {{ number_format($totalCredit, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="text-end text-muted small mt-3">
        <a href="{{ route('journals.export.pdf', [
                    'start_date' => request('start_date'),
                    'end_date' => request('end_date'),
                    'license_id' => request('license_id')
                ]) }}" 
                class="btn btn-danger" target="_blank">
                <i class="ti ti-printer"></i> Cetak
        </a>
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