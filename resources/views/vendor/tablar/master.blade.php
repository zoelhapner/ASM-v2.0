<!doctype html>
<html lang="{{ Config::get('app.locale') }}" {!! config('tablar.layout') == 'rtl' ? 'dir="rtl"' : '' !!}>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="icon" href="{{ asset('ahasquare.png') }}" type="image/png">
   

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')
    {{-- Title --}}
    <title>
        @yield('title_prefix', config('tablar.title_prefix', ''))
        @yield('title', config('tablar.title', 'Tablar'))
        @yield('title_postfix', config('tablar.title_postfix', ''))
    </title>

    <!-- CSS/JS files -->
    @if(config('tablar','vite'))
        @vite(['resources/scss/bootstrap-override.scss', 'resources/js/app.js'])
    @endif
    <!-- SweetAlert2 CDN -->
    


    {{-- Livewire Styles --}}
    @if(config('tablar.livewire'))
        @livewireStyles
    @endif

    {{-- Custom Stylesheets (post Tablar) --}}
    @yield('tablar_css')

    <style>
        /* Pastikan header dan tombol profil di atas semua elemen */
        .navbar,
        .header,
        .header-right,
        .nav-item.dropdown,
        .dropdown-menu {
            position: relative;
            z-index: 1050 !important;
        }

        /* Pastikan kontainer utama di bawah header */
        .container-fluid,
        .page-wrapper,
        .content,
        .card,
        .card-body,
        .card-header {
            position: relative;
            z-index: 1 !important;
        }
    </style>


    
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-2.3.2/fc-5.0.4/fh-4.0.3/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('fonts/tabler-icons.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}?v={{ time() }}">

</head>

@yield('body')
@include('tablar::extra.modal')

{{-- Livewire Script --}}
@if(config('tablar.livewire'))
    @livewireScripts
@endif

@yield('tablar_js')
</html>
