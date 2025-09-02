<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Jurnal Umum</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .title { text-align: center; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h3 class="title">Laporan Jurnal Umum</h3>
    <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>No Jurnal</th>
                <th>Deskripsi</th>
                <th>No. Akun</th>
                <th>Nama Akun</th>
                <th class="text-right">Debit</th>
                <th class="text-right">Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($journals as $journal)
                @foreach ($journal->details as $i => $detail)
                    <tr>
                        @if($i == 0)
                            <td rowspan="{{ $journal->details->count() }}">
                                {{ \Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y') }}
                            </td>
                            <td rowspan="{{ $journal->details->count() }}">
                                {{ $journal->journal_code }}
                            </td>
                        @endif
                        <td>{{ $detail->description }}</td>
                        <td>{{ $detail->account->account_code }}</td>
                        <td>{{ $detail->account->account_name }}</td>
                        <td class="text-right">{{ number_format($detail->debit, 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($detail->credit, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"><strong>Total</strong></td>
                <td class="text-right"><strong>Rp {{ number_format($totalDebit, 2, ',', '.') }}</strong></td>
                <td class="text-right"><strong>Rp {{ number_format($totalCredit, 2, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
