@extends('tablar::page')

@section('content')
<div class="container">
    <h2>Tambah Role Baru</h2>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Role</label>
            <input type="text" name="name" class="form-control" placeholder="Contoh: admin, guru" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Permission untuk Role ini:</label>
            <div class="row">
                @foreach ($permissions as $permission)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                   class="form-check-input" id="perm-{{ $permission->id }}">
                            <label class="form-check-label" for="perm-{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Role</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
