<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Produits</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                        class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-search"></em>
                                </div>
                                <input type="text" class="form-control" id="default-04"
                                    placeholder="Recherche rapide par ID">
                            </div>
                        </li>
                        <li>
                            <div class="drodown">
                                <a href="#"
                                    class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                    data-bs-toggle="dropdown">Statut</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><span>Nouveaux articles</span></a></li>
                                        <li><a href="#"><span>En vedette</span></a></li>
                                        <li><a href="#"><span>En rupture de stock</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        @if ($isList)
                            <li class="nk-block-tools-opt">
                                <!-- Pour mobile : Bouton d'ajout -->
                                <a href="{{ route('product.create') }}" class=" btn btn-icon btn-primary d-md-none">
                                    <em class="icon ni ni-plus"></em>
                                </a>

                                <!-- Pour les écrans plus larges : Bouton d'ajout -->
                                <a href="{{ route('product.create') }}"
                                    class=" btn btn-primary d-none d-md-inline-flex">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Ajouter Produit</span>
                                </a>
                            </li>
                        @endif
                        @if ($isCreated)
                            <li class="nk-block-tools-opt">
                                <!-- Pour mobile : Bouton d'ajout -->
                                <a href="{{ route('admin.products.view') }}" class="btn btn-icon btn-primary d-md-none">

                                </a>

                                <!-- Pour les écrans plus larges : Bouton d'ajout -->
                                <a href="{{ route('admin.products.view') }}"
                                    class="btn btn-primary d-none d-md-inline-flex">

                                    <span>Afficher la liste</span>
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
