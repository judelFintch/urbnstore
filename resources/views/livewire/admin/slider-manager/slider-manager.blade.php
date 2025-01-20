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

                                <h2 class="text-xl font-bold mb-4">Gestion des Sliders</h2>

                                @if (session()->has('success'))
                                    <div class="alert alert-success mb-4">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <button wire:click="create" class="btn btn-primary mb-4">Ajouter un Slider</button>

                                @if ($isEditing || $sliderId === null)
                                    <form wire:submit.prevent="save" class="mb-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Nom</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="name" type="text" class="form-control" id="name"
                                                    placeholder="Nom du slider">
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="caption">Légende</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="caption" type="text" class="form-control" id="caption"
                                                    placeholder="Légende du slider">
                                                @error('caption') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="link">Lien</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="link" type="text" class="form-control" id="link"
                                                    placeholder="Lien vers la page">
                                                @error('link') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="image">Image</label>
                                            <div class="form-control-wrap">
                                                <div class="form-file">
                                                    <input wire:model="image" type="file" class="form-file-input"
                                                        id="image">
                                                    <label class="form-file-label" for="image">Choisir une image</label>
                                                </div>
                                                @if ($image)
                                                    <img src="{{ $image->temporaryUrl() }}" alt="Aperçu"
                                                        class="mt-3 img-thumbnail w-50">
                                                @endif
                                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success">Enregistrer</button>
                                            <button type="button" wire:click="create"
                                                class="btn btn-secondary ml-2">Annuler</button>
                                        </div>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>