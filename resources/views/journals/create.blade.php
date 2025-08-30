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
    <form action="{{ route('journals.store') }}" method="POST" enctype="multipart/form-data">
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

        <div class="col-md-4 mb-3">
            <label for="enclosure" class="form-label">Lampiran</label>
            <input type="file" name="enclosure" class="form-control">
            @error('enclosure')
                <small class="text-danger">{{ $message }}</small>
            @enderror
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
    /** 🔹 Inisialisasi Select2 global */
    $('.select2').select2({ placeholder: "-- Pilih --", width: '100%' });

    let accountsData = [];

    /** ======================================================
     *  1. Ambil akun & kode jurnal berdasarkan lisensi aktif
     * ====================================================== */
    function loadAccountsByLicense(licenseId) {
        if (!licenseId) return;

        // Ambil akun
        $.get(`/get-accounts-by-license/${licenseId}`, function (data) {
            accountsData = data;

            // Update semua dropdown akun yang sudah ada
            $('.account-select').each(function () {
                renderAccountOptions($(this));
            });
        });

        // Ambil kode jurnal terbaru
        $('#journal_code').val('Loading...');
        $.get(`/journals/next-code/${licenseId}`)
            .done(function (res) {
                $('#journal_code').val(res.next_code);
            })
            .fail(function () {
                $('#journal_code').val('');
                alert('Gagal mengambil kode jurnal');
            });
    }

    /** ======================================================
     *  2. Render akun ke dropdown
     * ====================================================== */
    function renderAccountOptions($select) {
        $select.empty().append('<option value="">-- Pilih Akun --</option>');

        $.each(accountsData, function (_, account) {
            $select.append(`
                <option value="${account.id}" 
                        data-code="${account.account_code}" 
                        data-person-type="${account.person_type}">
                    ${account.account_code} - ${account.account_name}
                </option>
            `);
        });

        $select.select2({ placeholder: "-- Pilih Akun --", width: '100%' });
    }

    /** ======================================================
     *  3. Render dropdown user sesuai person_type
     * ====================================================== */
    function renderUserOptions($select, type) {
        $select.empty().append('<option value="">-- Pilih User --</option>');

        let url = '';
        if (type === "student") url = '/get-students';
        else if (type === "employee") url = '/get-employees';
        else if (type === "licenseholders") url = '/get-licenseholders';
        else if (type === "license") url = '/get-licenses';

        if (url) {
            $.get(url, function (data) {
                $.each(data, function (_, user) {
                    $select.append(`<option value="${user.id}">${user.name}</option>`);
                });
                initSelect2WithCreate($select, type);
            });
        } else {
            // Jika person_type tidak cocok, tetap aktifkan fitur input manual
            initSelect2WithCreate($select, type);
        }
    }

    /** ======================================================
     *  4. Select2 user dengan fitur input manual
     * ====================================================== */
    function initSelect2WithCreate($select, type) {
        $select.select2({
            placeholder: "-- Input manual jika tidak ada User --",
            width: '100%',
            tags: true,
            createTag: function (params) {
                let term = $.trim(params.term);
                if (term === '') return null;
                return { id: term, text: term, newOption: true };
            },
            templateResult: function (data) {
                let $result = $("<span></span>").text(data.text);
                if (data.newOption) {
                    $result.append(" <em>(tekan Enter)</em>");
                }
                return $result;
            }
        });

        $select.on('select2:select', function (e) {
            let data = e.params.data;
            if (data.newOption) {
                console.log("Input manual user:", data.text);
            }
        });
    }

    /** ======================================================
     *  5. Saat ganti lisensi → refresh akun & kode jurnal
     * ====================================================== */
    $('#license_id').on('change', function () {
        const licenseId = $(this).val();
        $('#activeLicenseId').val(licenseId);
        loadAccountsByLicense(licenseId);
    });

    /** ======================================================
     *  6. Load awal saat halaman dibuka
     * ====================================================== */
    const selectedLicense = $('#license_id').length
        ? $('#license_id').val()
        : $('#activeLicenseId').val();
    loadAccountsByLicense(selectedLicense);

    /** ======================================================
     *  7. Tambah baris baru
     * ====================================================== */
    $('#add-row').click(function () {
        const rowCount = $('#detail-rows tr').length;
        const newRow = `
            <tr>
                <td>
                    <select name="details[${rowCount}][account_id]" 
                            class="form-select account-select" 
                            data-row="${rowCount}" required></select>
                </td>
                <td><input type="text" name="details[${rowCount}][description]" class="form-control"></td>
                <td>
                    <select name="details[${rowCount}][person]" 
                            class="form-select user-select" 
                            data-row="${rowCount}"></select>
                </td>
                <td><input type="number" step="0.01" name="details[${rowCount}][debit]" class="form-control debit-input"></td>
                <td><input type="number" step="0.01" name="details[${rowCount}][credit]" class="form-control credit-input"></td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger remove-row" title="Hapus">
                        <i class="ti ti-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        $('#detail-rows').append(newRow);

        // Render opsi akun
        const $newAccountSelect = $('#detail-rows tr:last .account-select');
        renderAccountOptions($newAccountSelect);

        // Siapkan select user manual
        const $newUserSelect = $('#detail-rows tr:last .user-select');
        initSelect2WithCreate($newUserSelect, null);
    });

    /** ======================================================
     *  8. Hapus baris
     * ====================================================== */
    $(document).on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
        calculateSubtotals();
    });

    /** ======================================================
     *  9. Daftar akun debit & kredit only
     * ====================================================== */
    const debitOnlyAccounts = new Set([
        "151","152","153","154","155","121","122","123","124","110",
        "131","132","141","142","144","304","305"
    ]);

    const creditOnlyAccounts = new Set([
        "301","302","303","161","162","163"
    ]);

    /** ======================================================
     * 10. Saat ganti akun → render user + disable debit/kredit
     * ====================================================== */
    $(document).on('change', '.account-select', function () {
        const $row = $(this).closest('tr');
        const personType = $(this).find(':selected').data('person-type');
        const accountCode = String($(this).find(':selected').data('code') || "");

        // Render user sesuai type
        renderUserOptions($row.find('.user-select'), personType);

        // Reset input debit & kredit
        const $debit = $row.find('.debit-input');
        const $credit = $row.find('.credit-input');
        $debit.prop('disabled', false).val('');
        $credit.prop('disabled', false).val('');

        if (debitOnlyAccounts.has(accountCode)) {
            $credit.prop('disabled', true).val('');
        } else if (creditOnlyAccounts.has(accountCode)) {
            $debit.prop('disabled', true).val('');
        } else {
            // Fallback by digit pertama
            const firstDigit = accountCode.charAt(0);
            if (firstDigit === "2" || firstDigit === "4") {
                $debit.prop('disabled', true).val('');
            } else if (firstDigit === "5" || firstDigit === "6") {
                $credit.prop('disabled', true).val('');
            }
        }
    });

    /** ======================================================
     * 11. Hitung subtotal otomatis
     * ====================================================== */
    function calculateSubtotals() {
        let totalDebit = 0, totalCredit = 0;

        $('#detail-rows tr').each(function() {
            const debit  = parseFloat($(this).find('.debit-input').val()) || 0;
            const credit = parseFloat($(this).find('.credit-input').val()) || 0;

            totalDebit  += debit;
            totalCredit += credit;
        });

        $('#subtotal-debit').text(totalDebit.toLocaleString('id-ID'));
        $('#subtotal-credit').text(totalCredit.toLocaleString('id-ID'));

        if (totalDebit === totalCredit && totalDebit > 0) {
            $('#balance-status').text('✅ Balance').css('color', 'green');
        } else {
            $('#balance-status').text('❌ Tidak Balance').css('color', 'red');
        }
    }

    /** ======================================================
     * 12. Event listener input debit/kredit
     * ====================================================== */
    $(document).on('input', '.debit-input, .credit-input', function() {
        let val = parseFloat($(this).val()) || 0;
        $(this).val(Math.abs(val));

        // Pastikan hanya satu kolom terisi
        if ($(this).hasClass('debit-input')) {
            $(this).closest('tr').find('.credit-input').val('');
        } else {
            $(this).closest('tr').find('.debit-input').val('');
        }

        calculateSubtotals();
    });

    /** ======================================================
     * 13. Validasi submit form
     * ====================================================== */
    $('form').on('submit', function (e) {
        let totalDebit = 0, totalCredit = 0;

        $('#detail-rows tr').each(function() {
            totalDebit  += parseFloat($(this).find('.debit-input').val()) || 0;
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
    $(document).ready(function () {
        $('.select2').select2({ placeholder: "-- Pilih --", width: '100%' });

        let accountsData = [];

        /** 🔹 Ambil akun berdasarkan lisensi aktif */
        function loadAccountsByLicense(licenseId) {
            if (!licenseId) return;

            $.get(`/get-accounts-by-license/${licenseId}`, function (data) {
                accountsData = data;

                // Update select akun yang sudah ada
                $('.account-select').each(function () {
                    renderAccountOptions($(this));
                });
            });

            // Ambil kode jurnal terbaru
            $('#journal_code').val('Loading...');
            $.get(`/journals/next-code/${licenseId}`, function (res) {
                $('#journal_code').val(res.next_code);
            }).fail(function () {
                $('#journal_code').val('');
                alert('Gagal mengambil kode jurnal');
            });
        }

        /** 🔹 Render akun ke dropdown */
        // const hiddenAccounts = ['1', '100', '110', '120', '130', '140', '150', '160', '2', '200', '210', '220', '3', '300', 
        //     '4', '400', '410', '420', '430', '450', '5', '500', '510', '520', '550', '560', '600', '610' 
        // ];

        function renderAccountOptions($select) {
            $select.empty().append('<option value="">-- Pilih Akun --</option>');
            $.each(accountsData, function (_, account) {
                // if (hiddenAccounts.includes(account.account_code)) {
                //     return; // lanjut ke akun berikutnya
                // }

                $select.append(
                    `<option value="${account.id}" 
                            data-code="${account.account_code}" 
                            data-person-type="${account.person_type}">
                        ${account.account_code} - ${account.account_name}
                    </option>`
                );
            });
            $select.select2({ placeholder: "-- Pilih Akun --", width: '100%' });
        }

        /** 🔹 Render user otomatis sesuai person_type */
        function renderUserOptions($select, type) {
            $select.empty().append('<option value="">-- Pilih User --</option>');

            let url = '';
            if (type === "student") url = '/get-students';
            else if (type === "employee") url = '/get-employees';
            else if (type === "licenseholders") url = '/get-licenseholders';
            else if (type === "license") url = '/get-licenses';

            if (url) {
                $.get(url, function (data) {
                    $.each(data, function (_, user) {
                        $select.append(`<option value="${user.id}">${user.name}</option>`);
                    });
                    initSelect2WithCreate($select, type);
                    // $select.select2({ placeholder: "-- Pilih User --", width: '100%' });
                });
            } else {
                initSelect2WithCreate($select, type);
                // $select.select2({ placeholder: "-- Pilih User --", width: '100%' });
            }
        }

        function initSelect2WithCreate($select, type) {
            $select.select2({
                placeholder: "-- Input manual jika tidak ada User --",
                width: '100%',
                tags: true,
                createTag: function (params) {
                    let term = $.trim(params.term);
                    if (term === '') return null;

                    return {
                        id: term,
                        text: term,
                        newOption: true
                    };
                },
                templateResult: function (data) {
                    let $result = $("<span></span>").text(data.text);
                    if (data.newOption) {
                        $result.append(" <em>(tekan Enter)</em>");
                    }
                    return $result;
                }
            });

            $select.on('select2:select', function (e) {
                let data = e.params.data;

                if (data.newOption) {
                    console.log("Person manual:", data.text);
                }
            });
        }


        /** 🔹 Saat Super Admin ganti lisensi manual */
        $('#license_id').on('change', function () {
            const licenseId = $(this).val();
            $('#activeLicenseId').val(licenseId);
            loadAccountsByLicense(licenseId);
        });

        /** 🔹 Load akun awal sesuai lisensi aktif */
        const selectedLicense = $('#license_id').length
            ? $('#license_id').val()
            : $('#activeLicenseId').val();
        loadAccountsByLicense(selectedLicense);

        /** 🔹 Saat ganti akun, render user otomatis */
        $(document).on('change', '.account-select', function () {
            const $row = $(this).closest('tr');
            const personType = $(this).find(':selected').data('person-type');
            const accountCode = $(this).find(':selected').data('code') || "";

            // Render user sesuai type
            renderUserOptions($row.find('.user-select'), personType);

            // Reset input debit & kredit
            $row.find('.debit-input').prop('disabled', false).val('');
            $row.find('.credit-input').prop('disabled', false).val('');

            if (debitOnlyAccounts.includes(accountCode)) {
                $row.find('.credit-input').prop('disabled', true).val('');
            } 
            else if (creditOnlyAccounts.includes(accountCode)) {
                $row.find('.debit-input').prop('disabled', true).val('');
            } 
            else {
                // fallback pakai digit pertama
                const firstDigit = accountCode.charAt(0);
                if (firstDigit === "2", "4") {
                    $row.find('.debit-input').prop('disabled', true).val('');
                } else if (firstDigit === "5") {
                    $row.find('.credit-input').prop('disabled', true).val('');
                }
            }
        });

        /** 🔹 Hitung subtotal otomatis */
        function calculateSubtotals() {
            let totalDebit = 0, totalCredit = 0;
            $('#detail-rows tr').each(function() {
                const debit  = parseFloat(($(this).find('.debit-input').val() || '0').replace(/,/g, '')) || 0;
                const credit = parseFloat(($(this).find('.credit-input').val() || '0').replace(/,/g, '')) || 0;

                totalDebit  += debit;
                totalCredit += credit;
            });

            $('#subtotal-debit').text(totalDebit.toLocaleString('id-ID'));
            $('#subtotal-credit').text(totalCredit.toLocaleString('id-ID'));

            if (totalDebit === totalCredit && totalDebit > 0) {
                $('#balance-status').text('✅ Balance').css('color', 'green');
            } else {
                $('#balance-status').text('❌ Tidak Balance').css('color', 'red');
            }
        }

        /** 🔹 Event listener input debit/kredit */
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

        /** 🔹 Validasi submit */
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
</script> --}}






