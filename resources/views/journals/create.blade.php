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
        <form method="GET" action="{{ route('journals.create') }}" class="col-md-4 mb-3">
            <div class="row">
                <div class="col-md-4 mb-3">
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

        <div class="row mb-3 align-items-center">
            {{-- No Transaksi --}}
            <div class="col-md-4 mb-3">
                <label for="journal_code" class="required">No Transaksi</label>
                <input type="text" id="journal_code" name="journal_code" 
                    class="form-control" required readonly>
            </div>

            {{-- Tanggal Transaksi --}}
            <div class="col-md-4 mb-3">
                <label for="transaction_date" class="required">Tanggal Transaksi</label>
                <input type="date" id="transaction_date" name="transaction_date" 
                    class="form-control" required>
            </div>
        </div>

        {{-- Hidden License --}}
        <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">


        {{-- Detail Akun --}}
        <h5>Detail Akun</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Akun</th>
                        <th>Deskripsi</th>
                        <th>User</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Aksi</th>
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
                        <td><input type="text" name="details[0][description]" class="form-control"></td>
                        <td>
                            <select name="details[0][person]" class="form-select select2 user-select" data-row="0" width="75px;">
                                <option value="">-- Pilih User --</option>
                            </select>
                        </td>
                        <td><input type="number" step="0.01" name="details[0][debit]" class="form-control debit-input" disabled></td>
                        <td><input type="number" step="0.01" name="details[0][credit]" class="form-control credit-input" disabled></td>
                        <td><button type="button" class="btn btn-sm btn-danger remove-row">Hapus</button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6"><button type="button" id="add-row" class="btn btn-sm btn-primary">Tambah Baris</button></td>
                    </tr>
                    <tr>
                        <th colspan="3">Subtotal</th>
                        <th id="subtotal-debit">0</th>
                        <th id="subtotal-credit">0</th>
                        <th colspan="3"></th>
                    </tr>
                </tfoot>
            </table>

        {{-- Validasi Total (khusus error total) --}}
        @if ($errors->has('total'))
            <div class="alert alert-danger">
                {{ $errors->first('total') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="description">Keterangan</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        
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
    const studentOptions  = @json($students);
    const employeeOptions = @json($employees);
    const licenseOptions  = @json($licenses);

    function renderUserOptions(row, source) {
        const $userSelect = $(`select.user-select[data-row="${row}"]`);
        $userSelect.empty().append(`<option value="">-- Pilih User --</option>`).show().prop('disabled', false);

        let data = [];
        if (source === 'Siswa') data = studentOptions;
        if (source === 'Karyawan') data = employeeOptions;
        if (source === 'Lisensi') data = licenseOptions;

        data.forEach(item => {
            $userSelect.append(`<option value="${item.id}">${item.name}</option>`);
        });

        if (data.length === 0) {
            $userSelect.hide();
        }
    }

    function toggleDebitCreditInputs(row, code) {
        code = code ? code.toString() : '';
        const debitInput  = $(`input[name="details[${row}][debit]"]`);
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

    $('#detail-rows').on('change', '.account-select', function () {
        const row = $(this).data('row');
        const code = $(this).find('option:selected').data('code') || '';
        const personType = $(this).find('option:selected').data('person-type') || null;
        const $userSelect = $(`select.user-select[data-row="${row}"]`);

        if (['Siswa', 'Karyawan', 'Lisensi'].includes(personType)) {
            renderUserOptions(row, personType);
        } else {
            $userSelect.hide().prop('disabled', false).empty();
        }
        toggleDebitCreditInputs(row, code);
    });

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

        $(`select.account-select[data-row="${rowCount}"], select.user-select[data-row="${rowCount}"]`).select2({
            placeholder: "-- Pilih --",
            width: '100%'
        });
    });

    $('#detail-rows').on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
        calculateSubtotals();
    });

    function calculateSubtotals() {
        let totalDebit = 0, totalCredit = 0;
        $('#detail-rows tr').each(function() {
            totalDebit  += parseFloat($(this).find('.debit-input').val())  || 0;
            totalCredit += parseFloat($(this).find('.credit-input').val()) || 0;
        });
        $('#subtotal-debit').text(totalDebit.toLocaleString('id-ID'));
        $('#subtotal-credit').text(totalCredit.toLocaleString('id-ID'));
    }

    $(document).ready(function() {
        $(document).on('input', '.debit-input, .credit-input', function() {
            const val = parseFloat($(this).val());
            if (val < 0) $(this).val('');
            calculateSubtotals();
        });

        calculateSubtotals();
    });
</script>

<script>
    $(document).ready(function () {
        const $licenseSelect = $('select[name="license_id"]');
        const $jurnalInput = $('input[name="journal_code"]');

        // Fungsi AJAX untuk ambil NIS
        function generateJurnal(licenseId) {
            $.ajax({
                url: `/journals/generate-jurnal/${licenseId}`, // pastikan endpoint ini sesuai
                type: 'GET',
                success: function (response) {
                    if (response.jurnal) {
                        $jurnalInput.val(response.jurnal);
                    } else {
                        $nisInput.val('');
                    }
                },
                error: function () {
                    console.error("Gagal mengambil Jurnal.");
                    $jurnalInput.val('');
                }
            });
        }

        // Event saat lisensi dipilih
        $licenseSelect.on('change', function () {
            const licenseId = $(this).val();
            if (licenseId) {
                generateJurnal(licenseId);
            } else {
                $jurnalInput.val('');
            }
        });

        // Untuk halaman edit: generate NIS hanya kalau input masih kosong
        if ($licenseSelect.val() && !$jurnalInput.val()) {
            generateJurnal($licenseSelect.val());
        }

    });
</script>

@endsection


