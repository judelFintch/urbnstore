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
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-body">
                <div class="nk-sidebar-content" data-simplebar>
                    <div class="nk-sidebar-menu">
                        <!-- Menu -->
                        <ul class="nk-menu apps-menu">
                            <li class="nk-menu-item active">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navDashboards">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                </a>
                            </li>


                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navError">
                                    <span class="nk-menu-icon"><em class="icon ni ni-alert-c"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-hr"></li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navComponents">
                                    <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-sidebar-footer">
                        <ul class="nk-menu nk-menu-md apps-menu">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link" title="Settings">
                                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if (Auth::check())
                    @php
                        // Récupérer le nom de l'utilisateur a refactore dans le helper
                            $name = Auth::user()->name;

                            // Diviser le nom complet en mots (en supposant que le nom complet est composé de prénom et nom de famille)
                            $words = explode(' ', $name);

                            // Récupérer la première lettre de chaque mot et les mettre en majuscule
                            $initials = '';
                                                    foreach ($words as $word) {
                            $initials .= strtoupper($word[0]);
                        }
                    @endphp
                @endif
                <div class="nk-sidebar-profile nk-sidebar-profile-fixed">
                    <a href="#" class="toggle" data-target="profileDD">
                        <div class="user-avatar">
                            <span>{{ $initials ?? '' }} </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md m-1 nk-sidebar-profile-dropdown"
                        data-content="profileDD">
                        <div class="dropdown-inner user-card-wrap d-none d-md-block">
                            <!-- Afficher les initiales -->

                            <div class="user-card">
                                <div class="user-avatar">
                                    <span> {{ $initials ?? '' }}</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">{{ Auth::User()->name ?? '' }}</span>
                                    <span class="sub-text text-soft">{{ Auth::User()->email ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="html/user-profile-regular.html"><em
                                            class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                <li><a href="html/user-profile-setting.html"><em
                                            class="icon ni ni-setting-alt"></em><span>Account Setting</span></a>
                                </li>
                                <li><a href="html/user-profile-activity.html"><em
                                            class="icon ni ni-activity-alt"></em><span>Login Activity</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <li><button><em class="icon ni ni-signout"></em><span>Sign out</span></button>
                                </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>

            <div class="nk-menu-content menu-active" data-content="navDashboards">
                <h5 class="title">Dashboards</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route('dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Acceuil</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.category.view') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Categories</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.products.view') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Produits</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.stock.view') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Stock</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.shipping.view') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Shipping</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.promotions.view') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Prommotion</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.invoices.list') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Facturation</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.invoices.list') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Commandes</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Sales Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                            <span class="nk-menu-text">Analytics Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                            <span class="nk-menu-text">Avis</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-fill"></em></span>
                            <span class="nk-menu-text">Utilisateurs</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{ route('home.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text">Home</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div>

        </div>
    </div>
</div>
