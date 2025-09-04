@extends('tablar::page')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Laporan Kas</h3>

    <!-- Filter Box -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="row g-3 align-items-end">
                <!-- Lisensi -->
                <div class="col-md-3">
                    <label for="license_id" class="form-label">Lisensi</label>
                    <select id="license_id" class="form-control">
                        <option value="">Semua Lisensi</option>
                        @foreach($licenses as $license)
                            <option value="{{ $license->id }}">{{ $license->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Akun -->
                <div class="col-md-3">
                    <label for="account_id" class="form-label">Akun</label>
                    <select id="account_id" class="form-control">
                        <option value="">Semua Akun</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">
                                {{ $account->account_code }} - {{ $account->account_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Dari Tanggal -->
                <div class="col-md-2">
                    <label for="from_date" class="form-label">Dari</label>
                    <input type="date" id="from_date" class="form-control">
                </div>

                <!-- Sampai Tanggal -->
                <div class="col-md-2">
                    <label for="to_date" class="form-label">Sampai</label>
                    <input type="date" id="to_date" class="form-control">
                </div>

                <!-- Tombol -->
                <div class="col-md-2 d-flex">
                    <button id="filter" class="btn btn-primary me-2 w-50">Filter</button>
                    <button id="reset" class="btn btn-secondary w-50">Reset</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Box -->
    <div class="mb-3">
        <input type="text" id="global_search" class="form-control" placeholder="Cari rincian, akun, atau user...">
    </div>

    <!-- Table -->
    <div class="card">
        <div class="card-body">
            <table id="kasTable" class="table table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Rincian</th>
                        <th>Kode Akun</th>
                        <th>Akun</th>
                        <th>User</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="6" class="text-end">Grand Total:</th>
                        <th id="grand_total" class="text-end">Rp 0</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function() {
    let table = $('#kasTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'https://asm.aharightbrain.com/reports',
            type: 'GET',
            xhrFields: {
                withCredentials: true 
            },
            error: function (xhr, error, thrown) {
                console.error("❌ AJAX Error:", error, thrown);
                console.log("📄 Response Text:", xhr.responseText);
                alert("Gagal memuat data! Cek console untuk detail error.");
            } 
            data: function(d) {
                d.license_id = $('#license_id').val();
                d.account_id = $('#account_id').val();
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
                d.search = $('#global_search').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'transaction_date', name: 'transaction_date' },
            { data: 'description', name: 'description' },
            { data: 'account_code', name: 'account_code' },
            { data: 'account_name', name: 'account_name' },
            { data: 'creator', name: 'creator' },
            { data: 'total', name: 'total', render: $.fn.dataTable.render.number(',', '.', 0, 'Rp '), className: "text-end" }
        ],
        drawCallback: function(settings) {
            let json = this.api().ajax.json();
            if (json && json.totalAll !== undefined) {
                $('#grand_total').html('Rp ' + parseInt(json.totalAll).toLocaleString('id-ID'));
            } else {
                $('#grand_total').html('Rp 0');
            }
        }
    });

    // Global search realtime
    $('#global_search').keyup(function() {
        table.search($(this).val()).draw();
    });

    // Trigger filter
    $('#filter').click(function() {
        table.ajax.reload();
    });

    // Reset filter
    $('#reset').click(function() {
        $('#license_id').val('');
        $('#account_id').val('');
        $('#from_date').val('');
        $('#to_date').val('');
        $('#global_search').val('');
        table.ajax.reload();
    });
});
</script>
@endpush


