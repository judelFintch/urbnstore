<div>

    <style>
        /* Styles de base pour le menu principal */
        .menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .menu-item {
            position: relative;
            margin: 10px 0;
        }
        
        /* Lien principal */
        .menu-link {
            text-decoration: none;
            
            color: #333;
            display: inline-block;
           
            cursor: pointer;
        }
        
        /* Contenu du menu caché par défaut */
        .menu-content {
            display: none; /* Cacher par défaut */
            position: absolute;
            top: 100%; /* Positionné sous le lien principal */
            left: 0;
            background: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            min-width: 250px; /* Largeur minimale */
        }
        
        /* Affichage du menu au survol */
        .menu-item:hover > .menu-content {
            display: flex; /* Flex pour organiser les catégories */
            flex-wrap: wrap; /* Permet l'adaptation dynamique */
            gap: 20px; /* Espacement entre les colonnes */
        }
        
        /* Catégories */
        .category {
            min-width: 200px;
        }
        
        .category h3 {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #007BFF;
        }
        
        .category ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .category li {
            margin: 5px 0;
        }
        
        .category a {
            text-decoration: none;
            color: #333;
            font-size: 0.9rem;
        }
        
        .category a:hover {
            text-decoration: underline;
            color: #007BFF;
        }
        </style>
        
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
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#" class="menu-link">Boutique</a>
                                    <div class="menu-content">
                                        <!-- Premier sous-menu -->
                                        <div class="category">
                                            <h3>Catégorie 1</h3>
                                            <ul>
                                                <li><a href="#">Sous-catégorie 1-1</a></li>
                                                <li><a href="#">Sous-catégorie 1-2</a></li>
                                                <li><a href="#">Sous-catégorie 1-3</a></li>
                                            </ul>
                                        </div>
                                        <!-- Deuxième sous-menu -->
                                        <div class="category">
                                            <h3>Catégorie 2</h3>
                                            <ul>
                                                <li><a href="#">Sous-catégorie 2-1</a></li>
                                                <li><a href="#">Sous-catégorie 2-2</a></li>
                                            </ul>
                                        </div>
                                        <!-- Troisième sous-menu -->
                                        <div class="category">
                                            <h3>Catégorie 3</h3>
                                            <ul>
                                                <li><a href="#">Sous-catégorie 3-1</a></li>
                                                <li><a href="#">Sous-catégorie 3-2</a></li>
                                                <li><a href="#">Sous-catégorie 3-3</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            
                            
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
                                <i class="zmdi zmdi-search"></i>
                            </div>
                        </div>

                        <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                                data-notify="2">
                                <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                        </div>

                        <div class="flex-c-m h-full p-lr-19">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{ route('home.index') }}" class="logo-mobile">
                    <img src="{{ asset('images/icons/lg.png') }}" alt="Logo" />
                </a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-r-10">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                </div>

                <div class="flex-c-m h-full p-lr-10 bor5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                        data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </div>

            <!-- Button show menu -->
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
                    <a href="#">Boutique</a>
                    <ul class="sub-menu-m">

                        @foreach ($categoryArticles as $categoryArticle)
                            <li>
                                <a
                                    href="{{ route('home.shop', ['id' => $categoryArticle->id, 'slug' => $categoryArticle->slug]) }}">
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

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>

        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                <ul class="sidebar-link w-full">
                    <li class="p-b-13">
                        <a href="{{ route('home.index') }}">Accueil</a>
                    </li>

                    <li class="p-b-13">
                        <a href="{{route('terms-and-conditions')}}"" class=" stext-102 cl2 hov-cl1 trans-04">
                            Termes et Conditions
                        </a>
                    </li>


                   

                    <!-- User Options -->
                    @guest
                    <li class="p-b-13">
                        <a href="{{route('login')}}" class="stext-102 cl2 hov-cl1 trans-04">
                            Connexion
                        </a>
                    </li>
                    <li class="p-b-13">
                        <a href="{{route('register')}}" class="stext-102 cl2 hov-cl1 trans-04">
                            Inscription
                        </a>
                    </li>
                       
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
                </ul>

                <div class="sidebar-gallery w-full p-tb-30">
                    <span class="mtext-101 cl5">
                        Urban
                    </span>

                    <div class="flex-w flex-sb p-t-36 gallery-lb">
                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-01.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-02.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-03.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-04.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-04.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-05.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-05.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-06.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-06.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-07.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-07.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-08.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-08.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-09.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-09.jpg');"></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-gallery w-full">
                    <span class="mtext-101 cl5">
                        Apropos
                    </span>

                    <p class="stext-108 cl6 p-t-27">
                        C'est en observant la scène mode à Lubumbashi que Moise A. NGONGO a perçu une opportunité unique
                        : créer une marque qui
                        non seulement suit les tendances internationales, mais célèbre aussi l’héritage local. Cette
                        dualité entre global et
                        local est au cœur de la philosophie d’Urban Store. Dès ses débuts, Urban Store a misé sur la
                        qualité, l’authenticité,
                    </p>
                </div>
            </div>
        </div>
    </aside>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuItem = document.querySelector('.menu-item-has-children');
            const shopLoading = document.getElementById('shop-loading');
    
            menuItem.addEventListener('mouseenter', function () {
                // Simulez un délai de chargement
                shopLoading.style.display = 'block';
                setTimeout(() => {
                    shopLoading.style.display = 'none';
                }, 1000); // 1 seconde de délai
            });
    
            menuItem.addEventListener('mouseleave', function () {
                // Réinitialiser l'état du message de chargement
                shopLoading.style.display = 'none';
            });
        });
    </script>
    

</div>