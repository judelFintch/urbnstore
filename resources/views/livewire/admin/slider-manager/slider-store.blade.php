<div>
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap">
                <!-- Header -->
                <div class="nk-header nk-header-fixed nk-header-fluid is-light">
                    <div class="container-fluid">
                        @include('livewire.admin.partials.header')
                    </div>
                </div>

                <!-- Content -->
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

                                        <!-- Notifications -->
                                        @if (session()->has('success'))
                                            <div x-data="{ show: true }" x-show="show" x-transition
                                                class="alert alert-success alert-dismissible fade show mb-4">
                                                {{ session('success') }}
                                                <button type="button" class="btn-close" @click="show = false"></button>
                                            </div>
                                        @endif

                                        <!-- Formulaire -->
                                        @if ($isEditing || $sliderId === null)
                                            <form wire:submit.prevent="save" class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="name">Nom</label>
                                                    <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nom du slider">
                                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="caption">Légende</label>
                                                    <input wire:model="caption" type="text" class="form-control" id="caption" placeholder="Légende du slider">
                                                    @error('caption') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="link">Lien</label>
                                                    <input wire:model="link" type="text" class="form-control" id="link" placeholder="Lien vers la page">
                                                    @error('link') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="image">Image</label>
                                                    <input wire:model="image" type="file" class="form-control" id="image">
                                                    @if ($image)
                                                        <img src="{{ $image->temporaryUrl() }}" alt="Aperçu" class="mt-3 img-thumbnail w-50">
                                                    @endif
                                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>

                                                <div class="col-12 text-end">
                                                    <button type="submit" class="btn btn-success me-2">Enregistrer</button>
                                                    <button type="button" wire:click="create" class="btn btn-secondary">Annuler</button>
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
                                                    @foreach ($slidersPaginated as $slider)
                                                        <tr>
                                                            <td>{{ $slider->name }}</td>
                                                            <td>{{ $slider->caption }}</td>
                                                            <td>
                                                                @if ($slider->image)
                                                                    <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->name }}" width="50">
                                                                @endif
                                                            </td>
                                                            <td><a href="{{ $slider->link }}" target="_blank">{{ $slider->link }}</a></td>
                                                            <td>
                                                                <button wire:click="edit({{ $slider->id }})" class="btn btn-warning btn-sm">Modifier</button>
                                                                <button wire:click="confirmDelete({{ $slider->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="mt-3">{{ $slidersPaginated->links() }}</div>
                                        </div>

                                        <!-- Modale de suppression -->
                                        @if ($sliderIdToDelete)
                                            <div class="modal show d-block" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirmation de suppression</h5>
                                                            <button type="button" wire:click="cancelDelete" class="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Êtes-vous sûr de vouloir supprimer le slider : <strong>{{ $sliderToDelete->name }}</strong> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" wire:click="delete" class="btn btn-danger">Oui, supprimer</button>
                                                            <button type="button" wire:click="cancelDelete" class="btn btn-secondary">Annuler</button>
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
            </div>
        </div>
    </div>
</div>
