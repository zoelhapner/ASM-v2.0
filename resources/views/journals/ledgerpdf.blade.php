<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Buku Besar</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            font-size: 11px;
        }
        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #444;
            padding: 6px;
            text-align: left,
        }
        table th {
            background-color: #f5f5f5;
        }
        table td.text-left {
            text-align: left;
        }
        h3, p {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2 style="text-align:center;">CV AHA Right Brain</h2>
        <h4 style="text-align:center;">Buku Besar Lisensi {{ $licenseName }}</h4>
        <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>
    </div>

    @foreach($ledger as $accountId => $data)
        <h4>{{ $data['account']->account_code }} - {{ $data['account']->account_name }}</h4>
        <table>
            <thead>
                <tr>
                    <th width="15%">Tanggal</th>
                    <th width="15%">Transaksi</th>
                    <th width="20%">Deskripsi</th>
                    <th class="text-end" width="10%">Debit</th>
                    <th class="text-end" width="10%">Kredit</th>
                    <th class="text-end" width="10%">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @php $lastJournal = null; @endphp
                @foreach($data['rows'] as $row)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($row['transaction_date'])->format('d/m/Y') }}</td>
                        <td>
                            @if($lastJournal !== $row['journal_code'])
                                ({{ $row['journal_code'] }})
                                @php $lastJournal = $row['journal_code']; @endphp
                            @endif
                        </td>
                        <td>{{ $row['description'] }}</td>
                        <td align="right">Rp {{ number_format($row['debit'], 2, ',', '.') }}</td>
                        <td align="right">Rp {{ number_format($row['credit'], 2, ',', '.') }}</td>
                        <td align="right">Rp {{ number_format($row['balance'], 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    @endforeach
</body>
</html>

