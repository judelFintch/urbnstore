<div>
    <!-- Header -->
    <header class="header-v2">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">
                    <!-- Logo -->
                    <a href="{{ route('home.index') }}" class="logo" aria-label="Accueil">
                        <img src="{{ asset('images/icons/lg.png') }}" alt="Logo" />
                    </a>

                    <!-- Desktop Menu -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="{{ request()->routeIs('home.index') ? 'active-menu' : '' }}">
                                <a href="{{ route('home.index') }}">Accueil</a>
                            </li>
                            <li class="menu-item-has-children {{ request()->routeIs('home.shop') ? 'active-menu' : '' }}">
                                <a href="#">Boutique</a>
                                <ul class="sub-menu">
                                    <li id="shop-loading" style="display: none;">Chargement...</li>
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

                    <!-- Icons -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <!-- Search Icon -->
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </div>
                        <!-- Cart Icon -->
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        </div>

                        <!-- User Options -->
                        @guest
                            <a href="{{ route('login') }}" class="icon-header-item cl2 hov-cl1 trans-04">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                        @else
                            <div class="dropdown">
                                <a href="#" class="icon-header-item dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" 
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                           Déconnexion
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>
                </nav>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="wrap-header-mobile">
            <a href="{{ route('home.index') }}" class="logo-mobile">
                <img src="{{ asset('images/icons/lg.png') }}" alt="Logo" />
            </a>
            <div class="hamburger hamburger--squeeze">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </div>
        </div>
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li><a href="{{ route('home.index') }}">Accueil</a></li>
                <li class="menu-item-has-children">
                    <a href="#">Boutique</a>
                    <ul class="sub-menu-m">
                        <li id="shop-loading-mobile" style="display: none;">Chargement...</li>
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
                @guest
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                @else
                    <li class="menu-item-has-children">
                        <a href="#"><i class="fas fa-user-circle"></i> Mon Compte</a>
                        <ul class="sub-menu-m">
                            <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li>
                                <a href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">
                                   Déconnexion
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
