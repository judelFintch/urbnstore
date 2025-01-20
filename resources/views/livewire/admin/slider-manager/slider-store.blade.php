<div>
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main">
            <!-- wrap @s -->
            <div class="nk-wrap">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed nk-header-fluid is-light">
                    <div class="container-fluid">
                        @include('livewire.admin.partials.header')
                    </div>
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @include('livewire.admin.slider-manager.partials.header-tab')

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Gestion des Sliders</h4>
                                        <p class="card-description">Ajoutez ou modifiez les informations d'un slider.
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('success'))
                                            <div class="alert alert-success mb-4">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if ($isEditing || $sliderId === null)
                                            <form wire:submit.prevent="save" class="row g-3">
                                                <!-- Champ Nom -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="name">Nom</label>
                                                        <div class="form-control-wrap">
                                                            <input wire:model="name" type="text" class="form-control"
                                                                id="name" placeholder="Nom du slider">
                                                        </div>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Champ Légende -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="caption">Légende</label>
                                                        <div class="form-control-wrap">
                                                            <input wire:model="caption" type="text" class="form-control"
                                                                id="caption" placeholder="Légende du slider">
                                                        </div>
                                                        @error('caption')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Champ Lien -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="link">Lien</label>
                                                        <div class="form-control-wrap">
                                                            <input wire:model="link" type="text" class="form-control"
                                                                id="link" placeholder="Lien vers la page">
                                                        </div>
                                                        @error('link')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Champ Image -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="image">Image</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input wire:model="image" type="file"
                                                                    class="form-file-input" id="image">
                                                                <label class="form-file-label" for="image">Choisir une
                                                                    image</label>
                                                            </div>
                                                        </div>
                                                        @if ($image)
                                                            <img src="{{ $image->temporaryUrl() }}" alt="Aperçu"
                                                                class="mt-3 img-thumbnail w-50">
                                                        @endif
                                                        @error('image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Boutons -->
                                                <div class="col-12">
                                                    <div class="form-group d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-success me-2">Enregistrer</button>
                                                        <button type="button" wire:click="create"
                                                            class="btn btn-secondary">Annuler</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
        </div>
    </div>
</div>