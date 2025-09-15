@can('jurnal.lihat')
    <a href="{{ route('journals.show', $row->id) }}" 
       class="btn btn-info btn-sm" title="Detail">
        <i class="ti ti-eye"></i>
    </a>
@endcan

@can('jurnal.ubah')
    <a href="{{ route('journals.edit', $row->id) }}" 
       class="btn btn-warning btn-sm" title="Edit">
        <i class="ti ti-edit"></i>
    </a>
@endcan

@can('jurnal.hapus')
    <form action="{{ route('journals.destroy', $row->id) }}" 
          method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" 
                onclick="return confirm('Hapus jurnal ini?')" 
                title="Hapus">
            <i class="ti ti-trash"></i>
        </button>
        <button data-id="' . $license_holder->license_holder_id . '" class="btn btn-icon btn-sm btn-danger delete-license_holder" title="Hapus">
                                        <i class="ti ti-trash"></i>
        </button>';
    </form>
@endcan
