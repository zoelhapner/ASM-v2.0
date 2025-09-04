@extends('tablar::page')

@section('content')
<div class="container">
    <h2 class="mb-3">Neraca</h2>
    <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</p>

    {{-- 🔹 Filter Lisensi & Periode --}}
    <form method="GET" action="{{ route('reports.balance_sheet') }}" class="row g-2 align-items-end mb-3">
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

    <div class="col-md-3">
        <label for="license_id" class="form-label">Lisensi</label>
        <select name="license_id" id="license_id" class="form-select">
            @foreach($licenses as $license)
                <option value="{{ $license->id }}" {{ $license->id == $activeLicenseId ? 'selected' : '' }}>
                    {{ $license->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- 🔹 Dropdown untuk pilih tampilan --}}
    <div class="col-md-2">
        <label for="view" class="form-label">Tampilan</label>
        <select name="view" id="view" class="form-select">
            <option value="default" {{ $viewType == 'default' ? 'selected' : '' }}>Default</option>
            <option value="skontro" {{ $viewType == 'skontro' ? 'selected' : '' }}>Skontro</option>
        </select>
    </div>

    <div class="col-md-1">
        <button type="submit" class="btn btn-primary w-100">Filter</button>
    </div>
</form>


    {{-- 🔹 Tampilan sesuai pilihan --}}
    @if($viewType === 'default')
        @include('journals.trialbalance', ['groupedAccounts' => $groupedAccounts])
    @else
        @include('journals.trialbalance_skontro', ['groupedAccounts' => $groupedAccounts])
    @endif
</div>
@endsection
