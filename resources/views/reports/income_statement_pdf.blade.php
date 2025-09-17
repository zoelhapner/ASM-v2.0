<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Laba Rugi</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2, h4 {
            text-align: center;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Laba Rugi</h2>
    <h4>Periode: {{ $startDate }} s/d {{ $endDate }}</h4>

    <table>
        <thead>
            <tr>
                <th>Kode Akun</th>
                <th>Nama Akun</th>
                <th>Kategori</th>
                <th>Sub Kategori</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->account_code }}</td>
                    <td>{{ $row->account_name }}</td>
                    <td>{{ $row->category }}</td>
                    <td>{{ $row->sub_category }}</td>
                    <td>{{ number_format($row->balance, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
