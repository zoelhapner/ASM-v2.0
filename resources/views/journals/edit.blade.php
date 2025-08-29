@extends('tablar::page')

@section('content')
<div class="container">
    <h1>Edit Jurnal</h1>

    <form action="{{ route('journals.update', $journal->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="row mb-3 align-items-center">
            @if(auth()->user()->hasRole('Super-Admin'))
                <div class="col-md-4 mb-3">
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

            <div class="col-md-4 mb-3">
                <label for="journal_code" class="required">No Transaksi</label>
                <input type="text" name="journal_code" 
                    class="form-control" value="{{ old('journal_code', $journal->journal_code) }}" readonly>
            </div>

            <div class="col-md-4 mb-3">
                <label for="transaction_date">Tanggal Transaksi</label>
                <input type="date" name="transaction_date" class="form-control"
                    value="{{ old('transaction_date', $journal->transaction_date) }}" required>
            </div>
        </div>

        <h4>Detail Akun</h4>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Akun</th>
                <th>Deskripsi</th>
                <th>User</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody id="detail-rows">
            @foreach ($journal->details as $i => $detail)
                <tr>
                    {{-- Pilih Akun --}}
                    <td>
                        <select name="details[{{ $i }}][account_id]" 
                                class="form-select account-select" 
                                data-row="{{ $i }}" required
                                {{ $detail->account_id ? ''}}>
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

                        {{-- Hidden input supaya tetap terkirim --}}
                        @if($detail->account_id)
                            <input type="hidden" name="details[{{ $i }}][account_id]" value="{{ $detail->account_id }}">
                        @endif
                    </td>

                    {{-- Deskripsi --}}
                    <td>
                        <input type="text" 
                            name="details[{{ $i }}][description]" 
                            class="form-control"
                            value="{{ old("details.$i.description", $detail->description) }}">
                    </td>

                    {{-- Pilih User --}}
                    <td>
                        <select name="details[{{ $i }}][person]" 
                                class="form-control select2 user-select" 
                                data-row="{{ $i }}" 
                                data-selected="{{ $detail->person ?? '' }}"
                                {{ $detail->person ? 'disabled' : '' }}>
                            <option value="">-- Pilih User --</option>
                            @php
                                if ($detail->person_type === 'student') {
                                    $users = $students;
                                } elseif ($detail->person_type === 'employee') {
                                    $users = $employees;
                                } elseif ($detail->person_type === 'license') {
                                    $users = $licenseList;
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

                        {{-- Hidden input --}}
                        @if($detail->person)
                            <input type="hidden" name="details[{{ $i }}][person]" value="{{ $detail->person }}">
                        @endif
                    </td>

                    {{-- Debit --}}
                    <td>
                        <input type="number" step="0.01" 
                            name="details[{{ $i }}][debit]" 
                            class="form-control debit-input" 
                            value="{{ old("details.$i.debit", $detail->debit) }}"
                            {{ $detail->credit ? 'disabled' : '' }}>

                        @if($detail->credit)
                            <input type="hidden" name="details[{{ $i }}][debit]" value="{{ $detail->debit }}">
                        @endif
                    </td>

                    {{-- Kredit --}}
                    <td>
                        <input type="number" step="0.01" 
                            name="details[{{ $i }}][credit]" 
                            class="form-control credit-input" 
                            value="{{ old("details.$i.credit", $detail->credit) }}"
                            {{ $detail->debit ? 'disabled' : '' }}>

                        @if($detail->debit)
                            <input type="hidden" name="details[{{ $i }}][credit]" value="{{ $detail->credit }}">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <th colspan="3">Subtotal</th>
                <th id="subtotal-debit">{{ $journal->details->sum('debit') }}</th>
                <th id="subtotal-credit">{{ $journal->details->sum('credit') }}</th>
                <th colspan="3"></th>
            </tr>
        </tfoot>
    </table>

    <div id="balance-status" class="mt-2 fw-bold text-danger">❌ Tidak Balance</div>

    <div class="col-md-6 mb-3">
            <label for="description">Keterangan</label>
            <textarea name="description" class="form-control">{{ old('description', $journal->description) }}</textarea>
    </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary text-white">Update</button>
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

    /** 🔹 Ambil akun berdasarkan lisensi aktif / manual */
    function loadAccountsByLicense() {
        // Kalau Super Admin, ambil dari dropdown manual
        let licenseId = $('#license_id').length
            ? $('#license_id').val()
            : $('#activeLicenseId').val(); // selain Super Admin, ambil dari session navbar

        if (!licenseId) {
            console.warn("⚠️ License ID tidak ditemukan!");
            return;
        }

        // Ambil daftar akun sesuai lisensi aktif
        $.get(`/get-accounts-by-license/${licenseId}`, function (data) {
            accountsData = data;

            // Render ulang semua dropdown akun yang sudah ada
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
    function renderAccountOptions($select) {
        $select.empty().append('<option value="">-- Pilih Akun --</option>');
        $.each(accountsData, function (_, account) {
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
        else if (type === "license") url = '/get-licenses';

        if (url) {
            $.get(url, function (data) {
                $.each(data, function (_, user) {
                    $select.append(`<option value="${user.id}">${user.name}</option>`);
                });
                $select.select2({ placeholder: "-- Pilih User --", width: '100%' });
            });
        } else {
            $select.select2({ placeholder: "-- Pilih User --", width: '100%' });
        }
    }

    /** 🔹 Saat Super Admin ganti lisensi manual */
    $('#license_id').on('change', function () {
        $('#activeLicenseId').val($(this).val());
        loadAccountsByLicense();
    });

    /** 🔹 Load akun awal sesuai lisensi aktif / session */
    loadAccountsByLicense();

    /** 🔹 Tambah baris baru */
    // $('#add-row').click(function () {
    //     const rowCount = $('#detail-rows tr').length;
    //     const newRow = `
    //         <tr>
    //             <td>
    //                 <select name="details[${rowCount}][account_id]" 
    //                         class="form-select account-select" 
    //                         data-row="${rowCount}" required></select>
    //             </td>
    //             <td><input type="text" name="details[${rowCount}][description]" class="form-control"></td>
    //             <td>
    //                 <select name="details[${rowCount}][person]" 
    //                         class="form-select user-select" 
    //                         data-row="${rowCount}"></select>
    //             </td>
    //             <td><input type="number" step="0.01" name="details[${rowCount}][debit]" class="form-control debit-input"></td>
    //             <td><input type="number" step="0.01" name="details[${rowCount}][credit]" class="form-control credit-input"></td>
    //             <td><button type="button" class="btn btn-sm btn-danger remove-row" title="Hapus">
    //                     <i class="ti ti-trash"></i>
    //                 </button>
    //             </td>
    //         </tr>
    //     `;

    //     $('#detail-rows').append(newRow);

    //     // Isi opsi akun
    //     const $newAccountSelect = $('#detail-rows tr:last .account-select');
    //     renderAccountOptions($newAccountSelect);
    // });

    // /** 🔹 Hapus baris */
    // $(document).on('click', '.remove-row', function () {
    //     $(this).closest('tr').remove();
    //     calculateSubtotals();
    // });

    // /** 🔹 Saat ganti akun, render user otomatis */
    // $(document).on('change', '.account-select', function () {
    //     const personType = $(this).find(':selected').data('person-type');
    //     const $row = $(this).closest('tr').find('.user-select');
    //     renderUserOptions($row, personType);
    // });

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
</script>


@endsection


{{-- <script>
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
            if (source === 'student') data = studentOptions;
            if (source === 'employee') data = employeeOptions;
            if (source === 'Pemilik Lisensi') data = licenseHolderOptions;
            if (source === 'license') data = licenseOptions;

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
        if (['student', 'employee', 'Pemilik Lisensi', 'license'].includes(personType)) {
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

            if (totalDebit === totalCredit && totalDebit > 0) {
                $('#balance-status').text('✅ Balance').css('color', 'green');
            } else {
                $('#balance-status').text('❌ Tidak Balance').css('color', 'red');
            }
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