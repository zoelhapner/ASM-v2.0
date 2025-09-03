@extends('tablar::page')

@section('content')
<div class="container-fluid">
    <h1>Daftar Jurnal</h1>

    <a href="{{ route('journals.create') }}" class="btn btn-primary text-white mb-3">Tambah Jurnal</a>

    <table id="journals-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe Lisensi</th>
                <th>Nama Lisensi</th>
                <th>No. Transaksi</th>
                <th>Tanggal Dibuat</th>
                <th>PIC</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('js')
<script>
$(function () {
    const table = $('#journals-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('journals.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'license_type', name: 'licenses.license_type' },
            { data: 'license_name', name: 'licenses.name' },
            { data: 'journal_code', name: 'accounting_journals.journal_code' },
            { data: 'transaction_date', name: 'accounting_journals.transaction_date' },
            { data: 'creator', name: 'users.name' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
