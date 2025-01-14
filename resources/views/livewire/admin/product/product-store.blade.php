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
                                        <form wire:submit.prevent="save" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                <!-- Titre du Produit -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="product-title">Titre du
                                                            Produit</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" value="TEST" class="form-control"
                                                                id="product-title" wire:model.defer="title">
                                                            <span class="text-danger">
                                                                @error('title')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Prix -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="regular-price">Prix</label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" value="10" class="form-control"
                                                                id="regular-price" wire:model.defer="price">
                                                            <span class="text-danger">
                                                                @error('price')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Stock -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="stock">Stock</label>
                                                        <div class="form-control-wrap">
                                                            <input value="10" type="number" class="form-control"
                                                                id="stock" wire:model.defer="stock">
                                                            <span class="text-danger">
                                                                @error('stock')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Catégorie -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="category">Catégorie</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control" id="category"
                                                                wire:model.defer="category_id">
                                                                <option value="">Sélectionnez une catégorie
                                                                </option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <span class="text-danger">
                                                                @error('category_id')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Champs additionnels -->
                                                @foreach ([['color', 'Couleur'], ['material', 'Matériau'], ['sleeve_type', 'Type de Manche'], ['collar_type', 'Type de Col'], ['fit', 'Coupe'], ['size_available', 'Tailles Disponibles'], ['care_instructions', 'Instructions d\'Entretien'], ['tags', 'Tags']] as $field)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"
                                                                for="{{ $field[0] }}">{{ $field[1] }}</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control"
                                                                    id="{{ $field[0] }}"
                                                                    wire:model.defer="{{ $field[0] }}">
                                                                <span class="text-danger">
                                                                    @error($field[0])
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <!-- Évaluation -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="rating">Évaluation</label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" id="rating"
                                                                step="0.1" wire:model.defer="rating">
                                                            <span class="text-danger">
                                                                @error('rating')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Nombre de Ventes -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="sales_count">Nombre de
                                                            Ventes</label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" id="sales_count"
                                                                wire:model.defer="sales_count">
                                                            <span class="text-danger">
                                                                @error('sales_count')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Réduction -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="discount">Réduction</label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" id="discount"
                                                                step="0.01" wire:model.defer="discount">
                                                            <span class="text-danger">
                                                                @error('discount')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Date de Fin de Réduction -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="discount_end_date">Date de Fin
                                                            de Réduction</label>
                                                        <div class="form-control-wrap">
                                                            <input type="date" class="form-control"
                                                                id="discount_end_date"
                                                                wire:model.defer="discount_end_date">
                                                            <span class="text-danger">
                                                                @error('discount_end_date')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Description Longue -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="long_description">Description
                                                            Longue</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control" id="long_description" wire:model.defer="long_description"></textarea>
                                                            <span class="text-danger">
                                                                @error('long_description')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Images du Produit -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="images">Images du
                                                            Produit</label>
                                                        <div class="form-control-wrap">
                                                            <input type="file" class="form-control" id="images"
                                                                wire:model="uploadedFiles" multiple>
                                                            <span class="text-danger">
                                                                @error('uploadedFiles.*')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Bouton Soumettre -->
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">
                                                        <em class="icon ni ni-save"></em>
                                                        <span wire:loading.remove>Enregistrer le Produit</span>
                                                        <span wire:loading>Enregistrement...</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- Fin nk-block -->
                            </div> <!-- Fin nk-content-body -->
                        </div> <!-- Fin nk-content-inner -->
                    </div> <!-- Fin container-fluid -->
                </div> <!-- Fin nk-content -->
            </div> <!-- Fin nk-wrap -->
        </div> <!-- Fin nk-main -->
    </div>
</div>
