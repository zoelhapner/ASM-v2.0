<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Neraca</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #444;
            padding: 6px;
            text-align: right;
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
        <h2>Trial Balance Report</h2>
        <h4>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</h4>
        @if($licenses->where('id', $request->license_id)->first())
            <h4>License: {{ $licenses->where('id', $request->license_id)->first()->name }}</h4>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>Kode Akun</th>
                <th class="text-left">Nama Akun</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groupedAccounts as $category => $subs)
                <tr>
                    <td colspan="4" class="text-left"><strong>{{ $category }}</strong></td>
                </tr>
                @foreach($subs as $subCat => $data)
                    <tr>
                        <td colspan="4" class="text-left"><em>{{ $subCat }}</em></td>
                    </tr>
                    @foreach($data['accounts'] as $acc)
                        <tr>
                            <td>{{ $acc['account_code'] }}</td>
                            <td class="text-left">{{ $acc['account_name'] }}</td>
                            <td>{{ number_format($acc['debit'], 2, ',', '.') }}</td>
                            <td>{{ number_format($acc['credit'], 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-right"><strong>Subtotal {{ $subCat }}</strong></td>
                        <td><strong>{{ number_format($data['subtotalDebit'], 2, ',', '.') }}</strong></td>
                        <td><strong>{{ number_format($data['subtotalCredit'], 2, ',', '.') }}</strong></td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="text-right"><strong>Total</strong></td>
                <td><strong>{{ number_format($totalDebit, 2, ',', '.') }}</strong></td>
                <td><strong>{{ number_format($totalCredit, 2, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
