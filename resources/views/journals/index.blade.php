@extends('tablar::page')

@section('content')
<div class="container">
    <h1>Daftar Jurnal</h1>

    <a href="{{ route('journals.create') }}" class="btn btn-primary text-white mb-3">Tambah Jurnal</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipe Lisensi</th>
                <th>Nama Lisensi</th>
                <th>No. Transaksi</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>PIC</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($journals as $journal)
                <tr>
                    <td>{{ $journal->license ? $journal->license->license_type : '-' }}</td>
                    <td>{{ $journal->license ? $journal->license->name : '-' }}</td>
                    <td>
                        <a href="{{ route('journals.show', $journal->id) }}" class="text-decoration-none fw-bold text-primary">
                            {{ $journal->journal_code }}
                        </a>
                    </td>
                    <td>{{ $journal->transaction_date }}</td>
                    <td>{{ $journal->details->description }}</td>
                    <td>
                            @if($journal->creator)
                                {{ $journal->creator->name }}
                            @else
                                <small class="fst-italic text-muted">dibuat oleh sistem</small>
                            @endif
                    </td>
                    <td>
                        @can('jurnal.lihat')
                            <a href="{{ route('journals.show', $journal->id) }}" class="btn btn-info btn-sm" title="Detail">
                                <i class="ti ti-eye"></i>
                            </a>
                        @endcan
                        @can('jurnal.ubah')
                            <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="ti ti-edit"></i>
                            </a>
                        @endcan
                        @can('jurnal.hapus')
                            <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus jurnal ini?')" title="Hapus">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </td>

                </tr>
            @empty
                <tr><td colspan="5">Belum ada jurnal.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
