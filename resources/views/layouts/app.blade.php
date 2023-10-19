<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    {{-- <link href="{{ asset('dash/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dash/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('dash/dist/css/extra.css') }}" rel="stylesheet">
    <link href="{{ asset('dash/dist/css/style.min.css') }}" rel="stylesheet">
    @livewireStyles
<link rel="stylesheet" href="{{ asset('js/sweetalert2.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('dash/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('dash/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('dash/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('dash/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('dash/dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('dash/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dash/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dash/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dash/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dash/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('dash/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('dash/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!--c3 charts -->
    <script src="{{ asset('dash/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('dash/assets/extra-libs/c3/c3.min.js') }}"></script>
    <!--chartjs -->
    <script src="{{ asset('dash/assets/libs/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/alpine.js') }}"></script>

    

    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
</head>

<body class="font-sans antialiased bg-light">

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    {{-- <x-jet-banner /> --}}
    <div id="main-wrapper">
        @if (Auth::user())
            @include('aside.nav')
        @endif
        @include('aside.sidebar')
        <div class="page-wrapper">
            @yield('bread')
            <div class="container-fluid">
                <i class="fa fa-bars" aria-hidden="true"></i>
                {{ $slot }}

                
            </div>

            @include('aside.footer')
        </div>

    </div>








    @livewireScripts

    @stack('scripts')
    <x-livewire-alert::scripts />
    <!-- Vendor JS Files -->
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
   

    

</body>

</html>
