<!-- Header -->
<header class="header-v4">
    <!-- Desktop Header -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Livraison gratuite pour toute commande standard supérieure à 100 $.
                </div>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">Aide & FAQs</a>
                    <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">Mon Compte</a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">FR</a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">USD</a>
                </div>
            </div>
        </div>

        <!-- Navigation Bar -->
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo -->
                <a href="/" class="logo">
                    <img src="{{ asset('images/icons/logo.png') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu Links -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu"><a href="{{ route('home.index') }}">Accueil</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Contact</a></li>
                        <li>
                            <form wire:submit.prevent="checkout">
                                <button class="btn btn-primary">Checkout</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- Header Icons -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    <div class="icon-header-item icon-header-noti js-show-cart" data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <a href="#" class="icon-header-item icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="wrap-header-mobile">
        <!-- Logo Mobile -->
        <div class="logo-mobile">
            <a href="/">
                <img src="{{ asset('images/icons/logo.png') }}" alt="IMG-LOGO">
            </a>
        </div>

        <!-- Mobile Icons -->
        <div class="wrap-icon-header flex-w flex-r-m">
            <div class="icon-header-item js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>
            <div class="icon-header-item icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
            <a href="#" class="icon-header-item icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="btn-show-menu-mobile hamburger">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Livraison gratuite pour toute commande standard supérieure à 100 $.
                </div>
            </li>
            <li>
                <div class="right-top-bar">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">Aide & FAQs</a>
                    <a href="{{ route('login') }}" class="flex-c-m p-lr-10 trans-04">Mon Compte</a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">FR</a>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">USD</a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li><a href="{{ route('home.index') }}">Accueil</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>

    <!-- Search Modal -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="btn-hide-modal-search js-hide-modal-search">
                <img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>
            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04"><i class="zmdi zmdi-search"></i></button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
