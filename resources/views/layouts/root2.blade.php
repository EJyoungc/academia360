<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <link href=" assets2/assets/img/favicon.png') }}" rel="icon">
    <link href=" /assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/owl-carousel/owl.carousel.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/responsive.css') }}">


    @livewireStyles

</head>

<body class="font-sans antialiased bg-light ">



    <div class="page-container">

        @include('aside.nav2')


        @yield('content')


        @include('aside.footer')
    </div>

    <script src="{{ asset('assets2/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets2/js/popper.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets2/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets2/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets2/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('assets2/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets2/js/stellar.js') }}"></script>
    <script src="{{ asset('assets2/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('assets2/js/custom.js') }}"></script>
    @livewireScripts
    @stack('scripts')
    <x-livewire-alert::scripts />
</body>


</html>
