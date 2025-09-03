@extends('tablar::page')

@section('content')
<div class="container">
    <h1 class="text-center">KAS</h1>

   {{-- Filter --}}
    <form action="{{ route('journals.report') }}" method="GET" class="card p-4 mb-4">
        <div class="row">
            @if (auth()->user()->hasRole('Super-Admin') || auth()->user()->hasRole('Pemilik Lisensi') || auth()->user()->hasRole('Akuntan'))
                <div class="col-md-4">
                    <label for="license_id" class="form-label">Lisensi</label>
                    <select name="license_id" id="license_id" class="form-select select2">
                        <option value="">-- Semua Lisensi --</option>
                        @foreach ($licenses as $license)
                            <option value="{{ $license->id }}" {{ request('license_id') == $license->id ? 'selected' : '' }}>
                                {{ $license->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif   
            {{-- <div class="col-md-4">
                    @include('components.select-license', [
                        'licenses' => $licenses,
                        'selectedLicenseId' => old('license_id', $license->license_id ?? null)
                    ])
                </div> --}}

           <div class="col-md-4">
                <label for="account_id" class="form-label">Akun</label>
                <select name="account_id" id="account_id" class="form-select select2">
                    <option value="">-- Semua Akun --</option>
                    @foreach ($accounts as $account)
                        <option value="{{ $account->id }}" {{ request('account_id') == $account->id ? 'selected' : '' }}>
                            [{{ $account->account_code }}] {{ $account->account_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label for="start_date" class="form-label">Dari Tanggal</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control">
            </div>

            <div class="col-md-2">
                <label for="end_date" class="form-label">Sampai Tanggal</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control">
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary text-white">Filter</button>
            <a href="{{ route('journals.report') }}" class="btn btn-secondary text-white">Reset</a>
            <a href="{{ route('kas.export.excel', request()->all()) }}" class="btn btn-success text-white">
                <i class="ti ti-file-export"></i> Export Excel
            </a>
        </div>
    </form>

    


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th class="desc-column">RINCIAN</th>
                <th>KODE AKUN</th>
                <th class="account-column">AKUN</th>
                <th class="user-column">USER</th>
                <th>PIC</th>
                <th>DEBIT (pemasukan)</th>
                <th>KREDIT (pengeluaran)</th>
                <th>SALDO</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $saldo = 0;
                $totalDebit = 0;
                $totalKredit = 0;
            @endphp

            @foreach ($journals as $journal)
                @foreach ($journal->details as $detail)
                    @php
                        $debit = $detail->debit;
                        $kredit = $detail->credit;
                        $saldo += $debit - $kredit;
                        $totalDebit += $debit;
                        $totalKredit += $kredit;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ \Carbon\Carbon::parse($journal->transaction_date)->format('d/m/Y') }}</td>
                        <td class="desc-column">{{ $detail->description }}</td>
                        <td>{{ $detail->account->account_code }}</td>
                        <td class="account-column">{{ $detail->account->account_name }}</td>
                        <td class="user-column">{{ $detail->person_name }}</td>
                        <td>
                            @if($journal->creator)
                                {{ $journal->creator->name }}
                            @else
                                <small class="fst-italic text-muted">dibuat oleh sistem</small>
                            @endif
                        </td>

                        <td class="text-end">{{ number_format($debit, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($kredit, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($saldo, 0, ',', '.') }}</td>
                        <td>{{ $jouurnal->description ?? '-' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="fw-bold">
                <td colspan="7" class="text-end">TOTAL</td>
                <td class="text-end">{{ number_format($totalDebit, 0, ',', '.') }}</td>
                <td class="text-end">{{ number_format($totalKredit, 0, ',', '.') }}</td>
                <td class="text-end">{{ number_format($saldo, 0, ',', '.') }}</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    </div>

</div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
        $('.select2').select2({
            placeholder: "-- Pilih --",
            width: '100%'
        });
        
        const initialLicenseId = $('#license_id').val();

        if (initialLicenseId) {
            $('#license_id').trigger('change');
        }

        $('#license_id').on('change', function () {
            const licenseId = $(this).val();
            $('#account_id').html('<option value="">Memuat...</option>').prop('disabled', true);

            if (licenseId) {
                $.get(`/get-accounts-by-license/${licenseId}`, function (data) {
                    let options = '<option value="">-- Semua Akun --</option>';
                    data.forEach(function (account) {
                        options += `<option value="${account.id}">[${account.account_code}] ${account.account_name}</option>`;
                    });
                    $('#account_id').html(options).prop('disabled', false);
                });
            } else {
                $('#account_id').html('<option value="">-- Semua Akun --</option>').prop('disabled', false);
            }
        });
    });

    </script>
@endpush

