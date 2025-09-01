@extends('tablar::page')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Neraca Saldo</h2>
            <button class="btn btn-danger">
                <i class="bi bi-file-earmark-arrow-down"></i> Export
            </button>
        </div>
        

            <form method="GET" action="{{ route('trialbalance') }}" class="row g-2 mb-3">
                @if(auth()->user()->hasRole('Super-Admin'))
                    <div class="col-md-3">
                        
                        <label for="license_id" class="form-label">Lisensi</label>
                        <select name="license_id" class="form-select select2" onchange="this.form.submit()">
                            @foreach($licenses as $license)
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

                <div class="col-md-3">
                    <label>Periode</label>
                    <input type="date" name="start_date" 
                        value="{{ $startDate ? \Carbon\Carbon::parse($startDate)->format('d-m-Y') : '' }}" >
                </div>
                <div class="col-md-3">
                    <label>s/d</label>
                    <input type="date" name="end_date" value="{{ $endDate }}">
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th class="text-end">Debit</th>
                            <th class="text-end">Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accounts as $acc)
                            <tr>
                                <td>{{ $acc['account_code'] }}</td>
                                <td>{{ $acc['account_name'] }}</td>
                                <td class="text-end">{{ number_format($acc['debit'], 0, ',', '.') }}</td>
                                <td class="text-end">{{ number_format($acc['credit'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold table-secondary">
                            <td colspan="2" class="text-end">Total</td>
                            <td class="text-end">{{ number_format($totalDebit, 0, ',', '.') }}</td>
                            <td class="text-end">{{ number_format($totalCredit, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                @if($totalDebit === $totalCredit)
                    <div class="alert alert-success mt-3">
                        ✅ Neraca Saldo seimbang ({{ number_format($totalDebit, 0, ',', '.') }})
                    </div>
                @else
                    <div class="alert alert-danger mt-3">
                        ⚠️ Neraca Saldo tidak seimbang! Debit: {{ number_format($totalDebit, 0, ',', '.') }} |
                        Kredit: {{ number_format($totalCredit, 0, ',', '.') }}
                    </div>
                @endif

            </div>
    </div>
@endsection
