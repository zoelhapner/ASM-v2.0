@extends('tablar::page')

@section('content')
<h2>Edit Role: {{ $role->name }}</h2>

<form action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Role Name</label>
        <input type="text" name="name" value="{{ $role->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Assign Permissions:</label><br>
        @foreach ($permissions as $permission)
        <label>
            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
            {{ $permission->name }}
        </label><br>
        @endforeach
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection
