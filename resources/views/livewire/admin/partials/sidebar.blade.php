<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-bar">
        <div class="nk-apps-brand">
            <a href="{{ route('dashboard') }}" class="logo-link">
                <img class="logo-light logo-img" src="{{ asset('admin/images/lg.png') }}"
                    srcset="{{ asset('admin/mages/logo-small2x.png 2x') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('admin/images/logo-dark-small.png') }}"
                    srcset="{{ asset('admin/images/logo-dark-small2x.png 2x') }}" alt="logo-dark">
            </a>
        </div>
    </div>
    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>
            <div class="nk-menu-content menu-active" data-content="navDashboards">
                <h5 class="title">Tableaux de Bord</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route('dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Accueil</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('categories.list') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-tag"></em></span>
                            <span class="nk-menu-text">Catégories</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-box"></em></span>
                            <span class="nk-menu-text">Produits</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('product.list') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Liste des Produits</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('product.list-card') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Cartes des Produits</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.stock.view') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-layer"></em></span>
                            <span class="nk-menu-text">Stock</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.shipping.view') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-truck"></em></span>
                            <span class="nk-menu-text">Livraison</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.contact.message') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-mail"></em></span>
                            <span class="nk-menu-text">Messages</span>
                        </a>
                    </li>



                    <li class="nk-menu-item">
                        <a href="{{ route('admin.invoices.list') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                            <span class="nk-menu-text">Facturation</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('slider.list') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-list"></em></span>
                            <span class="nk-menu-text">Slider</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('home.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                            <span class="nk-menu-text">Accueil</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>