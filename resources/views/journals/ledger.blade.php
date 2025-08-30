@extends('tablar::page')

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
@endsection
