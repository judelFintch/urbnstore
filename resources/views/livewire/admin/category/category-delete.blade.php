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
                            <div class="alert alert-warning">
                                <h5>Confirmation de suppression</h5>
                                <p>Êtes-vous sûr de vouloir supprimer la catégorie :
                                    <strong>{{ $categoryName }}</strong> ?
                                </p>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <!-- Bouton de suppression avec indicateur -->
                                <button wire:click="delete" class="btn btn-danger" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Oui, supprimer</span>
                                    <span wire:loading>Suppression en cours...</span>
                                </button>

                                <!-- Bouton pour annuler -->
                                <a href="{{ route('categories.list') }}" class="btn btn-secondary">Annuler</a>
                            </div>

                            @if (session()->has('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
