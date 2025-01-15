<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Urban Store' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    
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
</body>


<!-- JavaScript Dependencies -->
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}" defer></script>
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}" defer></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}" defer></script>

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


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialisez ici vos plugins et scripts personnalisés
        $(".js-addwish-b2").on("click", function (e) {
            e.preventDefault();
        });

        $(".js-addwish-b2").each(function () {
            var nameProduct = $(this).parent().parent().find(".js-name-b2").html();
            $(this).on("click", function () {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass("js-addedwish-b2");
                $(this).off("click");
            });
        });

        $(".js-addcart-detail").each(function () {
            var nameProduct = $(this)
                .parent()
                .parent()
                .parent()
                .parent()
                .find(".js-name-detail")
                .html();
            $(this).on("click", function () {
                swal(nameProduct, "is added to cart !", "success");
            });
        });

        $(".js-pscroll").each(function () {
            $(this).css("position", "relative");
            $(this).css("overflow", "hidden");
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on("resize", function () {
                ps.update();
            });
        });

        // Initialisation Select2
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next(".dropDownSelect2"),
            });
        });

        // Initialisation Parallax100
        $(".parallax100").parallax100();
    });

</script>

</html>