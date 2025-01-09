<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Urban Store' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}?v={{ filemtime(public_path('images/icons/favicon.png')) }}">

    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}?v={{ filemtime(public_path('vendor/bootstrap/css/bootstrap.min.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v={{ filemtime(public_path('css/main.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}?v={{ filemtime(public_path('css/util.css')) }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}?v={{ filemtime(public_path('vendor/slick/slick.css')) }}">
    <link rel="stylesheet" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}?v={{ filemtime(public_path('fonts/iconic/css/material-design-iconic-font.min.css')) }}">
    <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}?v={{ filemtime(public_path('vendor/daterangepicker/daterangepicker.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/personaliz.css') }}?v={{ filemtime(public_path('css/personaliz.css')) }}">
</head>

<body class="animsition">
    <!-- Header -->
    @livewire('guest.partials.header.header')

    <!-- Cart Section -->
    @include('partials.cart')

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    @livewire('guest.partials.footer.footer')

    <!-- Back to Top Component -->
    @if (View::exists('components.backtop'))
        <x-backtop></x-backtop>
    @endif

    <!-- JavaScript Dependencies -->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}?v={{ filemtime(public_path('vendor/jquery/jquery-3.2.1.min.js')) }}" defer></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}?v={{ filemtime(public_path('vendor/animsition/js/animsition.min.js')) }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}?v={{ filemtime(public_path('vendor/bootstrap/js/popper.js')) }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}?v={{ filemtime(public_path('vendor/bootstrap/js/bootstrap.min.js')) }}" defer></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}?v={{ filemtime(public_path('vendor/slick/slick.min.js')) }}" defer></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}?v={{ filemtime(public_path('vendor/sweetalert/sweetalert.min.js')) }}" defer></script>
    
    <!-- Custom Scripts -->
    <script src="{{ asset('js/slick-custom.js') }}?v={{ filemtime(public_path('js/slick-custom.js')) }}" defer></script>
    <script src="{{ asset('js/main.js') }}?v={{ filemtime(public_path('js/main.js')) }}" defer></script>
    <script src="{{ asset('js/personaliz.js') }}?v={{ filemtime(public_path('js/personaliz.js')) }}" defer></script>
</body>

</html>
