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
<div class="container">
    <h4>Buku Besar ({{ $startDate }} s/d {{ $endDate }})</h4>

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
                            <th>Keterangan</th>
                            <th class="text-end">Debit</th>
                            <th class="text-end">Kredit</th>
                            <th class="text-end">Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['rows'] as $row)
                        <tr>
                            <td>{{ $row['date'] }}</td>
                            <td>{{ $row['description'] }}</td>
                            <td class="text-end">{{ number_format($row['debit'], 0, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($row['credit'], 0, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($row['balance'], 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
@endsection
