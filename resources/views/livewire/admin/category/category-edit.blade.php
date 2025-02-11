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
                            <div class="nk-block">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Modifier une Catégorie</h5>
                                        <div class="nk-block-des">
                                            <p>Modifiez les informations de la catégorie sélectionnée.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <form wire:submit.prevent="update">
                                        <!-- Name Field -->
                                        <div class="form-group">
                                            <label for="name">Nom</label>
                                            <input type="text" id="name" wire:model="name" class="form-control">
                                            @error('name') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Slug Field -->
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" id="slug" wire:model="slug" class="form-control" 
                                                @if(!$slugEditable) readonly @endif>
                                            <button type="button" wire:click="toggleSlugEditable" 
                                                class="btn btn-sm btn-secondary mt-1">
                                                {{ $slugEditable ? 'Verrouiller' : 'Déverrouiller' }}
                                            </button>
                                            @error('slug') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Description Field -->
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" wire:model="description" class="form-control"></textarea>
                                            @error('description') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Is Active Field -->
                                        <div class="form-group">
                                            <label for="is_active">Statut</label>
                                            <select id="is_active" wire:model="is_active" class="form-control">
                                                <option value="1">Actif</option>
                                                <option value="0">Inactif</option>
                                            </select>
                                            @error('is_active') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Is Featured Field -->
                                        <div class="form-group">
                                            <label for="is_featured">Catégorie Phare</label>
                                            <select id="is_featured" wire:model="is_featured" class="form-control">
                                                <option value="1">Oui</option>
                                                <option value="0">Non</option>
                                            </select>
                                            @error('is_featured') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Photo Field -->
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <input type="file" id="photo" wire:model="photo" class="form-control">
                                            @if ($photo)
                                                <div class="mt-2">
                                                    <img src="{{ $photo->temporaryUrl() }}" alt="Preview" 
                                                         class="img-thumbnail" width="150">
                                                </div>
                                            @elseif ($photoPath ?? false)
                                                <div class="mt-2">
                                                    <img src="{{ Storage::url($photoPath) }}" alt="Current Photo" 
                                                         class="img-thumbnail" width="150">
                                                </div>
                                            @endif
                                            @error('photo') 
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
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
