@extends('tablar::page')

@section('content')
<div class="container">
    <h4 class="mb-4">Laporan Laba Rugi</h4>
    <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>

    <div class="row">
        <div class="col-md-6">
            <h5>Pendapatan</h5>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Akun</th>
                        <th class="text-end">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incomeAccounts as $acc)
                        <tr>
                            <td>{{ $acc['code'] }}</td>
                            <td>{{ $acc['name'] }}</td>
                            <td class="text-end">{{ number_format($acc['balance'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td colspan="2">Total Pendapatan</td>
                        <td class="text-end">{{ number_format($totalIncome, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h5>Beban</h5>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Akun</th>
                        <th class="text-end">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenseAccounts as $acc)
                        <tr>
                            <td>{{ $acc['code'] }}</td>
                            <td>{{ $acc['name'] }}</td>
                            <td class="text-end">{{ number_format($acc['balance'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td colspan="2">Total Beban</td>
                        <td class="text-end">{{ number_format($totalExpense, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h4 class="text-end mt-4">
        Laba Bersih: {{ number_format($netIncome, 0, ',', '.') }}
    </h4>
</div>
@endsection
