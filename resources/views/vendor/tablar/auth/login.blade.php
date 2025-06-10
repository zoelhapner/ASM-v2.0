@extends('tablar::auth.layout')
@section('title', 'Login')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36"
                     alt=""></a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <p class="text-center mb-4" style="font-size: 1.4rem; font-weight: 400; font-family: 'Figtree', sans-serif;">
    Selamat datang di AHA Right Brain
</p>

                <form class="font-normal" style="font-weight: 400; font-family: 'Figtree', sans-serif;" action="{{route('login')}}" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label ">Email</label>
                        <input type="email" class="form-control font-normal @error('email') is-invalid @enderror" name="email"
                               placeholder="emailkamu@email.com"
                               autocomplete="off">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Kata sandi
                         <!--   <span class="form-label-description">
                    <a href="{{route('password.request')}}">I forgot password</a>
                  </span> -->
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Kata sandi Anda"
                                   autocomplete="off">
                            <span class="input-group-text">
                    <a onclick="" href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12"
                                                                                                              cy="12"
                                                                                                              r="2"/><path
                              d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/></svg>
                    </a>

                     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                    const toggle = document.getElementById('togglePassword');
                    const password = document.getElementById('password');
                    const eyeIcon = document.getElementById('eyeIcon');

    toggle.addEventListener('click', function (e) {
    e.preventDefault();

    const isPassword = password.type === 'password';
    password.type = isPassword ? 'text' : 'password';
    this.title = isPassword ? 'Hide password' : 'Show password';

    // Ganti ikon antara 'eye' dan 'eye-off'
    eyeIcon.innerHTML = isPassword
      ? `<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <path d="M3 3l18 18"/>
         <path d="M10.584 10.587a2 2 0 0 0 2.829 2.828"/>
         <path d="M9.366 5.652c.792 -.429 1.654 -.652 2.634 -.652
                  4 0 7.333 2.333 10 7
                  -1.049 1.837 -2.283 3.29 -3.703 4.357m-2.297 1.292
                  c-.994 .232 -2.003 .351 -3 .351
                  -4 0 -7.333 -2.333 -10 -7
                  1.213 -2.121 2.603 -3.771 4.168 -4.949"/>`
      : `<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
         <circle cx="12" cy="12" r="2"/>
         <path d="M22 12c-2.667 4.667 -6 7 -10 7
                  s-7.333 -2.333 -10 -7
                  c2.667 -4.667 6 -7 10 -7
                  s7.333 2.333 10 7"/>`;
  });

  // Inisialisasi Bootstrap Tooltip
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>
                  </span>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input"/>
                            <span class="form-check-label">Remember me on this device</span>
                        </label>
                    </div> -->
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </div>
                </form>
            </div>
            <!--
            <div class="hr-text">or</div>
            <div class="card-body">
                <div class="row">
                    <div class="col"><a href="#" class="btn btn-white w-100">
                           
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"/>
                            </svg>
                            Login with Github
                        </a></div>
                    <div class="col"><a href="#" class="btn btn-white w-100">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z"/>
                            </svg>
                            Login with Twitter
                        </a></div>
                </div>
            </div> -->
        </div>
       <!-- 
        @if(Route::has('register'))
            <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="{{route('register')}}" tabindex="-1">Sign up</a>
            </div>
        @endif
        --> 
    </div>
@endsection
