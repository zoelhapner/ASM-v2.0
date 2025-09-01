@extends('tablar::page')

@section('content')
<div class="container-fluid mt-3">
    <h3 class="mb-3">Neraca Saldo</h3>

    {{-- 🔹 Filter --}}
    <div class="card shadow-sm border-0 mb-3">
        <div class="card-body">
            <form method="GET" class="row g-2 align-items-center">
                @if(auth()->user()->hasRole('Super-Admin'))
                    <div class="col-md-4">
                        <label class="form-label">Lisensi</label>
                        <select name="license_id" class="form-select">
                            <option value="">-- Semua Lisensi --</option>
                            @foreach($licenses as $license)
                                <option value="{{ $license->id }}" 
                                    {{ request('license_id') == $license->id ? 'selected' : '' }}>
                                    {{ $license->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="col-md-3">
                    <label class="form-label">Periode Awal</label>
                    <input type="date" name="start_date" 
                        value="{{ $startDate ? \Carbon\Carbon::parse($startDate)->format('Y-m-d') : '' }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Periode Akhir</label>
                    <input type="date" name="end_date" 
                        value="{{ $endtDate ? \Carbon\Carbon::parse($endDate)->format('Y-m-d') : '' }}">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- 🔹 Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Kode Akun</th>
                        <th class="text-center">Nama Akun</th>
                        <th class="text-center">Debit</th>
                        <th class="text-center">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accounts as $acc)
                        <tr>
                            <td class="text-center">{{ $acc['account_code'] }}</td>
                            <td>{{ $acc['account_name'] }}</td>
                            <td class="text-end">{{ number_format($acc['debit'], 0, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($acc['credit'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total</td>
                        <td class="text-end">{{ number_format($totalDebit, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($totalCredit, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>

            {{-- 🔹 Status keseimbangan --}}
            @if($totalDebit === $totalCredit)
                <div class="alert alert-success mt-3">
                    ✅ Neraca Saldo seimbang (Debit: {{ number_format($totalDebit, 0, ',', '.') }} | 
                    Kredit: {{ number_format($totalCredit, 0, ',', '.') }})
                </div>
            @else
                <div class="alert alert-warning mt-3">
                    ⚠️ Neraca Saldo tidak seimbang! Debit: {{ number_format($totalDebit, 0, ',', '.') }} | 
                    Kredit: {{ number_format($totalCredit, 0, ',', '.') }}
                </div>
            @endif
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

