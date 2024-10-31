<!DOCTYPE html>
<html lang="en">

<head>
    <title>Urban Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/') }}fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}fonts/linearicons-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/MagnificPopup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}css/main.css">
</head>

<body class="animsition">

    @include('layouts.navigation')


    <main>
        {{ $slot }}
    </main>

   
    <!--===============================================================================================-->
    <script src="{{ asset('/') }}vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/') }}vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/') }}vendor/bootstrap/js/popper.js"></script>
    <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/') }}vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('/') }}vendor/daterangepicker/moment.min.js"></script>
    <script src="{{ asset('/') }}vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/') }}vendor/slick/slick.min.js"></script>
    <script src="{{ asset('/') }}js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/') }}vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('/') }}vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('/') }}js/gallerylb.js"></script>
    <script src="{{ asset('/') }}vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('/') }}vendor/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('/') }}js/addwish.js"></script>
    <script src="{{ asset('/') }}vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}js/pscroll.js"></script>
    <script src="{{ asset('/') }}js/main.js"></script>
</body>

</html>
