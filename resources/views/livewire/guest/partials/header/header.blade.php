<div>
    <!-- Header -->
    <header class="header-v2">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">
                    <!-- Logo desktop -->
                    <a href="{{ route('home.index') }}" class="logo" aria-label="Accueil">
                        <img src="{{ asset('images/icons/lg.png') }}" alt="Logo" />
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="{{ request()->routeIs('home.index') ? 'active-menu' : '' }}">
                                <a href="{{ route('home.index') }}">Accueil</a>
                            </li>
                            <li class="menu-item-has-children {{ request()->routeIs('home.shop') ? 'active-menu' : '' }}">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <!-- Ajout d'un loader AJAX (chargement différé des catégories si nécessaire) -->
                                    <li id="shop-loading" style="display: none;">
                                        <span>Chargement...</span>
                                    </li>
                                    @foreach ($categoryArticles as $categoryArticle)
                                        <li>
                                            <a href="{{ route('home.shop', ['id' => $categoryArticle->id, 'slug' => $categoryArticle->slug]) }}">
                                                {{ $categoryArticle->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ request()->routeIs('home.about') ? 'active-menu' : '' }}">
                                <a href="{{ route('home.about') }}">À propos</a>
                            </li>
                            <li class="{{ request()->routeIs('home.contact') ? 'active-menu' : '' }}">
                                <a href="{{ route('home.contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-24">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                                <i class="fas fa-search" aria-hidden="true"></i>
                                <span class="sr-only">Rechercher</span>
                            </div>
                        </div>

                        <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
                                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                <span class="sr-only">Panier</span>
                            </div>
                        </div>

                        <!-- Auth options -->
                        @guest
                            <div class="flex-c-m h-full p-lr-19">
                                <a href="{{ route('login') }}" class="icon-header-item cl2 hov-cl1 trans-04">
                                    <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                    <span class="sr-only">Connexion</span>
                                </a>
                            </div>
                        @else
                            <div class="dropdown">
                                <a href="#" class="icon-header-item cl2 hov-cl1 trans-04 dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-user"></i> Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </nav>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="wrap-header-mobile">
            <div class="logo-mobile">
                <img src="{{ asset('images/icons/lg.png') }}" alt="Logo" />
            </div>
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-r-10">
                    <div class="icon-header-item js-show-car" aria-label="Panier" data-notify="0">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <span class="sr-only">Rechercher</span>
                    </div>
                </div>
                <div class="flex-c-m h-full p-lr-10 bor5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="0">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        <span class="sr-only">Panier</span>
                    </div>
                </div>
            </div>
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li><a href="{{ route('home.index') }}">Accueil</a></li>
                <li class="menu-item-has-children">
                    <a href="#">Shop</a>
                    <ul class="sub-menu-m">
                        <li id="shop-loading-mobile" style="display: none;">
                            <span>Chargement...</span>
                        </li>
                        @foreach ($categoryArticles as $categoryArticle)
                            <li>
                                <a href="{{ route('home.shop', ['id' => $categoryArticle->id, 'slug' => $categoryArticle->slug]) }}">
                                    {{ $categoryArticle->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('home.about') }}">À propos</a></li>
                <li><a href="{{ route('home.contact') }}">Contact</a></li>

                <!-- Auth options -->
                @guest
                    <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
                    <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Inscription</a></li>
                @else
                    <li class="menu-item-has-children">
                        <a href="#"><i class="fas fa-user-circle"></i> Mon Compte</a>
                        <ul class="sub-menu-m">
                            <li><a href="{{ route('dashboard') }}"><i class="fas fa-user"></i> Dashboard</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                                </a>
                                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </header>
</div>

<script>
    // Exemple de logique AJAX pour le chargement différé des catégories
    document.addEventListener('DOMContentLoaded', function () {
        const subMenu = document.querySelector('.menu-item-has-children .sub-menu');
        const loading = document.getElementById('shop-loading');
        if (subMenu && loading) {
            subMenu.addEventListener('mouseenter', () => {
                loading.style.display = 'block';
                // Simulation d'un appel AJAX (à remplacer par un appel réel)
                setTimeout(() => {
                    loading.style.display = 'none';
                }, 1000);
            });
        }
    });
</script>
