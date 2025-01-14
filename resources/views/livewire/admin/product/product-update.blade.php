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
                            @livewire('admin.product.partials.header', ['content' => 'update'])

                            <div class="nk-block">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Modifier un Produit</h5>
                                        <div class="nk-block-des">
                                            <p>Modifiez les informations du produit sélectionné.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <!-- Title -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Titre du
                                                        Produit</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="product-title"
                                                            wire:model.defer="form.title">
                                                        @error('form.title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-price">Prix</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="product-price"
                                                            wire:model.defer="form.price">
                                                        @error('form.price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Stock -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-stock">Stock</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="product-stock"
                                                            wire:model.defer="form.stock">
                                                        @error('form.stock')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Category -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-category">Catégorie</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-control" id="product-category"
                                                            wire:model.defer="form.category_id">
                                                            <option value="">Sélectionnez une catégorie</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('form.category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Fields Group -->
                                            @foreach ([['color', 'Couleur'], ['material', 'Matériel'], ['sleeve_type', 'Type de Manche'], ['collar_type', 'Type de Col'], ['fit', 'Coupe'], ['size_available', 'Tailles Disponibles'], ['care_instructions', 'Instructions de Soin'], ['tags', 'Tags'], ['rating', 'Note (0-5)'], ['sales_count', 'Nombre de Ventes'], ['discount', 'Réduction (%)'], ['discount_end_date', 'Date de Fin de Réduction']] as $field)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="{{ $field[0] }}">{{ $field[1] }}</label>
                                                        <div class="form-control-wrap">
                                                            <input
                                                                type="{{ $field[0] === 'discount_end_date' ? 'date' : 'text' }}"
                                                                class="form-control" id="{{ $field[0] }}"
                                                                wire:model.defer="form.{{ $field[0] }}">
                                                            @error("form.{$field[0]}")
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <!-- Long Description -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="long_description">Description
                                                        Longue</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" id="long_description" wire:model.defer="form.long_description"></textarea>
                                                        @error('form.long_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Images -->
                                            <div class="col-12">
                                                <label class="form-label">Images Existantes</label>
                                                <div class="d-flex flex-wrap gap-3">
                                                    @foreach ($images as $key => $image)
                                                        <div class="position-relative">
                                                            <img src="{{ asset('storage/' . $image) }}" alt="Image"
                                                                class="img-thumbnail" width="100">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm position-absolute"
                                                                style="top: 5px; right: 5px;"
                                                                wire:click="deleteImage({{ $key }})">×</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Upload New Images -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="new-images">Ajouter des
                                                        Images</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" class="form-control" id="new-images"
                                                            wire:model="uploadedFiles" multiple>
                                                        @error('uploadedFiles.*')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit -->
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">
                                                    <em class="icon ni ni-save"></em>
                                                    <span>Enregistrer les Modifications</span>
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
