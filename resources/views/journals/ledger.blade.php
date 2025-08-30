@extends('tablar::page')

@section('content')
<div class="container">
    <h2>Buku Besar</h2>
    <p>Periode: {{ $start }} s/d {{ $end }}</p>

    @foreach($accounts as $account)
        @if($account->journalDetails->isNotEmpty())
            <h4>{{ $account->code }} - {{ $account->name }}</h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No. Transaksi</th>
                        <th>Keterangan</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    @php $saldo = 0; @endphp
                    @foreach($account->journalDetails as $detail)
                        @php
                            $saldo += $detail->debit - $detail->credit;
                        @endphp
                        <tr>
                            <td>{{ $detail->journal->transaction_date }}</td>
                            <td>{{ $detail->journal->transaction_number }}</td>
                            <td>{{ $detail->journal->description }}</td>
                            <td>{{ number_format($detail->debit,0,',','.') }}</td>
                            <td>{{ number_format($detail->credit,0,',','.') }}</td>
                            <td>{{ number_format($saldo,0,',','.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</div>
@endsection
