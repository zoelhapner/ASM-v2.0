<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Jurnal Umum</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #444;
            padding: 4px;
            font-size: 9px;
        }

        table th {
            background: #f2f2f2;
        }

        tfoot td {
            font-weight: bold;
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Laporan Jurnal umum</h2>

    <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>
    {{-- <p><strong>Lisensi:</strong> {{ auth()->user()->license->name ?? '-' }}</p> --}}

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
            @foreach($rows as $row)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($row->transaction_date)->format('d/m/Y') }}</td>
                    <td>{{ $row->journal_code }}</td>
                    <td>{{ $row->description ?? '-' }}</td>
                    <td>{{ $row->account_code ?? '-' }}</td>
                    <td>{{ $row->account_name ?? '-' }}</td>
                    <td>Rp {{ number_format($totalDebit, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($totalCredit, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: right;">Total</td>
                <td>Rp {{ number_format($totalDebit, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($totalCredit, 2, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>

