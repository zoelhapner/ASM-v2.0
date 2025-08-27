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


    {{-- Form --}}
    <form action="{{ route('journals.store') }}" method="POST">
        @csrf

            <div class="row mb-3 align-items-center">
                {{-- Filter Lisensi (hanya untuk Super Admin) --}}
                @if(auth()->user()->hasRole('Super-Admin'))
                    <div class="col-md-4 mb-3">
                        <label for="license_id" class="form-label required">Filter Lisensi</label>
                        <select name="license_id" id="license_id" class="form-select select2" required>
                            <option value="">-- Pilih Lisensi --</option>
                            @foreach ($licenses as $license)
                                <option value="{{ $license->id }}" 
                                    {{ $activeLicenseId == $license->id ? 'selected' : '' }}>
                                    {{ $license->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    {{-- Kalau bukan Super Admin, tetap pakai hidden --}}
                    <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
                @endif

                {{-- No Transaksi --}}
                <div class="col-md-4 mb-3">
                    <label for="journal_code" class="required">No Transaksi</label>
                    <input type="text" id="journal_code" name="journal_code" 
                        class="form-control" value="{{ $journalCode }}" readonly>
                </div>

                {{-- Tanggal Transaksi --}}
                <div class="col-md-4 mb-3">
                    <label for="transaction_date" class="required">Tanggal Transaksi</label>
                    <input type="date" id="transaction_date" name="transaction_date" 
                        class="form-control" required>
                </div>
            </div>
  
        <h5>Detail Akun</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width:20%">Akun</th>
                        <th style="width:20%">Deskripsi</th>
                        <th style="width:20%">User</th>
                        <th style="width:10%">Debit</th>
                        <th style="width:10%">Kredit</th>
                        <th style="width:5%">Aksi</th>
                    </tr>
                </thead>
                <tbody id="detail-rows">
                    <tr>
                        <td>
                            <select name="details[0][account_id]" class="form-select select2 account-select" data-row="0" required>
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
                            <select name="details[0][person]" class="form-select select2 user-select" data-row="0">
                                <option value="">-- Pilih User --</option>
                            </select>
                        </td>
                        <td><input type="number" step="0.01" name="details[0][debit]" class="form-control debit-input"></td>
                        <td><input type="number" step="0.01" name="details[0][credit]" class="form-control credit-input"></td>
                        <td><button type="button" class="btn btn-sm btn-danger remove-row" title="Hapus">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6"><button type="button" id="add-row" class="btn btn-sm btn-primary text-white">Tambah Baris</button></td>
                    </tr>
                    <tr>
                        <th colspan="3">Subtotal</th>
                        <th id="subtotal-debit">0</th>
                        <th id="subtotal-credit">0</th>
                        <th colspan="3"></th>
                    </tr>
                </tfoot>
            </table>

            <div id="balance-status" class="mt-2 fw-bold text-danger">❌ Tidak Balance</div>

        <div class="col-md-4 mb-3">
            <label for="description">Keterangan</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        
        <div class="text-end">
            <button type="submit" class="btn btn-success text-white">Simpan</button>
        </div>

        @if(!auth()->user()->hasRole('Super-Admin'))
            <input type="hidden" id="activeLicenseId" value="{{ $activeLicenseId }}">
        @endif

    </form>
</div>
@endsection

@section('js')

<script>
$(document).ready(function () {
    $('.select2').select2({ placeholder: "-- Pilih --", width: '100%' });

    let accountsData = [];

    // Ambil akun berdasarkan lisensi aktif
    function loadAccountsByLicense(licenseId) {
        if (!licenseId) return;

        $.get('/get-accounts-by-license/' + licenseId, function (data) {
            accountsData = data;

            // Update semua select akun
            $('.account-select').each(function () {
                const $select = $(this);
                $select.empty().append('<option value="">-- Pilih Akun --</option>');
                $.each(accountsData, function (_, account) {
                    $select.append(
                        `<option value="${account.id}" data-code="${account.account_code}" data-person-type="${account.person_type}">
                            ${account.account_code} - ${account.account_name}
                        </option>`
                    );
                });
                $select.select2({ placeholder: "-- Pilih Akun --", width: '100%' });
            });
        });

        // Update kode jurnal
        $.get('/journals/next-code/' + licenseId, function (res) {
            $('#journal_code').val(res.next_code);
        }).fail(function () {
            $('#journal_code').val('');
            alert('Gagal mengambil kode jurnal');
        });
    }

    // Saat Super Admin ganti lisensi manual
    $('#license_id').on('change', function () {
        const licenseId = $(this).val();
        $('#activeLicenseId').val(licenseId); // Sync ke hidden input
        loadAccountsByLicense(licenseId);
    });

    // Load akun awal sesuai lisensi aktif
    const selectedLicense = $('#license_id').length
        ? $('#license_id').val()
        : $('#activeLicenseId').val();
    loadAccountsByLicense(selectedLicense);

    // Tambah baris baru
    $('#add-row').click(function () {
        const rowCount = $('#detail-rows tr').length;
        const newRow = `
            <tr>
                <td>
                    <select name="details[${rowCount}][account_id]" 
                            class="form-select account-select" 
                            data-row="${rowCount}" required>
                    </select>
                </td>
                <td><input type="text" name="details[${rowCount}][description]" class="form-control"></td>
                <td>
                    <select name="details[${rowCount}][person]" class="form-select user-select" data-row="${rowCount}"></select>
                </td>
                <td><input type="number" step="0.01" name="details[${rowCount}][debit]" class="form-control debit-input"></td>
                <td><input type="number" step="0.01" name="details[${rowCount}][credit]" class="form-control credit-input"></td>
                <td><button type="button" class="btn btn-sm btn-danger remove-row" title="Hapus">
                        <i class="ti ti-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        $('#detail-rows').append(newRow);

        // Isi opsi akun dari cache
        const $newAccountSelect = $('#detail-rows tr:last .account-select');
        $newAccountSelect.empty().append('<option value="">-- Pilih Akun --</option>');
        $.each(accountsData, function (_, account) {
            $newAccountSelect.append(
                `<option value="${account.id}" data-code="${account.account_code}" data-person-type="${account.person_type}">
                    ${account.account_code} - ${account.account_name}
                </option>`
            );
        });
        $newAccountSelect.select2({ placeholder: "-- Pilih Akun --", width: '100%' });
    });

    // Hapus baris
    $(document).on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
        calculateSubtotals();
    });

    // Render user otomatis
    $(document).on('change', '.account-select', function () {
        const personType = $(this).find(':selected').data('person-type');
        const row = $(this).closest('tr');
        const userSelect = row.find('.user-select');

        userSelect.empty();
        if (personType === "student") {
            @foreach($students as $student)
                userSelect.append('<option value="{{ $student->id }}">{{ $student->name }}</option>');
            @endforeach
        } else if (personType === "employee") {
            @foreach($employees as $employee)
                userSelect.append('<option value="{{ $employee->id }}">{{ $employee->name }}</option>');
            @endforeach
        } else if (personType === "license") {
            @foreach($licenses as $license)
                userSelect.append('<option value="{{ $license->id }}">{{ $license->name }}</option>');
            @endforeach
        }
        userSelect.select2({ placeholder: "-- Pilih User --", width: '100%' });
    });

    // Hitung subtotal otomatis
    function calculateSubtotals() {
        let totalDebit = 0, totalCredit = 0;
        $('#detail-rows tr').each(function() {
            totalDebit  += parseFloat($(this).find('.debit-input').val())  || 0;
            totalCredit += parseFloat($(this).find('.credit-input').val()) || 0;
        });

        $('#subtotal-debit').text(totalDebit.toLocaleString('id-ID'));
        $('#subtotal-credit').text(totalCredit.toLocaleString('id-ID'));

        if (totalDebit === totalCredit && totalDebit > 0) {
            $('#balance-status').text('✅ Balance').css('color', 'green');
        } else {
            $('#balance-status').text('❌ Tidak Balance').css('color', 'red');
        }
    }

    // Event listener input debit/kredit
    $(document).on('input', '.debit-input, .credit-input', function() {
        const val = parseFloat($(this).val());
        if (val < 0) $(this).val('');
        if ($(this).hasClass('debit-input')) {
            $(this).closest('tr').find('.credit-input').val('');
        } else {
            $(this).closest('tr').find('.debit-input').val('');
        }
        calculateSubtotals();
    });

    // Validasi submit
    $('form').on('submit', function (e) {
        let totalDebit = 0, totalCredit = 0;
        $('#detail-rows tr').each(function() {
            totalDebit  += parseFloat($(this).find('.debit-input').val())  || 0;
            totalCredit += parseFloat($(this).find('.credit-input').val()) || 0;
        });

        if (totalDebit !== totalCredit) {
            e.preventDefault();
            alert('Transaksi tidak balance! Jumlah Debit dan Kredit harus sama.');
        }
    });
});
</script>


@endsection

{{-- <script>
    $(document).ready(function() {
    $('.select2').select2({
        placeholder: "-- Pilih User --",
        // width: '100%'
    });
    });
</script>

<script>
    $('#license_id').on('change', function() {
        let licenseId = $(this).val();

        $.ajax({
            url: '/get-accounts-by-license/' + licenseId,
            type: 'GET',
            success: function(data) {
                let accountSelects = $('.account-select'); // class di dropdown akun detail
                accountSelects.empty();
                accountSelects.append('<option value="">-- Pilih Akun --</option>');
                
                $.each(data, function(key, account) {
                    accountSelects.append(
                        '<option value="'+account.id+'">'+account.account_code+' - '+account.account_name+'</option>'
                    );
                });
            }
        });
    });

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
   $(document).ready(function() {
        $(document).on('input', '.debit-input, .credit-input', function() {
            const val = parseFloat($(this).val());
            if (val < 0) $(this).val('');
            calculateSubtotals();
        });

        calculateSubtotals();
    });
</script>

{{-- // Fungsi toggle debit/credit
    // function toggleDebitCreditInputs($select) {
    //     const accountCode = $select.find(':selected').data('code') || '';
    //     const row = $select.closest('tr');
    //     const debitInput = row.find('.debit-input');
    //     const creditInput = row.find('.credit-input');

    //     if (accountCode.startsWith('1') || accountCode.startsWith('5')) {
    //         debitInput.prop('disabled', false);
    //         creditInput.prop('disabled', true).val('');
    //     } else if (accountCode.startsWith('2') || accountCode.startsWith('3') || accountCode.startsWith('4')) {
    //         debitInput.prop('disabled', true).val('');
    //         creditInput.prop('disabled', false);
    //     } else {
    //         debitInput.prop('disabled', true).val('');
    //         creditInput.prop('disabled', true).val('');
    //     }
    // } --}}




