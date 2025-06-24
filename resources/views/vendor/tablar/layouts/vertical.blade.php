@php
    $layoutData['cssClasses'] =  'navbar navbar-vertical navbar-expand-lg';
@endphp
@section('body')
    <body>
        <div class="page">
            <!-- Sidebar -->
            @include('tablar::partials.navbar.sidebar')
            <div class="page-wrapper">
                <!-- Page Content -->
                @hasSection('content')
                    @yield('content')
                @endif
                <!-- Page Error -->
                @include('tablar::error')
                @include('tablar::partials.footer.bottom')
                
            </div>
        </div>
 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-2.3.1/datatables.min.js" integrity="sha384-BE8jgQ18lLIDRFU5irQ26MTXl+tzWCKvu313il+U+Wo2wVTDr47xBIDmggcM21dh" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
@stop
