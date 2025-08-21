{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> 
        </div>
    </div>
</x-app-layout> --}}

{{-- @extends('tablar::page')

@section('title', 'Profil Saya')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <!-- Update Profile Information -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">
                        <i class="ti ti-user me-2"></i> Informasi Profil
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0">
                        <i class="ti ti-lock me-2"></i> Ubah Kata Sandi
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        
        {{-- <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-danger text-white">
                    <h3 class="card-title mb-0">
                        <i class="ti ti-user-off me-2"></i> Hapus Akun
                    </h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('tablar::page')

@section('title', 'Profil Saya')

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <!-- Form Update Profil -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">
                        <i class="ti ti-user me-2"></i> Informasi Profil
                    </h3>
                </div>
                <div class="card-body">
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-sm text-warning mb-2">
                                        {{ __('Alamat email kamu belum terverifikasi.') }}
                                    </p>
                                    <button form="send-verification" class="btn btn-link p-0">
                                        {{ __('Klik di sini untuk memverifikasi email.') }}
                                    </button>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 text-success fw-semibold">
                                            {{ __('Link verifikasi telah dikirim.') }}
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
                </div>
            </div>
        </div>

        <!-- Form Update Password -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0">
                        <i class="ti ti-lock me-2"></i> Ubah Kata Sandi
                    </h3>
                </div>
                <div class="card-body" x-data="{ showPassword: true, showConfirmPassword: true, showCurrentPassword: true }">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                        <div x-data="{ show: true }" x-show="show"
                             x-init="setTimeout(() => show = false, 3000)"
                             class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 m-4 shadow"
                             role="alert">
                            <div class="d-flex">
                                <div class="toast-body">
                                    <i class="ti ti-check me-2"></i> Kata sandi berhasil diperbarui!
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                    @click="show = false"></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



