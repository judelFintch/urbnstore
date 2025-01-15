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

<script src="{{ asset('js/cart.js') }}" defer></script>
<!-- JavaScript Dependencies -->
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}" defer></script>
<!-- JavaScript Dependencies -->
<script src="{{ asset('vendor/select2/select2.min.js') }}" defer></script>


<script src="{{ asset('vendor/slick/slick.min.js') }}" defer></script>

<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}" defer></script>
<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}" defer></script>
<!-- Custom Scripts -->
<script src="{{ asset('js/slick-custom.js') }}" defer></script>
<script src="{{ asset('js/gallerylb.js') }}" defer></script>
<script src="{{ asset('js/addwish.js') }}" defer></script>
<script src="{{ asset('js/pscroll.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" defer></script>
<script src="{{ asset('js/personaliz.js') }}" defer></script>
<script src="{{ asset('build/assets/app.js') }}" defer></script>

<!-- Initialize Scripts -->











</html>