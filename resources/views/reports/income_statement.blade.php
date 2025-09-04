@extends('tablar::page')

@section('content')
<div class="container">
    <h4 class="mb-4">Laporan Laba Rugi</h4>
    <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>

    <form method="GET" action="{{ route('reports.income_statement') }}" class="row g-2 mb-3">
        <div class="col-auto">
            <label for="start_date" class="col-form-label">Periode</label>
        </div>
        <div class="col-auto">
            <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
        </div>
        <div class="col-auto">
            <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">
        </div>

        @role('Super-Admin')
        <div class="col-auto">
            <select name="license_id" class="form-select">
                <option value="">-- Pilih Lisensi --</option>
                @foreach($licenses as $license)
                    <option value="{{ $license->id }}" {{ $license->id == $activeLicenseId ? 'selected' : '' }}>
                        {{ $license->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @endrole

        <div class="col-auto">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-filter"></i> Tampilkan
            </button>
        </div>
    </form>


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
                        <td colspan="2" class="text-end">Laba/Rugi</td>
                        <td class="text-end">{{ number_format($netIncome, 2, ',', '.') }}</td>
                        <td class="text-end">
                            {{ $acc['balance'] < 0 
                                ? '(' . number_format(abs($acc['balance']), 2, ',', '.') . ')' 
                                : number_format($acc['balance'], 2, ',', '.') }}
                        </td>

                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-start gap-2 mt-3">
                    <a href="{{ route('journals.income.pdf', [
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                            'license_id' => request('license_id')
                        ]) }}" 
                        class="btn btn-danger" target="_blank">
                        <i class="ti ti-printer"></i>Cetak
                    </a>
            </div>
        </div>
    </div>

    <h4 class="text-end mt-4">
        Laba/Rugi: {{ number_format($netIncome, 2, ',', '.') }}
    </h4>
</div>
@endsection
