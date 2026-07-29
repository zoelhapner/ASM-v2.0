@extends('tablar::page')

@section('content')
<div class="page-header mb-4">
    <h2 class="page-title">Tutup Buku Tahunan</h2>
</div>

<div class="card">
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="GET" action="{{ route('periods.index') }}" class="row g-2 mb-3">

            @if(auth()->user()->hasRole('Super-Admin'))
                <div class="col-md-5">
                    <label class="form-label">Lisensi</label>
                    <select id="license_id" name="license_id" class="form-select select2">
                        <option value="">-- Semua Lisensi --</option>
                        @foreach($licenses as $license)
                            <option value="{{ $license->id }}"
                                {{ $license->id == $activeLicenseId ? 'selected' : '' }}>
                                {{ $license->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-auto d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-filter"></i> Filter
                    </button>
                </div>
            @else
                <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
            @endif

        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($periods as $p)
                    <tr>
                        <td><strong>{{ $p->year }}</strong></td>
                        <td>{{ $p->start_date }} s/d {{ $p->end_date }}</td>
                        <td>
                            @if($p->is_closed)
                                <span class="badge bg-danger">Closed</span>
                            @else
                                <span class="badge bg-success">Open</span>
                            @endif
                        </td>
                        <td>
                            @if(!$p->is_closed)
                                <form action="{{ route('periods.close') }}" method="POST" style="display:inline">
                                    @csrf
                                    <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
                                    <input type="hidden" name="year" value="{{ $p->year }}">
                                    <button type="button"
                                        class="btn btn-sm btn-danger btn-close-period"
                                        data-year="{{ $p->year }}">
                                        Tutup Buku
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('periods.reopen') }}" method="POST" style="display:inline">
                                    @csrf
                                    <input type="hidden" name="license_id" value="{{ $activeLicenseId }}">
                                    <input type="hidden" name="year" value="{{ $p->year }}">
                                    <button type="button"
                                        class="btn btn-sm btn-warning btn-reopen-period"
                                        data-year="{{ $p->year }}">
                                        Reopen
                                    </button>
                                </form>
                            @endif
                                <form action="{{ route('periods.destroy', $p->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="btn btn-sm btn-outline-dark btn-delete-period"
                                        data-id="{{ $p->id }}"
                                        data-year="{{ $p->year }}">
                                        Hapus
                                    </button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form id="closeForm" method="POST" action="{{ route('periods.close') }}">
            @csrf
            <input type="hidden" name="year" id="closeYear">
            <input type="hidden" name="license_id" id="closeLicense">
        </form>

        <form id="reopenForm" method="POST" action="{{ route('periods.reopen') }}">
            @csrf
            <input type="hidden" name="year" id="reopenYear">
            <input type="hidden" name="license_id" id="reopenLicense">
        </form>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="license_id" id="deleteLicense">
        </form>
    </div>
</div>
@endsection
@push('js')
<script>
    $('.select2').select2({
        width: '100%'
    });

    document.querySelectorAll('.btn-close-period').forEach(btn => {

        btn.addEventListener('click', function() {

            let year = this.dataset.year;

            Swal.fire({
                title: 'Tutup Buku?',
                text: 'Yakin tutup buku tahun ' + year + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tutup',
                cancelButtonText: 'Batal'
            }).then(result => {

                if (result.isConfirmed) {
                    document.getElementById('closeYear').value = year;
                    document.getElementById('closeLicense').value =
                        document.getElementById('license_id').value;
                    document.getElementById('closeForm').submit();
                }

            });

        });

    });

    document.querySelectorAll('.btn-reopen-period').forEach(btn => {

        btn.addEventListener('click', function() {

            let year = this.dataset.year;

            Swal.fire({
                title: 'Reopen Periode?',
                text: 'Buka kembali tahun ' + year + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Reopen',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    document.getElementById('reopenYear').value = year;
                    document.getElementById('reopenLicense').value =
                        document.getElementById('license_id').value;
                    document.getElementById('reopenForm').submit();
                }

            });

        });

    });

    document.querySelectorAll('.btn-delete-period').forEach(btn => {

        btn.addEventListener('click', function() {

            let id = this.dataset.id;
            let year = this.dataset.year;

            Swal.fire({
                title: 'Hapus Periode?',
                text: 'Periode tahun ' + year + ' akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then(result => {

                if (result.isConfirmed) {

                    let form = document.getElementById('deleteForm');

                    form.action = '/periods/' + id;
                    document.getElementById('deleteLicense').value =
                        document.getElementById('license_id').value;
                    form.submit();
                }

            });

        });

    });
</script>
@endpush