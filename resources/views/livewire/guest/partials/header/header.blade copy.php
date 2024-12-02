<div>
    <header class="header-v2">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Header -->
        <div class="container-menu-desktop">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop">
                    <!-- Logo -->
                    <a href="{{ route('home.index') }}" class="logo" aria-label="Accueil">
                        <img src="{{ asset('images/icons/lg.png') }}" alt="Logo" />
                    </a>

                    <!-- Main Menu -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="{{ request()->routeIs('home.index') ? 'active-menu' : '' }}">
                                <a href="{{ route('home.index') }}">Accueil</a>
                            </li>
                            <li class="has-submenu {{ request()->routeIs('home.shop') ? 'active-menu' : '' }}">
                                <a href="{{ route('home.shop', ['id' => $defaultCategoryArticles, 'slug' => $defaultUrl]) }}">
                                    Shop
                                </a>
                                <ul class="submenu">
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

                    <!-- Utility Icons -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <button class="icon-header-item js-show-modal-search" aria-label="Recherche">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <button class="icon-header-item js-show-cart" aria-label="Panier" data-notify="2">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </button>
                        <div class="icon-header-item">
                            <select id="language-select" class="form-control" onchange="changeLanguage(this)" aria-label="Langue">
                                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                                <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                                <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                            </select>
                        </div>
                        <div class="icon-header-item">
                            <select id="currency-select" class="form-control" onchange="changeCurrency(this)" aria-label="Devise">
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="GBP">GBP</option>
                            </select>
                        </div>
                        <a href="{{ route('login') }}" class="icon-header-item" aria-label="Connexion">
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="wrap-header-mobile">
            <div class="logo-mobile">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset('images/icons/lg.png') }}" alt="Logo" />
                </a>
            </div>
            <button class="hamburger" id="hamburger-menu" aria-label="Menu Mobile">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="menu-mobile" id="menu-mobile">
            <ul class="main-menu-m">
                <li><a href="{{ route('home.index') }}">Accueil</a></li>
                <li>
                    <a href="{{ route('home.shop', ['id' => $defaultCategoryArticles, 'slug' => $defaultUrl]) }}">Shop</a>
                    <ul class="submenu-mobile">
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
            </ul>
        </div>
    </header>
</div>
