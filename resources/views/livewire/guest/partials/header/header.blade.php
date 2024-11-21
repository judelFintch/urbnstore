<div>
    <header class="header-v2">
        <!-- Header pour bureau -->
        <div class="container-menu-desktop">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">
                    <!-- Logo -->
                    <a href="/" class="logo">
                        <img src="{{ asset('images/icons/lg.png') }}" alt="IMG-LOGO">
                    </a>
                    <!-- Menu pour bureau -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu"><a href="{{ route('home.index') }}">Acceuil</a></li>
                            <li><a
                                    href="{{ route('home.shop', ['id' => $defaultCategoryArticles, 'slug' => $defaultUrl]) }}">Shop</a>
                            </li>
                            @foreach ($categoryArticles as $categoryArticle)
                                <li><a
                                        href="{{ route('home.shop', ['id' => $categoryArticle->id, 'slug' => $categoryArticle->slug]) }}">{{ $categoryArticle->name }}</a>
                                </li>
                            @endforeach
                            <li><a href="{{ route('home.about') }}">A propos</a></li>
                            <li><a href="{{ route('home.contact') }}">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Icônes pour bureau -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <!-- Icône de recherche -->
                        <div class="icon-header-item cl2 p-lr-15 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                        <!-- Icône de panier -->
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        
                        <!-- Icône de menu latéral -->
                       
                        <!-- Sélecteur de langue -->
                        <div class="icon-header-item cl2 p-lr-15">
                            <select id="language-select" class="form-control" onchange="changeLanguage(this)">
                                <option value="en">English</option>
                                <option value="fr">Français</option>
                                <option value="es">Español</option>
                            </select>
                        </div>
                        <!-- Sélecteur de devise -->
                        <div class="icon-header-item cl2 p-lr-15">
                            <select id="currency-select" class="form-control" onchange="changeCurrency(this)">
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="GBP">GBP</option>
                            </select>
                        </div>
                        <!-- Icône de connexion -->
                        <div class="icon-header-item cl2 p-lr-15">
                            <a href="{{ route('login') }}">
                                <i class="fas fa-user"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header pour mobile -->
        <div class="wrap-header-mobile">
            <div class="logo-mobile">
                <a href="/" class="logo">
                <img src="{{ asset('images/icons/lg.png') }}" alt="IMG-LOGO">
                </a>
            </div>
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="icon-header-item cl2 p-lr-15 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>
            <!-- Icône du menu hamburger pour mobile uniquement -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze" id="hamburger-menu">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu mobile -->
        <div class="menu-mobile" id="menu-mobile">
            <ul class="main-menu-m">
                <li><a href="{{ route('home.index') }}">Acceuil</a></li>
                <li><a
                        href="{{ route('home.shop', ['id' => $defaultCategoryArticles, 'slug' => $defaultUrl]) }}">Shop</a>
                </li>
                @foreach ($categoryArticles as $categoryArticle)
                    <li><a
                            href="{{ route('home.shop', ['id' => $categoryArticle->id, 'slug' => $categoryArticle->slug]) }}">{{ $categoryArticle->name }}</a>
                    </li>
                @endforeach
                <li><a href="{{ route('home.about') }}">A propos</a></li>
                <li><a href="{{ route('home.contact') }}">Contact</a></li>
            </ul>
        </div>
    </header>
</div>
