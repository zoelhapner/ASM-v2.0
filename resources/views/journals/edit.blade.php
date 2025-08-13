@extends('tablar::page')

@section('content')
<div class="container">
    <h1>Edit Jurnal</h1>

    <form action="{{ route('journals.update', $journal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Pilih lisensi jika mau diubah -->

        @if(auth()->user()->hasRole('Super-Admin'))
            <div class="col-md-6 mb-3">
                <label for="license_id" class="form-label">Pilih Lisensi</label>
                <select name="license_id" id="license_id" class="form-select" disabled>
                    @foreach ($licenses as $license)
                        <option value="{{ $license->id }}" 
                            {{ $journal->license_id == $license->id ? 'selected' : '' }}>
                            {{ $license->name }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="license_id" value="{{ $journal->license_id }}">
            </div>
        @endif

        <div class="col-md-6 mb-3">
            <label for="transaction_date">Tanggal Transaksi</label>
            <input type="date" name="transaction_date" class="form-control"
                   value="{{ old('transaction_date', $journal->transaction_date) }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="description">Deskripsi Umum</label>
            <textarea name="description" class="form-control">{{ old('description', $journal->description) }}</textarea>
        </div>

        <h4>Detail Akun</h4>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Akun</th>
                <th>User</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody id="detail-rows">
            @foreach ($journal->details as $i => $detail)
                <tr>
                    <td>
                        <select name="details[{{ $i }}][account_id]" 
                                class="form-select account-select" 
                                data-row="{{ $i }}" required
                                {{ $detail->account_id ? 'disabled' : '' }}>
                            <option value="">-- Pilih Akun --</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}"
                                    data-code="{{ $account->account_code }}"
                                    data-name="{{ $account->account_name }}"
                                    data-person-type="{{ $account->person_type }}"
                                    {{ $account->id == $detail->account_id ? 'selected' : '' }}>
                                    {{ $account->account_code }} - {{ $account->account_name }}
                                </option>
                            @endforeach
                        </select>

                        @if($detail->account_id)
                            <input type="hidden" name="details[{{ $i }}][account_id]" value="{{ $detail->account_id }}">
                        @endif
                    </td>
                    <td>
                        <select name="details[{{ $i }}][person]" 
                                class="form-control select2 user-select" 
                                data-row="{{ $i }}" 
                                data-selected="{{ $detail->person ?? '' }}"
                                {{ $detail->person ? 'disabled' : '' }}>
                            <option value="">-- Pilih User --</option>
                            @php
                                if ($detail->person_type === 'Siswa') {
                                    $users = $students;
                                } elseif ($detail->person_type === 'Karyawan') {
                                    $users = $employees;
                                } elseif ($detail->person_type === 'Pemilik Lisensi') {
                                    $users = $licenseHolders;
                                } else {
                                    $users = collect();
                                }
                            @endphp
                            @foreach ($users as $u)
                                <option value="{{ $u->id }}" {{ $u->id == $detail->person ? 'selected' : '' }}>
                                    {{ $u->name }}
                                </option>
                            @endforeach
                        </select>
                        @if($detail->person)
                            <input type="hidden" name="details[{{ $i }}][person]" value="{{ $detail->person }}">
                        @endif
                    </td>
                    <td>
                        <input type="number" step="0.01" 
                               name="details[{{ $i }}][debit]" 
                               class="form-control debit-input" 
                               value="{{ old("details.$i.debit", $detail->debit) }}"
                               {{ $detail->credit ? 'disabled' : '' }}>
                    </td>
                    <td>
                        <input type="number" step="0.01" 
                               name="details[{{ $i }}][credit]" 
                               class="form-control credit-input" 
                               value="{{ old("details.$i.credit", $detail->credit) }}"
                               {{ $detail->debit ? 'disabled' : '' }}>
                    </td>
                    <td>
                        <input type="text" 
                               name="details[{{ $i }}][description]" 
                               class="form-control"
                               value="{{ old("details.$i.description", $detail->description) }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Subtotal</th>
                <th id="subtotal-debit">{{ $journal->details->sum('debit') }}</th>
                <th id="subtotal-credit">{{ $journal->details->sum('credit') }}</th>
                <th colspan="2"></th>
            </tr>
        </tfoot>
    </table>
    @if ($errors->has('total'))
        <div class="alert alert-danger">
            {{ $errors->first('total') }}
        </div>
    @endif

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection


