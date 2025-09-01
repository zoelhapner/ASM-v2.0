@extends('tablar::page')
@section('content')
    <div class="container">
        <h2>Neraca Saldo</h2>

            <form method="GET" action="{{ route('trial-balance') }}" class="row g-2 mb-3">
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
                    <input type="date" name="start_date" value="{{ $startDate }}" class="form-control" onchange="this.form.submit()">
                </div>
                <div class="col-md-3">
                    <label>s/d</label>
                    <input type="date" name="end_date" value="{{ $endDate }}" class="form-control" onchange="this.form.submit()">
                </div>
            </form>

            <table class="table table-bordered">
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
    </div>
@endsection
