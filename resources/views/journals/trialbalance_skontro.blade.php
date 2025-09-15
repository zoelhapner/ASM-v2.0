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
            {{-- <table class="table table-bordered">
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
                                    <span class="float-end">{{ number_format($aktivaRows[$i]['debit'] - $aktivaRows[$i]['credit'], 2, ',', '.') }}</span>
                                @endif
                            </td>

                            <td>{{ $passivaRows[$i]['account_code'] ?? '' }}</td>
                            <td>
                                {{ $passivaRows[$i]['account_name'] ?? '' }}
                                @if(isset($passivaRows[$i]))
                                    <span class="float-end">{{ number_format($passivaRows[$i]['credit'] - $passivaRows[$i]['debit'], 2, ',', '.') }}</span>
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
                <tfoot class="table-dark fw-bold">
                    <tr>
                        <td colspan="2" class="text-end">TOTAL AKTIVA: {{ number_format($totalAktiva, 2, ',', '.') }}</td>
                        <td colspan="2" class="text-end">TOTAL PASSIVA: {{ number_format($totalPassiva, 2, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table> --}}

            <div class="row">
                
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-primary text-white">
                            <strong>AKTIVA</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>Aset Lancar</td>
                                        <td class="text-end">{{ number_format($asetLancar, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Aset Tetap</td>
                                        <td class="text-end">{{ number_format($asetTetap, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Akumulasi Penyusutan</td>
                                        <td class="text-end text-danger">({{ number_format($penyusutan, 0, ',', '.') }})</td>
                                    </tr>
                                    <tr>
                                        <td>Beban Dibayar Dimuka</td>
                                        <td class="text-end">{{ number_format($bebanDibayarDimuka, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr class="fw-bold table-secondary">
                                        <td>Total Aktiva</td>
                                        <td class="text-end">{{ number_format($totalAktiva, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-success text-white">
                            <strong>PASSIVA</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>Kewajiban</td>
                                        <td class="text-end">{{ number_format($kewajiban, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ekuitas Awal</td>
                                        <td class="text-end">{{ number_format($ekuitasAwal, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pendapatan</td>
                                        <td class="text-end">{{ number_format($pendapatan, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Beban</td>
                                        <td class="text-end text-danger">({{ number_format($beban, 0, ',', '.') }})</td>
                                    </tr>
                                    <tr>
                                        <td>Laba/Rugi Berjalan</td>
                                        <td class="text-end fw-bold">
                                            {{ number_format($labaRugiBerjalan, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <tr class="fw-bold table-secondary">
                                        <td>Total Passiva</td>
                                        <td class="text-end">{{ number_format($totalPassiva, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

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