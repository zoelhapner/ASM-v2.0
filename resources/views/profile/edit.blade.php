@extends('tablar::page')

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
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Saat Ini -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
                            <div class="input-group">
                                <input id="current_password" name="current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="Masukkan kata sandi lama" autocomplete="current-password">
                                <span class="input-group-text">
                                    <a href="#" class="toggle-password link-secondary"
                                       data-bs-toggle="tooltip" data-target="current_password"
                                       title="Show password" aria-label="Show password">
                                        <svg class="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="2"/>
                                            <path d="M22 12c-2.667 4.667-6 7-10 7s-7.333-2.333-10-7
                                                     c2.667-4.667 6-7 10-7s7.333 2.333 10 7"/>
                                        </svg>
                                        <svg class="eyeOffIcon" xmlns="http://www.w3.org/2000/svg" style="display:none;"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 3l18 18"/>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Baru -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi Baru</label>
                            <div class="input-group">
                                <input id="password" name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan kata sandi baru" autocomplete="new-password">
                                <span class="input-group-text">
                                    <a href="#" class="toggle-password link-secondary"
                                       data-bs-toggle="tooltip" data-target="password"
                                       title="Show password" aria-label="Show password">
                                        <svg class="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="2"/>
                                            <path d="M22 12c-2.667 4.667-6 7-10 7s-7.333-2.333-10-7
                                                     c2.667-4.667 6-7 10-7s7.333 2.333 10 7"/>
                                        </svg>
                                        <svg class="eyeOffIcon" xmlns="http://www.w3.org/2000/svg" style="display:none;"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 3l18 18"/>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <div class="input-group">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Ulangi kata sandi baru" autocomplete="new-password">
                                <span class="input-group-text">
                                    <a href="#" class="toggle-password link-secondary"
                                       data-bs-toggle="tooltip" data-target="password_confirmation"
                                       title="Show password" aria-label="Show password">
                                        <svg class="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="2"/>
                                            <path d="M22 12c-2.667 4.667-6 7-10 7s-7.333-2.333-10-7
                                                     c2.667-4.667 6-7 10-7s7.333 2.333 10 7"/>
                                        </svg>
                                        <svg class="eyeOffIcon" xmlns="http://www.w3.org/2000/svg" style="display:none;"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 3l18 18"/>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary text-white">Simpan</button>

                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success mt-3">
                                <i class="ti ti-check"></i> Profil berhasil diperbarui!
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("Bootstrap global:", window.bootstrap);

        if (window.bootstrap) {
            console.log("✅ Bootstrap sudah ke-load!");
        } else {
            console.error("❌ Bootstrap BELUM ke-load!");
        }
        // Inisialisasi tooltip
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(el) {
            return new window.bootstrap.Tooltip(el);
        });

        // Toggle password
        document.querySelectorAll(".toggle-password").forEach(function(toggle) {
            toggle.addEventListener("click", function(e) {
                e.preventDefault();
                const targetId = this.getAttribute("data-target");
                const input = document.getElementById(targetId);
                const eyeIcon = this.querySelector(".eyeIcon");
                const eyeOffIcon = this.querySelector(".eyeOffIcon");

                const isPassword = input.type === "password";
                input.type = isPassword ? "text" : "password";

                eyeIcon.style.display = isPassword ? "none" : "inline";
                eyeOffIcon.style.display = isPassword ? "inline" : "none";

                const title = isPassword ? "Hide password" : "Show password";
                this.setAttribute("aria-label", title);
                this.setAttribute("title", title);

                const tooltip = window.bootstrap.Tooltip.getInstance(this);
                if (tooltip) {
                    tooltip.setContent({ '.tooltip-inner': title });
                }
            });
        });
    });
    </script>
@endpush

