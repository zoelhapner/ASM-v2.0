<h2 style="text-align:center;">Buku Besar CV AHA Right Brain</h2>
<h4 style="text-align:center;">Entri Jurnal Umum Lisensi {{ $licenseName }}</h4>
<p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>

@foreach($ledger as $accountId => $data)
    <h4>{{ $data['account']->account_code }} - {{ $data['account']->account_name }}</h4>
    <table width="100%" border="1" cellspacing="0" cellpadding="4">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Transaksi</th>
                <th>Deskripsi</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @php $lastJournal = null; @endphp
            @foreach($data['rows'] as $row)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($row['transaction_date'])->format('d/m/Y') }}</td>
                    <td>
                        @if($lastJournal !== $row['journal_code'])
                            Jurnal Entry ({{ $row['journal_code'] }})
                            @php $lastJournal = $row['journal_code']; @endphp
                        @endif
                    </td>
                    <td>{{ $row['description'] }}</td>
                    <td align="right">{{ number_format($row['debit'], 2, ',', '.') }}</td>
                    <td align="right">{{ number_format($row['credit'], 2, ',', '.') }}</td>
                    <td align="right">{{ number_format($row['balance'], 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
@endforeach
