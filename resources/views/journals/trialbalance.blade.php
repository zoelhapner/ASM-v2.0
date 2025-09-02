@extends('tablar::page')

@section('content')
<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-3">Neraca</h3>
            <button class="btn btn-danger">
                    <i class="bi bi-file-earmark-arrow-down"></i> Export
            </button>
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
                    @foreach($groupedAccounts as $category => $subs)
                        <tr class="bg-light">
                            <td colspan="4"><strong>{{ $category }}</strong></td>
                        </tr>
                        @foreach($subs as $subCat => $data)
                            <tr class="table-secondary">
                                <td colspan="4">-- {{ $subCat }}</td>
                            </tr>
                            
                            @foreach($data['accounts'] as $acc)
                                <tr>
                                    <td class="text-center">{{ $acc['account_code'] }}</td>
                                    <td>{{ $acc['account_name'] }}</td>
                                    <td class="text-end">{{ number_format($acc['debit'], 2, ',', '.') }}</td>
                                    <td class="text-end">{{ number_format($acc['credit'], 2, ',', '.') }}</td>
                                </tr>
                            @endforeach

                            <tr class="table-secondary fw-bold">
                                <td colspan="2" class="text-end">Subtotal {{ $sub_category }}</td>
                                <td class="text-end">{{ number_format($data['subtotalDebit'], 2, ',', '.') }}</td>
                                <td class="text-end">{{ number_format($data['subtotalCredit'], 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fw-bold">
                        <td colspan="2" class="text-end">Total</td>
                        <td class="text-end">{{ number_format($totalDebit, 2, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($totalCredit, 2, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>

            {{-- 🔹 Status keseimbangan --}}
            @if($totalDebit === $totalCredit)
                <div class="alert alert-success mt-3">
                    ✅ Neraca Saldo seimbang (Debit: {{ number_format($totalDebit, 2, ',', '.') }} | 
                    Kredit: {{ number_format($totalCredit, 2, ',', '.') }})
                </div>
            @else
                <div class="alert alert-warning mt-3">
                    ⚠️ Neraca Saldo tidak seimbang! Debit: {{ number_format($totalDebit, 2, ',', '.') }} | 
                    Kredit: {{ number_format($totalCredit, 2, ',', '.') }}
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

