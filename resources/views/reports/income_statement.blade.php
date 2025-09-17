@extends('tablar::page')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 style="text-align:center;">Laporan Laba Rugi</h2>
        <div class="mb-3">
            <a href="{{ route('reports.income_statement.pdf', request()->all()) }}" class="btn btn-danger btn-sm">
                Export PDF
            </a>
            <a href="{{ route('reports.income_statement.excel', request()->all()) }}" class="btn btn-success btn-sm">
                Export Excel
            </a>
        </div>    
    </div>

    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('reports.income_statement') }}" class="row g-3 mb-4">
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Dari Tanggal</label>
                    <input type="date" name="start_date" id="start_date" 
                        class="form-control" value="{{ $startDate }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label">Sampai Tanggal</label>
                    <input type="date" name="end_date" id="end_date" 
                        class="form-control" value="{{ $endDate }}">
                </div>
                @if(auth()->user()->hasRole('Super-Admin'))
                    <div class="col-md-3">
                        <label for="license_id" class="form-label">Lisensi</label>
                        <select name="license_id" id="license_id" class="form-select select2">
                            <option value="">-- Semua Lisensi --</option>
                            @foreach ($licenses as $license)
                                <option value="{{ $license->id }}" 
                                    {{ $activeLicenseId == $license->id ? 'selected' : '' }}>
                                    {{ $license->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
                @endif

                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary text-white">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead class="table-light">
                    <tr>
                        <th>Kode Akun</th>
                        <th>Nama Akun</th>
                        <th class="text-end">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- 🔹 Pendapatan --}}
                    <tr class="table-secondary">
                        <td colspan="3"><strong>Pendapatan</strong></td>
                    </tr>
                    @if(isset($grouped['Pendapatan']))
                        @foreach($grouped['Pendapatan'] as $subCat => $data)
                            <tr>
                                <td colspan="3"><em>{{ $subCat }}</em></td>
                            </tr>
                            @foreach($data['accounts'] as $acc)
                                <tr>
                                    <td>{{ $acc->account_code }}</td>
                                    <td>{{ $acc->account_name }}</td>
                                    <td class="text-end">{{ number_format($acc->balance, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr class="fw-bold">
                                <td colspan="2">Subtotal {{ $subCat }}</td>
                                <td class="text-end">{{ number_format($data['subtotal'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @endif

                    <tr class="fw-bold bg-light">
                        <td colspan="2">Total Pendapatan</td>
                        <td class="text-end">{{ number_format($totalIncome, 0, ',', '.') }}</td>
                    </tr>

                    {{-- 🔹 Beban --}}
                    <tr class="table-secondary">
                        <td colspan="3"><strong>Beban</strong></td>
                    </tr>
                    @if(isset($grouped['Beban']))
                        @foreach($grouped['Beban'] as $subCat => $data)
                            <tr>
                                <td colspan="3"><em>{{ $subCat }}</em></td>
                            </tr>
                            @foreach($data['accounts'] as $acc)
                                <tr>
                                    <td>{{ $acc->account_code }}</td>
                                    <td>{{ $acc->account_name }}</td>
                                    <td class="text-end">{{ number_format($acc->balance, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr class="fw-bold">
                                <td colspan="2">Subtotal {{ $subCat }}</td>
                                <td class="text-end">{{ number_format($data['subtotal'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @endif

                    <tr class="fw-bold bg-light">
                        <td colspan="2">Total Beban</td>
                        <td class="text-end">{{ number_format($totalExpense, 0, ',', '.') }}</td>
                    </tr>

                    {{-- 🔹 Net Income --}}
                    <tr class="table-dark text-white">
                        <td colspan="2"><strong>Laba/Rugi Bersih</strong></td>
                        <td class="text-end"><strong>{{ number_format($netIncome, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
 $('.select2').select2({
            placeholder: "-- Pilih --",
            width: '100%'
        });
</script>
@endpush


{{-- <div class="row">
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
    </h4> --}}
