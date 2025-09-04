@extends('tablar::page')

@section('content')
<div class="container">
    <h4 class="mb-4">Laporan Laba Rugi</h4>
    <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>

    <div class="row">
        <div class="col-mb-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Akun</th>
                        <th class="text-end">Jumlah (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Pendapatan --}}
                    <tr class="bg-light fw-bold">
                        <td colspan="3">Pendapatan</td>
                    </tr>
                    @foreach($grouped['Pendapatan'] ?? [] as $subCat => $data)
                        <tr class="table-secondary">
                            <td colspan="3">{{ $subCat }}</td>
                        </tr>
                        @foreach($data['accounts'] as $acc)
                            <tr>
                                <td>{{ $acc['code'] }}</td>
                                <td>{{ $acc['name'] }}</td>
                                <td class="text-end">
                                    {{ number_format($acc['balance'], 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="2" class="text-end">Subtotal {{ $subCat }}</td>
                            <td class="text-end">{{ number_format($data['subtotal'], 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total Pendapatan</td>
                        <td class="text-end">{{ number_format($totalIncome, 2, ',', '.') }}</td>
                    </tr>

                    {{-- Beban --}}
                    <tr class="bg-light fw-bold">
                        <td colspan="3">Beban</td>
                    </tr>
                    @foreach($grouped['Beban'] ?? [] as $subCat => $data)
                        <tr class="table-secondary">
                            <td colspan="3">{{ $subCat }}</td>
                        </tr>
                        @foreach($data['accounts'] as $acc)
                            <tr>
                                <td>{{ $acc['code'] }}</td>
                                <td>{{ $acc['name'] }}</td>
                                <td class="text-end">
                                    {{ number_format($acc['balance'], 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="2" class="text-end">Subtotal {{ $subCat }}</td>
                            <td class="text-end">{{ number_format($data['subtotal'], 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total Beban</td>
                        <td class="text-end">{{ number_format($totalExpense, 2, ',', '.') }}</td>
                    </tr>

                    {{-- Laba Bersih --}}
                    <tr class="table-dark fw-bold">
                        <td colspan="2" class="text-end">Laba Bersih</td>
                        <td class="text-end">{{ number_format($netIncome, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

        {{-- <div class="col-md-6">
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
        </div> --}}
    

    <h4 class="text-end mt-4">
        Laba Bersih: {{ number_format($netIncome, 0, ',', '.') }}
    </h4>
</div>
@endsection
