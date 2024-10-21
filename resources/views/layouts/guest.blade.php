<!DOCTYPE html>
<html lang="en">

<head>
    <title>Urban Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}">
    
    <!-- CSS Dependencies -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>

<body class="animsition">
    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Back to Top -->
    @if(View::exists('components.backtop'))
        <x-backtop></x-backtop>
    @endif

    <!-- Modal -->
    @include('partials.modal')

    <!-- JavaScript Dependencies -->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}" defer></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}" defer></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}" defer></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}" defer></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}" defer></script>
    <script src="{{ asset('vendor/parallax100/parallax100.js') }}" defer></script>
    <script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}" defer></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}" defer></script>
    
    <!-- Custom Scripts -->
    <script src="{{ asset('js/slick-custom.js') }}" defer></script>
    <script src="{{ asset('js/gallerylb.js') }}" defer></script>
    <script src="{{ asset('js/addwish.js') }}" defer></script>
    <script src="{{ asset('js/pscroll.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Initialize Scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select2 Initialization
            $(".js-select2").each(function() {
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            });

            // Parallax Initialization
            $('.parallax100').parallax100();
        });
    </script>
</body>

</html>
