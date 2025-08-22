@extends('tablar::page')

@section('content')
<div class="container">
    <h2>Tambah Jurnal</h2>

    {{-- Alert Success --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi Kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form filter lisensi (GET) --}}
    @if(auth()->user()->hasRole('Super-Admin'))
        <form method="GET" action="{{ route('journals.create') }}" class="mb-3">
            <div class="row">
                <div class="mb-3">
                    <label for="license_id" class="form-label">Filter Lisensi</label>
                    <select name="license_id" id="license_id" class="form-select select2" onchange="this.form.submit()">
                        <option value="">-- Semua Lisensi --</option>
                        @foreach ($licenses as $license)
                            <option value="{{ $license->id }}" 
                                {{ $activeLicenseId == $license->id ? 'selected' : '' }}>
                                {{ $license->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    @endif


    {{-- Form --}}
    <form action="{{ route('journals.store') }}" method="POST">
        @csrf

        {{-- License --}}
            <div class="mb-3">
                <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
            </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="transaction_date">Tanggal Transaksi</label>
            <input type="date" name="transaction_date" class="form-control" required>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description">Deskripsi Umum</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        {{-- Detail Akun --}}
        <h5>Detail Akun</h5>
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
                    <tr>
                        <td>
                            <select name="details[0][account_id]" class="form-select select2 account-select" data-row="0" width="100px;" required>
                                <option value="account">-- Pilih Akun --</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"
                                            data-code="{{ $account->account_code }}"
                                            data-name="{{ $account->account_name }}"
                                            data-person-type="{{ $account->person_type }}">
                                            {{ $account->account_code }} - {{ $account->account_name }}
                                        </option>
                                    @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="details[0][person]" class="form-select select2 user-select" data-row="0" width="75px;">
                                <option value="">-- Pilih User --</option>
                            </select>
                        </td>
                        <td><input type="number" step="0.01" name="details[0][debit]" class="form-control debit-input" disabled></td>
                        <td><input type="number" step="0.01" name="details[0][credit]" class="form-control credit-input" disabled></td>
                        <td><input type="text" name="details[0][description]" class="form-control"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6"><button type="button" id="add-row" class="btn btn-sm btn-primary">Tambah Baris</button></td>
                    </tr>
                    <tr>
                        <th colspan="2">Subtotal</th>
                        <th id="subtotal-debit">0</th>
                        <th id="subtotal-credit">0</th>
                        <th colspan="2"></th>
                    </tr>
                </tfoot>
            </table>

        {{-- Validasi Total (khusus error total) --}}
        @if ($errors->has('total'))
            <div class="alert alert-danger">
                {{ $errors->first('total') }}
            </div>
        @endif
        
        <div class="text-end">
            <button type="submit" class="btn btn-success text-white">Simpan</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
    $('.select2').select2({
        placeholder: "-- Pilih User --",
        // width: '100%'
    });
    });
</script>

    <script>
        const studentOptions = @json($students);
        const employeeOptions = @json($employees);
        const licenseOptions = @json($licenses);

        function renderUserOptions(row, source) {
            const $userSelect = $(`select.user-select[data-row="${row}"]`);
            $userSelect.empty().append(`<option value="">-- Pilih User --</option>`);
            $userSelect.prop('disabled', true).hide();
            $userSelect.show().prop('disabled', false);

            let data = [];
            if (source === 'Siswa') data = studentOptions;
            if (source === 'Karyawan') data = employeeOptions;
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
                debitInput.prop('disabled', true).val('');
                creditInput.prop('disabled', true).val('');
            }
        }

        // const akunOtomatisPusat = ['K 0001', 'K 0002', 'K 0003', 'K 0004', 'K 0005', 'K 0006', 'K 0007', 'K 0008', 'K 0013', 'K 0014', 'K 0015', 'K 0016',
        //     'K 0021',
        //     'K 0022',
        //     'K 0023',
        //     'K 0024',
        //     'K 0029',
        //     'K 0031', 
        //     'K 0034',    
        // ];
        // const pusatUserId = @json($pusatUserId ?? '');
        // const pusatUserName = @json($pusatUserName ?? '');

        // $('#detail-rows').on('change', '.account-select', function () {
        //     const row = $(this).data('row');
        //     const code = $(this).find('option:selected').data('code') || '';
        //     const personType = $(this).find('option:selected').data('person-type') || null;
        //     const $userSelect = $(`select.user-select[data-row="${row}"]`);

        //     if (akunOtomatisPusat.includes(code) && pusatUserId) {
        //         $userSelect.empty()
        //             .append(`<option value="">-- Pilih User --</option>`)
        //             .append(`<option value="${pusatUserId}" selected>${pusatUserName}</option>`)
        //             .show()
        //             .prop('disabled', false);

        //         // Aktifkan kolom debit/kredit sesuai kode akun
        //         toggleDebitCreditInputs(row, code);
        //     } else if (['Siswa', 'Karyawan', 'Lisensi'].includes(personType)) {
        //         renderUserOptions(row, personType);
        //         toggleDebitCreditInputs(row, code);
        //     } else {
        //         $userSelect.hide().prop('disabled', false).empty();
        //         toggleDebitCreditInputs(row, code);
        //     }
        // });

        $('#add-row').click(function () {
            const rowCount = $('#detail-rows tr').length;
            const newRow = `
                <tr>
                    <td>
                        <select name="details[${rowCount}][account_id]" class="form-select account-select" data-row="${rowCount}" required>
                            <option value="">-- Pilih Akun --</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}"
                                    data-code="{{ $account->account_code }}"
                                    data-name="{{ $account->account_name }}"
                                    data-person-type="{{ $account->person_type }}">
                                    {{ $account->account_code }} - {{ $account->account_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="details[${rowCount}][person]" class="form-select user-select" data-row="${rowCount}"></select>
                    </td>
                    <td><input type="number" step="0.01" name="details[${rowCount}][debit]" class="form-control debit-input" disabled></td>
                    <td><input type="number" step="0.01" name="details[${rowCount}][credit]" class="form-control credit-input" disabled></td>
                    <td><input type="text" name="details[${rowCount}][description]" class="form-control"></td>
                    <td><button type="button" class="btn btn-sm btn-danger remove-row">Hapus</button></td>
                </tr>
            `;
            $('#detail-rows').append(newRow);
            $(`select[data-row="${rowCount}"]`).select2({
                placeholder: "-- Pilih --",
                width: '100%'
            });
        });

        $('#detail-rows').on('click', '.remove-row', function () {
            $(this).closest('tr').remove();
            calculateSubtotals();
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

            // Panggil awal
            calculateSubtotals();
        });
        
    </script>
@endsection


