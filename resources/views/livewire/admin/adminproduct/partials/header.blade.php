<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Products</h3>
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
                                    placeholder="Quick search by id">
                            </div>
                        </li>
                        <li>
                            <div class="drodown">
                                <a href="#"
                                    class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                    data-bs-toggle="dropdown">Status</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><span>New Items</span></a></li>
                                        <li><a href="#"><span>Featured</span></a></li>
                                        <li><a href="#"><span>Out of Stock</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        @if($isList)
                        <li class="nk-block-tools-opt">
                            <!-- Pour mobile : Bouton d'ajout -->
                            <a href="#" wire:click="create('list')" 
                               class="toggle btn btn-icon btn-primary d-md-none">
                                <em class="icon ni ni-plus"></em>
                            </a>
                        
                            <!-- Pour les écrans plus larges : Bouton d'ajout -->
                            <a href="#" wire:click="create('list')" 
                               class="toggle btn btn-primary d-none d-md-inline-flex">
                                <em class="icon ni ni-plus"></em>
                                <span>Add Product</span>
                            </a>
                        </li>
                        @endif
                        @if($isCreate)
                        <li class="nk-block-tools-opt">
                            <!-- Pour mobile : Bouton d'ajout -->
                            <a href="#" wire:click="create('create')" 
                               class="toggle btn btn-icon btn-primary d-md-none">
                                
                            </a>
                        
                            <!-- Pour les écrans plus larges : Bouton d'ajout -->
                            <a href="#" wire:click="create('create')" 
                               class="toggle btn btn-primary d-none d-md-inline-flex">
                                
                                <span>Show list</span>
                            </a>
                        </li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
