@extends('tablar::page')

@section('content')
<div class="container">
    <h2 class="mb-3">Neraca</h2>
    <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>

    {{-- 🔹 Filter Lisensi & Periode --}}
    <form method="GET" action="{{ route('reports.balance_sheet') }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <select name="license_id" class="form-select" onchange="this.form.submit()">
                @foreach($licenses as $license)
                    <option value="{{ $license->id }}" {{ $activeLicenseId == $license->id ? 'selected' : '' }}>
                        {{ $license->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
        </div>
        <div class="col-md-2">
            <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">
        </div>
        <div class="col-md-2">
            <select name="view" class="form-select" onchange="this.form.submit()">
                <option value="default" {{ $viewType == 'default' ? 'selected' : '' }}>Default</option>
                <option value="skontro" {{ $viewType == 'skontro' ? 'selected' : '' }}>Skontro</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
        </div>
    </form>

    {{-- 🔹 Tampilan sesuai pilihan --}}
    @if($viewType == 'default')
        @include('journals.trialbalance', ['groupedAccounts' => $groupedAccounts])
    @else
        @include('journals.trialbalance_skontro', ['groupedAccounts' => $groupedAccounts])
    @endif
</div>
@endsection
