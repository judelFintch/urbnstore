<div>
    <!-- main @s -->
    <div class="nk-main">
        <!-- wrap @s -->
        <div class="nk-wrap">
            <!-- main header @s -->
            @include('livewire.admin.partials.header')
            <div class="nk-content">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @livewire('admin.product.partials.header', ['content' => 'create'])
                            <div class="nk-block">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Modifier un Produit</h5>
                                        <div class="nk-block-des">
                                            <p>Modifiez les informations du produit sélectionné.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Titre et message de confirmation -->
                                <div class="alert alert-warning">
                                    <strong>Attention !</strong> Vous êtes sur le point de supprimer ce produit. Cette
                                    action est
                                    irréversible.
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Affichage du titre du produit -->
                                        <h3>Êtes-vous sûr de vouloir supprimer ce produit ?</h3>
                                        <p><strong>Produit : </strong>{{ $product->title }}</p>

                                        <!-- Boutons de confirmation -->
                                        <button type="button" class="btn btn-danger" wire:click="delete">
                                            <em class="icon ni ni-trash"></em> Supprimer
                                        </button>
                                        <a href="{{ route('product.list') }}" class="btn btn-secondary">
                                            Annuler
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- Fin de nk-block -->
                        </div> <!-- Fin de nk-content-body -->
                    </div> <!-- Fin de nk-content-inner -->
                </div> <!-- Fin de container-fluid -->
            </div> <!-- Fin de nk-content -->
        </div> <!-- Fin de nk-wrap -->
    </div> <!-- Fin de nk-main -->
</div>
