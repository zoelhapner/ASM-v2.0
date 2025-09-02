{{-- @extends('tablar::page')

@section('content')
<div class="container">
    <h2>Buku Besar</h2>
    <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>

    @foreach($ledger as $data)
    <h3>{{ $data['account']->code }} - {{ $data['account']->name }}</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['transactions'] as $trx)
                <tr>
                    <td>{{ $trx['transaction_date'] }}</td>
                    <td>{{ $trx['description'] }}</td>
                    <td>{{ number_format($trx['debit'],0,',','.') }}</td>
                    <td>{{ number_format($trx['credit'],0,',','.') }}</td>
                    <td>{{ number_format($trx['balance'],0,',','.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2"><b>Total</b></td>
                <td><b>{{ number_format($data['total_debit'],0,',','.') }}</b></td>
                <td><b>{{ number_format($data['total_credit'],0,',','.') }}</b></td>
                <td><b>{{ number_format($data['balance'],0,',','.') }}</b></td>
            </tr>
        </tbody>
    </table>
    <br>
@endforeach
</div>
@endsection --}}


@extends('tablar::page')

@section('content')
<div class="container-fluid-mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Buku Besar</h2>
            <button>
                <a href="{{ route('ledgerpdf', request()->query()) }}" 
                    target="_blank" 
                    class="btn btn-danger">
                    <i class="ti ti-file-earmark-arrow-down"></i> Export PDF
                    </a>
            </button>
    </div>
    
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('journals.ledger') }}" class="row g-3 mb-4">
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Dari Tanggal</label>
                    <input type="date" name="start_date" id="start_date" 
                        class="form-control" value="{{ $startDate }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label">Sampai Tanggal</label>
                    <input type="date" name="end_date" id="end_date" 
                        class="form-control" value="{{ $endDate }}">
                </div>
                @if(auth()->user()->hasRole('Super-Admin'))
                    <div class="col-md-3">
                        <label for="license_id" class="form-label">Lisensi</label>
                        <select name="license_id" id="license_id" class="form-select select2">
                            <option value="">-- Semua Lisensi --</option>
                            @foreach ($licenses as $license)
                                <option value="{{ $license->id }}" 
                                    {{ $activeLicenseId == $license->id ? 'selected' : '' }}>
                                    {{ $license->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
                @endif

                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary text-white">Filter</button>
                </div>
            </form>
        </div>
    </div>


    @foreach($ledger as $accountId => $data)
        <div class="card mt-4">
            <div class="card-header">
                <strong>{{ $data['account']->account_code }} - {{ $data['account']->account_name }}</strong>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Transaksi</th>
                            <th>Deskripsi</th>
                            <th class="text-end">Debit</th>
                            <th class="text-end">Kredit</th>
                            <th class="text-end">Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $lastJournal = null;
                        @endphp
                        
                        @foreach($data['rows'] as $row)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($row['transaction_date'])->format('d/m/Y') }}</td>
                            <td>
                                @if($lastJournal !== $row['journal_code'])
                                    Jurnal Entry
                                    <a href="{{ route('journals.show', $row['journal_id']) }}" 
                                       class="text-decoration-none fw-bold text-primary">
                                        {{ $row['journal_code'] }}
                                    </a>
                                    @php $lastJournal = $row['journal_code']; @endphp
                                @endif
                            </td>
                            <td>{{ $row['description'] }}</td>
                            <td class="text-end">{{ number_format($row['debit'], 2, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($row['credit'], 2, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($row['balance'], 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
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
