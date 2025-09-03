@extends('tablar::page')

@section('content')
<div class="container">
    <h1>Daftar Jurnal</h1>

    <a href="{{ route('journals.create') }}" class="btn btn-primary text-white mb-3">Tambah Jurnal</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
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
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#journals-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('journals.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'license_type', name: 'license.license_type' },
            { data: 'license_name', name: 'license.name' },
            { data: 'journal_code', name: 'journal_code' },
            { data: 'transaction_date', name: 'transaction_date' },
            { data: 'creator', name: 'creator.name', orderable: false, searchable: false },
            { data: 'actions', name: 'actions', orderable: false, searchable: false },
        ],
        order: [[4, 'desc']],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
        }
    });
});
</script>
@endpush
