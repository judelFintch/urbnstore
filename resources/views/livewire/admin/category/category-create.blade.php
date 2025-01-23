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
                            @include('livewire.admin.category.partials.header')
                            <div class="nk-block nk-block-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Nouvelle Catégorie</h5>
                                        <div class="nk-block-des">
                                            <p>Ajoutez des informations et créez une nouvelle catégorie.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <div class="card-head">
                                            <h5 class="card-title">Informations de la catégorie</h5>
                                        </div>
                                        <form wire:submit.prevent="save">
                                            <!-- Columns Layout -->
                                            <div class="row g-4">
                                                <!-- Nom de la catégorie -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="category-name">Nom de la
                                                            catégorie</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="category-name"
                                                                wire:model.live="name">
                                                        </div>
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Slug -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="slug">Adresse URL</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" id="slug" wire:model="slug"
                                                                class="form-control" {{ $slugEditable ? '' : 'readonly' }}>
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                wire:click="toggleSlugEditable">
                                                                {{ $slugEditable ? 'Verrouiller' : 'Éditer' }}
                                                            </button>
                                                        </div>
                                                        @error('slug')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Description -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="description">Description</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control" id="description"
                                                                wire:model="description"></textarea>
                                                        </div>
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Photo -->
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="photo">Photo</label>
                                                        <div class="form-control-wrap">
                                                            <input type="file" class="form-control" id="photo"
                                                                wire:model="photo">
                                                        </div>
                                                        @error('photo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <!-- Preview de l'image -->
                                                    <div class="col-lg-2">
                                                    @if ($photo)
                                                        <div class="mt-3">
                                                            <p>Aperçu :</p>
                                                            <img src="{{ $photo->temporaryUrl() }}" alt="Aperçu de la photo"
                                                                style="max-width: 200px; max-height: 200px;">
                                                        </div>
                                                    @endif
                                                </div>
                                                </div>


                                                <!-- Catégorie phare -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="is_featured">Catégorie
                                                            phare</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control" id="is_featured"
                                                                wire:model="is_featured">
                                                                <option value="1">Oui</option>
                                                                <option value="0">Non</option>
                                                            </select>
                                                        </div>
                                                        @error('is_featured')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Statut actif -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="is_active">Statut actif</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control" id="is_active"
                                                                wire:model="is_active">
                                                                <option value="1">Actif</option>
                                                                <option value="0">Inactif</option>
                                                            </select>
                                                        </div>
                                                        @error('is_active')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Bouton soumettre -->
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>Ajouter la catégorie</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

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
        </div>
    </div>
</div>