@section('js')
<script>
        const studentOptions = @json($students);
        const employeeOptions = @json($employees);
        const licenseHolderOptions = @json($licenseHolders);
        const licenseOptions = @json($licenseList);

        function renderUserOptions(row, source) {
            const $userSelect = $(`select.user-select[data-row="${row}"]`);
            $userSelect.empty().append(`<option value="">-- Pilih User --</option>`);
            $userSelect.prop('disabled', true).hide();
            $userSelect.show().prop('disabled', true);

            let data = [];
            if (source === 'Siswa') data = studentOptions;
            if (source === 'Karyawan') data = employeeOptions;
            if (source === 'Pemilik Lisensi') data = licenseHolderOptions;
            if (source === 'Lisensi') data = licenseOptions;

            if (data.length) {
                $userSelect.append(`<option value="">-- Pilih User --</option>`);
                data.forEach(item => {
                    $userSelect.append(`<option value="${item.id}">${item.name}</option>`);
                });
                $userSelect.show();
            } else {
                $userSelect.hide();
            }
        }

        function toggleDebitCreditInputs(row, code) {
            const debitInput = $(`input[name="details[${row}][debit]"]`);
            const creditInput = $(`input[name="details[${row}][credit]"]`);

            if (code.startsWith('D')) {
                debitInput.prop('disabled', false);
                creditInput.prop('disabled', true).val('');
            } else if (code.startsWith('K')) {
                creditInput.prop('disabled', false);
                debitInput.prop('disabled', true).val('');
            } else {
                debitInput.prop('disabled', false).val('');
                creditInput.prop('disabled', false).val('');
            }
        }

        const akunOtomatisPusat = ['K 0026', 'K 0027', 'K 0031', 'K 0032'];
        const pusatUserId = @json($pusatUserId ?? '');
        const pusatUserName = @json($pusatUserName ?? '');

         $(document).ready(function () {
        // Inisialisasi select2 untuk semua select user yang ada saat edit
        $('.user-select').select2({
            placeholder: "-- Pilih User --",
            width: '100%'
        });
    // Loop setiap baris detail saat edit
    $('#detail-rows tr').each(function () {
        const row = $(this).find('.account-select').data('row');
        const selectedAccount = $(this).find('.account-select option:selected');
        const code = selectedAccount.data('code') || '';
        const personType = selectedAccount.data('person-type') || null;
        const $userSelect = $(`select.user-select[data-row="${row}"]`);

        // Render opsi user kalau personType cocok
        if (['Siswa', 'Karyawan', 'Pemilik Lisensi', 'Lisensi'].includes(personType)) {
            renderUserOptions(row, personType);

            // Set selected user jika ada value
            const currentValue = $userSelect.attr('data-selected');
            if (currentValue) {
                $userSelect.val(currentValue).trigger('change');
            }
        }

        // Aktifkan debit/kredit sesuai kode akun
        toggleDebitCreditInputs(row, code);
    });

    function calculateSubtotals() {
            let totalDebit = 0;
            let totalCredit = 0;

            $('.debit-input').each(function() {
                let value = parseFloat($(this).val()) || 0;
                totalDebit += value;
            });

            $('.credit-input').each(function() {
                let value = parseFloat($(this).val()) || 0;
                totalCredit += value;
            });

            $('#subtotal-debit').text(totalDebit.toLocaleString('id-ID'));
            $('#subtotal-credit').text(totalCredit.toLocaleString('id-ID'));
        }

        // Aktifkan saat halaman load & saat ada perubahan
        $(document).ready(function() {
            $(document).on('input', '.debit-input, .credit-input', function() {
                const val = parseFloat($(this).val());
                if (val < 0) $(this).val('');
                calculateSubtotals();
            });

    // Hitung subtotal awal
    calculateSubtotals();
});
         });
</script>

@endsection
