<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $user->email) }}" required autocomplete="username">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="text-sm text-warning mb-2">
                    {{ __('Alamat email kamu tidak terverifikasi.') }}
                </p>
                <button form="send-verification" class="btn btn-link p-0">
                    {{ __('Klik disini untuk memveriikasi email.') }}
                </button>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-success fw-semibold">
                        {{ __('Link verifikasi sudah dikirim ke alamat email kamu.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>

    @if (session('status') === 'profile-updated')
        <span class="text-success ms-3">✔ Tersimpan!</span>
    @endif
</form>

</section>
