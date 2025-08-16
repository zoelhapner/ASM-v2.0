<div class="dropdown">
  <a href="#" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">⋮</a>
  <div class="dropdown-menu">
    <a href="{{ route('roles.edit', $row->id) }}" class="dropdown-item">✏️ Ubah</a>
    <button class="dropdown-item text-danger delete-role" data-id="{{ $row->id }}">
    🗑️ Hapus
</button>
  </div>
</div>
