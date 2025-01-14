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
                                            <input type="text" id="slug" wire:model="slug" class="form-control">
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
