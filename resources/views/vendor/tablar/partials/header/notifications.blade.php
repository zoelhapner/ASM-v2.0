{{-- @auth
<div class="nav-item dropdown d-none d-md-flex me-3">
    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
        <!-- Icon Bell -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"/>
            <path d="M9 17v1a3 3 0 0 0 6 0v-1"/>
        </svg>
        @if($notifications->count() > 0)
            <span class="badge bg-red">{{ $notifications->count() }}</span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Notifikasi Lisensi</h3>
            </div>
            <div class="list-group list-group-flush list-group-hoverable">
                @forelse ($notifications as $notif)
    <form action="{{ route('notifications.read', $notif->id) }}" method="POST" class="list-group-item m-0 p-0 border-0">
        @csrf
        @method('PATCH')
        <button type="submit" class="w-100 text-start border-0 bg-transparent px-3 py-2">
            <div class="row align-items-start">
                <div class="col-auto">
                    <span class="status-dot status-dot-animated bg-red d-block" style="width: 8px; height: 8px;"></span>
                </div>
                <div class="col text-truncate">
                    <div class="text-body fw-bold">{{ $notif->title ?? 'Pemberitahuan' }}</div>
                    <div class="text-muted small text-truncate mt-1">{{ $notif->message }}</div>
                </div>
                <div class="col-auto text-muted small">
                    {{ $notif->created_at->diffForHumans() }}
                </div>
            </div>
        </button>
    </form>
@empty
    <div class="list-group-item text-center text-muted">
        Tidak ada notifikasi.
    </div>
@endforelse

<form action="{{ route('notifications.read_all') }}" method="POST" class="text-center mb-2">
    @csrf
    <button type="submit" class="btn btn-link text-muted small">Tandai semua sebagai sudah dibaca</button>
</form>

            </div>
        </div>
    </div>
</div>
@endauth

 --}}
@auth
<div class="nav-item dropdown d-none d-md-flex me-3 position-relative">
    <a href="#" class="nav-link px-0 position-relative" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
        <!-- Icon Bell -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"/>
            <path d="M9 17v1a3 3 0 0 0 6 0v-1"/>
        </svg>

        @if($notifications->count() > 0)
            <span class="position-absolute top-0 start-100 translate-middle bg-red text-white fw-bold"
                style="font-size: 0.9rem; width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                {{ $notifications->count() }}
            </span>
        @endif
    </a>

    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card notification-dropdown" style="min-width: 350px;">
        <div class="card m-0">
            <div class="card-header py-2">
                <h3 class="card-title mb-0" style="font-size: 1rem;">Notifikasi Lisensi</h3>
            </div>
            <div class="list-group list-group-flush list-group-hoverable" style="max-height: 300px; overflow-y: auto;">
                @forelse ($notifications as $notif)
                    <form action="{{ route('notifications.read', $notif->id) }}" method="POST" class="list-group-item m-0 p-0 border-0">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="w-100 text-start border-0 bg-transparent px-3 py-2">
                            <div class="row align-items-start g-2">
                                <div class="col-auto">
                                    <span class="status-dot status-dot-animated bg-red d-block" style="width: 8px; height: 8px;"></span>
                                </div>
                                <div class="col text-truncate">
                                    <div class="text-body fw-bold">{{ $notif->title ?? 'Pemberitahuan' }}</div>
                                    <div class="text-muted small text-truncate mt-1">{{ $notif->message }}</div>
                                </div>
                                <div class="col-auto text-muted small">
                                    {{ $notif->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </button>
                    </form>
                @empty
                    <div class="list-group-item text-center text-muted py-3">
                        Tidak ada notifikasi.
                    </div>
                @endforelse
            </div>

            @if($notifications->count() > 0)
                <form action="{{ route('notifications.read_all') }}" method="POST" class="text-center mb-2 mt-1">
                    @csrf
                    <button type="submit" class="btn btn-link text-muted small">Tandai semua sebagai sudah dibaca</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endauth
