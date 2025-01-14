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
                            <div class="nk-add-product">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Nouvelle Catégorie</h5>
                                        <div class="nk-block-des">
                                            <p>Ajoutez des informations et créez une nouvelle catégorie.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <form wire:submit.prevent="save">
                                        <div class="row g-3">
                                            <!-- Category Name -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="category-name">Nom</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="category-name"
                                                            wire:model.live="name">
                                                    </div>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Category Slug -->
                                            <!-- Slug avec bouton d'édition -->
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <div class="input-group">
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

                                            <!-- Description -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="description">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" id="description" wire:model="description"></textarea>
                                                    </div>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Active Status -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="is_active">Est Actif</label>
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

                                            <!-- Submit Button -->
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">
                                                    <em class="icon ni ni-plus"></em>
                                                    <span>Ajouter Catégorie</span>
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
