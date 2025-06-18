@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <p class="page-title">
                        Lisensi
                    </p>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                 
                        <a href=" {{ route("licenses.index") }} " class="btn btn-primary d-none d-sm-inline-block" >
                            Kembali
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-center mb-4" style="font-size: 1.4rem; font-weight: 400; font-family: 'Poppins', sans-serif;">
                                Tambah Data Lisensi
                            </p>
                        </div>

                        <div class="card-body">
                            <form class="font-normal" style="font-weight: 400; font-family: 'Poppins', sans-serif;" action="{{ route('licenses.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="license_id">ID Lisensi:</label>
                                    <input type="text" class="form-control @error('license_id') is-invalid @enderror" id="license_id" name="license_id" value="{{ old('license_id') }}">
                                    @error('license_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="license_type">Tipe Lisensi:</label>
                                    <select name="kode_tipe" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="fo">FO</option>
                                        <option value="so">SO</option>
                                        <option value="lo">LO</option>
                                        <option value="lc">LC</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="name">Nama:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="address">Alamat:</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                <label>Provinsi</label>
                                <select name="province_id" id="province" class="form-control" required>
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Kota</label>
                                    <select name="city_id" id="city" class="form-control" required>
                                        <option value="">-- Pilih Kota --</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Desa</label>
                                    <select name="district_id" id="district" class="form-control" required>
                                        <option value="">-- Pilih Desa --</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="postal_code">Kode Pos:</label>
                                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
                                    @error('postal_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="phone">Telepon:</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Tanggal Bergabung</label>
                                    <input type="date" name="join_date" class="form-control" required
                                        value="{{ old('join_date') }}"
                                        pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Tanggal Expired</label>
                                    <input type="date" name="expired_date" class="form-control" required
                                        value="{{ old('expired_date') }}"
                                        pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="contract_agreement_number">nomor Aqad:</label>
                                    <input type="text" class="form-control @error('contract_agreement_number') is-invalid @enderror" id="contract_agreement_number" name="contract_agreement_number" value="{{ old('contract_agreement_number') }}">
                                    @error('contract_agreement_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="expired">Expired</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Tipe Bangunan</label>
                                    <select name="building_type" class="form-control" required>
                                        <option value="">-- Pilih Tipe --</option>
                                        <option value="1">Rukan</option>
                                        <option value="2">Residence</option>
                                        <option value="3">Ruko</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Status Bangunan</label>
                                    <select name="building_status" class="form-control" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1">Milik</option>
                                        <option value="2">Sewa</option>
                                        <option value="3">Lain-Lain</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Tanggal Expired Sewa Gedung</label>
                                    <input type="date" name="building_rent_expired_date" class="form-control" required
                                        value="{{ old('building_rent_expired_date') }}"
                                        pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="building_area">luas ruangan<code>*)</code></label>
                                    <input type="text" name="building_area" id="building_area" class="form-control @error('building_area') is-invalid @enderror" value="{{old('building_area')}}" required>
                                    @error('building_area')<div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Kondisi Gedung</label>
                                    <select name="building_condition" class="form-control" required>
                                        <option value="">-- Pilih Kondisi --</option>
                                        <option value="1">Baik</option>
                                        <option value="2">Cukup</option>
                                        <option value="3">Tidak Baik</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label>Gedung Punya AC</label>
                                    <select name="building_has_ac" class="form-control" required>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="instagram">Instagram:</label>
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram') }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="facebook_page">Halaman facebook:</label>
                                    <input type="text" class="form-control @error('facebook_page') is-invalid @enderror" id="facebook_page" name="facebook_page" value="{{ old('facebook_page') }}">
                                    @error('facebook_page')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="tiktok">Tiktok:</label>
                                    <input type="text" class="form-control @error('tiktok') is-invalid @enderror" id="tiktok" name="tiktok" value="{{ old('tiktok') }}">
                                    @error('tiktok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="youtube">Youtube:</label>
                                    <input type="text" class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{ old('youtube') }}">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="google_maps">Google Maps:</label>
                                    <input type="text" class="form-control @error('google_maps') is-invalid @enderror" id="google_maps" name="google_maps" value="{{ old('google_maps') }}">
                                    @error('google_maps')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-5 col-5 mt-0 ml-5">
                                    <label for="landing_page_student_registration">Landing Page:</label>
                                    <input type="text" class="form-control @error('landing_page_student_registration') is-invalid @enderror" id="landing_page_student_registration" name="landing_page_student_registration" value="{{ old('landing_page_student_registration') }}">
                                    @error('landing_page_student_registration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$('#province').on('change', function() {
    let id = $(this).val();
    $('#city').html('');
    $('#district').html('');
    if (id) {
        $.get('/api/cities/' + id, function(data) {
            $('#city').append('<option value="">-- Select City --</option>');
            $.each(data, function(i, city) {
                $('#city').append('<option value="'+city.id+'">'+city.name+'</option>');
            });
        });
    }
});

$('#city').on('change', function() {
    let id = $(this).val();
    $('#district').html('');
    if (id) {
        $.get('/api/districts/' + id, function(data) {
            $('#district').append('<option value="">-- Select District --</option>');
            $.each(data, function(i, district) {
                $('#district').append('<option value="'+district.id+'">'+district.name+'</option>');
            });
        });
    }
});
</script>
@endpush

