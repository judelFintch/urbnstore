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
                                        <p class="card-description">Ajoutez, modifiez ou supprimez un slider.</p>
                                    </div>
                                    <div class="card-body">
                                        <!-- Notification -->
                                        @if (session()->has('success'))
                                            <div class="alert alert-success mb-4">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <!-- Formulaire de création ou d'édition -->
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

                                        <!-- Liste des sliders -->
                                        <div class="mt-4">
                                            <h5 class="mb-3">Liste des sliders</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Légende</th>
                                                        <th>Image</th>
                                                        <th>Lien</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sliders as $slider)
                                                        <tr>
                                                            <td>{{ $slider->name }}</td>
                                                            <td>{{ $slider->caption }}</td>
                                                            <td>
                                                                @if ($slider->image)
                                                                    <img src="{{ Storage::url($slider->image) }}"
                                                                        alt="{{ $slider->name }}" width="50">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ $slider->link }}"
                                                                    target="_blank">{{ $slider->link }}</a>
                                                            </td>
                                                            <td>
                                                                <button wire:click="edit({{ $slider->id }})"
                                                                    class="btn btn-warning btn-sm">Modifier</button>
                                                                <button wire:click="confirmDelete({{ $slider->id }})"
                                                                    class="btn btn-danger btn-sm">Supprimer</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Modale de confirmation de suppression -->
                                        @if ($sliderIdToDelete)
                                            <div class="modal show d-block" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirmation de suppression</h5>
                                                            <button type="button" wire:click="cancelDelete"
                                                                class="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Êtes-vous sûr de vouloir supprimer ce slider ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" wire:click="delete"
                                                                class="btn btn-danger">Oui, supprimer</button>
                                                            <button type="button" wire:click="cancelDelete"
                                                                class="btn btn-secondary">Annuler</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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