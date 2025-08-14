<div class="card">
    <div class="card-header">
        <h3 class="card-title">Riwayat Pendidikan</h3>
    </div>
    <div class="card-body">
        @if ($employee->educations && $employee->educations->count())
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenjang</th>
                            <th>Nama Sekolah</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Lulus</th>
                            <th>Apakah Lulus?</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee->educations as $index => $edu)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $edu->education_level }}</td>
                                <td>{{ $edu->institution_name }}</td>
                                <td>{{ $edu->start_year }}</td>
                                <td>{{ $edu->end_year }}</td>
                                <td>{{ $edu->readable_is_graduated }}</td>
                                <td>
                                    @if (auth()->user()->can('pendidikan-karyawan.ubah'))     
                                        <a href="{{ route('employee_educations.edit', $edu->id) }}" class="btn btn-sm btn-warning" title="Ubah">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('employee_educations.destroy', $edu->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">Belum ada data pendidikan.</p>
        @endif

        <div class="mt-4">
                @if (auth()->user()->can('pendidikan-karyawan.tambah')) 
                    <a href="{{ route('employee_educations.create') }}?employee_id={{ $employee->id }}" class="btn btn-primary text-white">
                        Tambah Data
                    </a>
                @endif
                <a href="{{ route('employees.index') }}" class="btn btn-secondary text-white">
                    Kembali ke daftar
                </a>
        </div>
    </div>    
</div>
