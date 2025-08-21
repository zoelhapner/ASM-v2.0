{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section> --}}

@extends('tablar::page')

@section('title', 'Ubah Kata Sandi')

@section('content')
<div x-data="{ showPassword: true, showConfirmPassword: true, showCurrentPassword: true }">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <!-- Password Saat Ini -->
        <div class="mb-3">
            <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
            <div class="input-group">
                <input id="current_password" name="current_password"
                       :type="showCurrentPassword ? 'text' : 'password'"
                       class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                       placeholder="Masukkan kata sandi lama"
                       autocomplete="current-password">
                <button type="button" class="btn btn-outline-secondary"
                        @click="showCurrentPassword = !showCurrentPassword">
                    <i x-show="!showCurrentPassword" class="ti ti-eye"></i>
                    <i x-show="showCurrentPassword" class="ti ti-eye-off"></i>
                </button>
            </div>
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Baru -->
        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi Baru</label>
            <div class="input-group">
                <input id="password" name="password"
                       :type="showPassword ? 'text' : 'password'"
                       class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                       placeholder="Masukkan kata sandi baru"
                       autocomplete="new-password">
                <button type="button" class="btn btn-outline-secondary"
                        @click="showPassword = !showPassword">
                    <i x-show="!showPassword" class="ti ti-eye"></i>
                    <i x-show="showPassword" class="ti ti-eye-off"></i>
                </button>
            </div>
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <div class="input-group">
                <input id="password_confirmation" name="password_confirmation"
                       :type="showConfirmPassword ? 'text' : 'password'"
                       class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                       placeholder="Ulangi kata sandi baru"
                       autocomplete="new-password">
                <button type="button" class="btn btn-outline-secondary"
                        @click="showConfirmPassword = !showConfirmPassword">
                    <i x-show="!showConfirmPassword" class="ti ti-eye"></i>
                    <i x-show="showConfirmPassword" class="ti ti-eye-off"></i>
                </button>
            </div>
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-info">
                <i class="ti ti-lock-check me-1"></i> Simpan Kata Sandi
            </button>
        </div>
    </form>

    <!-- Toast Notification -->
    @if (session('status') === 'password-updated')
        <div x-data="{ show: true }"
             x-show="show"
             x-init="setTimeout(() => show = false, 3000)"
             class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 m-4 shadow"
             role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="ti ti-check me-2"></i> Kata sandi berhasil diperbarui!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" @click="show = false"></button>
            </div>
        </div>
    @endif
</div>

@endsection
