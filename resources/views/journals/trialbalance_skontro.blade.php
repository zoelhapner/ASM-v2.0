@extends('tablar::page')

@section('content')
<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-3">Neraca</h3>
            <a href="{{ route('trial.export', [
                    'start_date' => request('start_date'),
                    'end_date' => request('end_date'),
                    'license_id' => request('license_id')
                ]) }}" 
                class="btn btn-success" target="_blank">
                <i class="ti ti-file-export text-white"></i>Ekspor Excel
            </a> 
    </div>

    {{-- 🔹 Filter --}}
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body">
            <form method="GET" class="row g-2 align-items-center">
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Dari Tanggal</label>
                    <input type="date" name="start_date" id="start_date" class="form-control"
                        value="{{ $startDate }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label">Sampai Tanggal</label>
                    <input type="date" name="end_date" id="end_date" class="form-control"
                        value="{{ $endDate }}">
                </div>
                @if(auth()->user()->hasRole('Super-Admin'))
                    <div class="col-md-3">
                        <label for="license_id" class="form-label">Lisensi</label>
                        <select name="license_id" class="form-select select2">
                            <option value="">-- Semua Lisensi --</option>
                            @foreach($licenses as $license)
                                <option value="{{ $license->id }}" 
                                    {{ request('license_id') == $license->id ? 'selected' : '' }}>
                                    {{ $license->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
                @endif
                
                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary text-white">
                        <i class="ti ti-funnel"></i> Filter
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- 🔹 Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th colspan="2" class="text-center">AKTIVA</th>
                        <th colspan="2" class="text-center">PASSIVA (Kewajiban + Ekuitas)</th>
                    </tr>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Akun</th>
                        <th>Kode</th>
                        <th>Nama Akun</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $aktivaRows = isset($groupedAccounts['AKTIVA'])
                            ? $groupedAccounts['AKTIVA']->flatMap(fn($s) => $s['accounts'])->values()
                            : collect();

                        $passivaRows = collect();
                        if(isset($groupedAccounts['KEWAJIBAN'])) {
                            $passivaRows = $passivaRows->merge($groupedAccounts['KEWAJIBAN']->flatMap(fn($s) => $s['accounts']));
                        }
                        if(isset($groupedAccounts['EKUITAS'])) {
                            $passivaRows = $passivaRows->merge($groupedAccounts['EKUITAS']->flatMap(fn($s) => $s['accounts']));
                        }

                        $maxRows = max($aktivaRows->count(), $passivaRows->count());

                        $totalAktiva = $aktivaRows->sum(fn($a) => $a['debit'] - $a['credit']);
                        $totalPassiva = $passivaRows->sum(fn($a) => $a['credit'] - $a['debit']);
                    @endphp

                    @for ($i = 0; $i < $maxRows; $i++)
                        <tr>
                            <td>{{ $aktivaRows[$i]['account_code'] ?? '' }}</td>
                            <td>
                                {{ $aktivaRows[$i]['account_name'] ?? '' }}
                                @if(isset($aktivaRows[$i]))
                                    <span class="float-end">{{ number_format($aktivaRows[$i]['debit'] - $aktivaRows[$i]['credit'], 0, ',', '.') }}</span>
                                @endif
                            </td>

                            <td>{{ $passivaRows[$i]['account_code'] ?? '' }}</td>
                            <td>
                                {{ $passivaRows[$i]['account_name'] ?? '' }}
                                @if(isset($passivaRows[$i]))
                                    <span class="float-end">{{ number_format($passivaRows[$i]['credit'] - $passivaRows[$i]['debit'], 0, ',', '.') }}</span>
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
                <tfoot class="table-dark fw-bold">
                    <tr>
                        <td colspan="2" class="text-end">TOTAL AKTIVA: {{ number_format($totalAktiva, 0, ',', '.') }}</td>
                        <td colspan="2" class="text-end">TOTAL PASSIVA: {{ number_format($totalPassiva, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>

                <div class="d-flex justify-content-start gap-2 mt-3">
                    <a href="{{ route('journals.trial.pdf', [
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

{{-- <table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th class="text-center">Kode Akun</th>
            <th class="text-center">Nama Akun</th>
            <th class="text-center">Debit</th>
            <th class="text-center">Kredit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($groupedAccounts as $category => $subs)
            <tr class="bg-light">
                <td colspan="4" class="text-center fw-bold">{{ strtoupper($category) }}</td>
            </tr>
            @foreach($subs as $subCat => $data)
                <tr class="table-secondary">
                    <td colspan="4" class="fw-semibold fst-italic"> {{ $subCat }}</td>
                </tr>
                
                @foreach($data['accounts'] as $acc)
                        <tr>
                            <td class="text-center">{{ $acc['account_code'] }}</td>
                            <td>{{ $acc['account_name'] }}</td>
                            <td class="text-end">Rp {{ number_format($acc['debit'], 2, ',', '.') }}</td>
                            <td class="text-end">Rp {{ number_format($acc['credit'], 2, ',', '.') }}</td>
                        </tr>
                @endforeach

                <tr class="table-secondary fw-bold">
                    <td colspan="2" class="text-end">Subtotal {{ $subCat }}</td>
                    <td class="text-end">Rp {{ number_format($data['subtotalDebit'], 2, ',', '.') }}</td>
                    <td class="text-end">Rp {{ number_format($data['subtotalCredit'], 2, ',', '.') }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
    <tfoot>
        <tr class="fw-bold">
            <td colspan="2" class="text-end">Total</td>
            <td class="text-end">Rp {{ number_format($totalDebit, 2, ',', '.') }}</td>
            <td class="text-end">Rp {{ number_format($totalCredit, 2, ',', '.') }}</td>
        </tr>
    </tfoot>
</table> --}}