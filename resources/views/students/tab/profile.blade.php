<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            {{-- Foto & Nama --}}
            <div class="d-flex align-items-center mb-4">
                @if ($student->photo)
                    <span class="avatar avatar-xl me-3 rounded" style="background-image: url('{{ asset('storage/photos/' . $student->photo) }}')"></span>
                @else
                    <span class="avatar avatar-xl me-3 avatar-rounded bg-secondary-lt">?</span>
                @endif
                <div>
                    <h3 class="card-title mb-1">
                        {{ $student->fullname }}
                        @if($student->nickname)
                            <span class="text-muted">({{ $student->nickname }})</span>
                        @endif
                    </h3>
                    <div class="text-muted">{{ $student->readable_gender ?? '-' }}</div>
                </div>
            </div>

            {{-- <pre>{{ dd($student) }}</pre> --}}

           {{-- Informasi Pribadi --}}
            <h4 class="subheader">🧾 Informasi Pribadi</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Lisensi:</span>
                             {{ $student->license->name ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">NIS :</span> {{ $student->nis ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Agama :</span> {{ $student->religion->name ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Tempat Lahir :</span> {{ $student->birth_place ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Tanggal Lahir:</span> {{ $student->birth_date_formatted ?? '-' }}
                        </div>
                        

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Nama Ayah:</span> {{ $student->father_name ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Nomor Hp Ayah:</span> {{ $student->father_phone ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Nama Bunda:</span> {{ $student->mother_name ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Nomor Hp Bunda:</span> {{ $student->mother_phone ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Nomor Hp Siswa:</span> {{ $student->student_phone ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="subheader">🧾 Keterangan Domisili</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Provinsi :</span> {{ $student->province->name ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Kabupaten/Kota :</span> {{ $student->city->name ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Kode Pos :</span> {{ $student->postalCode->postal_code ?? '-' }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Kecamatan :</span> {{ $student->district->name ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Desa :</span> {{ $student->subDistrict->name ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Alamat Lengkap :</span> {{ $student->address ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="subheader">🧾 Keterangan Tambahan</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Asal Sekolah :</span> {{ $student->previous_school ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Kelas :</span> {{ $student->grade ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Status :</span> {{ $student->status ?? '-' }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Tau Darimana :</span> {{ $student->readable_where_know ?? '-' }}
                        </div>
                        <div class="list-group-item">
                            <span class="text-secondary fw-normal">Tanggal Pendaftaran :</span> {{ $student->registered_date_formatted ?? '-' }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Aksi --}}
            <div class="mt-4">
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                    Edit Profile
                </a>
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</div>