<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Urban Store' }}</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}">
    <!-- Font Awesome (Preloaded for better performance) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- CSS Critical -->
    <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/personaliz.css') }}" rel="stylesheet">
   
   


    <!-- Minimal JS Critical -->
    <script>
        // Lazy-load images for performance
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll("img[loading='lazy']").forEach(img => {
                img.src = img.dataset.src || img.src;
            });
        });
    </script>
</head>

<body class="animsition">

    <!-- Header -->
    @livewire('guest.partials.header.header')

    <!-- Cart -->
    @include('partials.cart')

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    @livewire('guest.partials.footer.footer')

    <!-- Back to Top -->
    @if (View::exists('components.backtop'))
        <x-backtop></x-backtop>
    @endif

    <!-- Vendor JS -->
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" defer
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}" defer></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}" defer></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/cart.js') }}" defer></script>
    <script src="{{ asset('js/slick-custom.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

</body>

</html>