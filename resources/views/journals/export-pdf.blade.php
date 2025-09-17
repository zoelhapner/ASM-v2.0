<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Jurnal Umum</title>
    <style>
        body { font-family: Poppins, sans-serif; font-size: 11px; }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* wajib kalau mau fixed column */
        }

        table th, table td {
            border: 1px solid #444;
            padding: 6px;
            font-size: 10px;
            text-align: left;
            white-space: normal !important;      /* biar teks panjang turun ke bawah */
            word-break: break-word !important;    /* pecah kata panjang */
            overflow: visible !important;        /* cegah teks ketimpa / hilang */
            vertical-align: top;      /* teks nempel ke atas kalau rowspan */
        }

        table th { background-color: #f5f5f5; }

        h3, p {
            text-align: center;
            margin-bottom: 10px;
            font-size: 12px;
        }

        /* General Journal */
        table th:nth-child(1),
        table td:nth-child(1) { width: 90px; }   /* Tanggal */

        table th:nth-child(2),
        table td:nth-child(2) { width: 90px; }   /* No Jurnal */

        table th:nth-child(3),
        table td:nth-child(3) { width: 180px; }  /* Deskripsi */

        table th:nth-child(4),
        table td:nth-child(4) { width: 70px; }   /* No. Akun */

        table th:nth-child(5),
        table td:nth-child(5) { width: 160px; }  /* Nama Akun */

        table th:nth-child(6),
        table td:nth-child(6) { width: 90px; text-align: right; } /* Debit */

        table th:nth-child(7),
        table td:nth-child(7) { width: 90px; text-align: right; } /* Kredit */


    </style>
</head>
<body>
    <h3>Laporan Jurnal Umum</h3>
    <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>No Jurnal</th>
                <th>Deskripsi</th>
                <th>No. Akun</th>
                <th>Nama Akun</th>
                <th>Debit</th>
                <th>Kredit</th>
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
                        <td>Rp {{ number_format($detail->debit, 2, ',', '.') }}</td>
                        <td>Rp {{ number_format($detail->credit, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"><strong>Total</strong></td>
                <td><strong>Rp {{ number_format($totalDebit, 2, ',', '.') }}</strong></td>
                <td><strong>Rp {{ number_format($totalCredit, 2, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
