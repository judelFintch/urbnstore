<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Urban Store' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- CSS Dependencies -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/personaliz.css') }}">
</head>

<body class="animsition">
    @livewire('guest.partials.header.header')
    @include('partials.cart')
    <main>
        {{ $slot }}
    </main>
    <!-- no sens adfing partials footer and partials header -->
    @livewire('guest.partials.footer.footer')
    @if (View::exists('components.backtop'))
        <x-backtop></x-backtop>
    @endif

    <script src="{{ asset('js/cart.js') }}" defer></script>

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
    <script src="{{ asset('js/personaliz.js') }}" defer></script>

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

        document.addEventListener("DOMContentLoaded", () => {
            displayCart(); // Affiche le contenu du panier après le chargement du DOM
        });
    </script>


    <script src="{{ asset('js/cart.js') }}" defer></script>
</body>

</html>
