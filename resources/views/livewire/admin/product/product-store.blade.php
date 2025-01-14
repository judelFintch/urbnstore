<div>
    <!-- Main Section -->
    <div class="nk-main">
        <!-- Wrapper -->
        <div class="nk-wrap">
            <!-- Header -->
            @include('livewire.admin.partials.header')

            <!-- Content -->
            <div class="nk-content">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @livewire('admin.product.partials.header', ['content' => 'create'])

                            <!-- Product Form -->
                            <div class="nk-block">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <form wire:submit.prevent="save" enctype="multipart/form-data">
                                            <div class="row g-3">

                                                <!-- Titre du Produit -->
                                                <x-input
                                                    label="Titre du Produit"
                                                    id="product-title"
                                                    type="text"
                                                    wireModel="title"
                                                    value="TEST"
                                                    error="title"
                                                />

                                                <!-- Prix -->
                                                <x-input
                                                    label="Prix"
                                                    id="regular-price"
                                                    type="number"
                                                    wireModel="price"
                                                    value="10"
                                                    error="price"
                                                />

                                                <!-- Stock -->
                                                <x-input
                                                    label="Stock"
                                                    id="stock"
                                                    type="number"
                                                    wireModel="stock"
                                                    value="10"
                                                    error="stock"
                                                />

                                                <!-- Catégorie -->
                                                <x-select
                                                    label="Catégorie"
                                                    id="category"
                                                    wireModel="category_id"
                                                    :options="$categories"
                                                    optionLabel="name"
                                                    optionValue="id"
                                                    placeholder="Sélectionnez une catégorie"
                                                    error="category_id"
                                                />

                                                <!-- Champs additionnels -->
                                                @foreach ([['color', 'Couleur'], ['material', 'Matériau'], ['sleeve_type', 'Type de Manche'], ['collar_type', 'Type de Col'], ['fit', 'Coupe'], ['size_available', 'Tailles Disponibles'], ['care_instructions', 'Instructions d\'Entretien'], ['tags', 'Tags']] as $field)
                                                    <x-input
                                                        :label="$field[1]"
                                                        :id="$field[0]"
                                                        type="text"
                                                        :wireModel="$field[0]"
                                                        :error="$field[0]"
                                                    />
                                                @endforeach

                                                <!-- Évaluation -->
                                                <x-input
                                                    label="Évaluation"
                                                    id="rating"
                                                    type="number"
                                                    wireModel="rating"
                                                    step="0.1"
                                                    error="rating"
                                                />

                                                <!-- Nombre de Ventes -->
                                                <x-input
                                                    label="Nombre de Ventes"
                                                    id="sales_count"
                                                    type="number"
                                                    wireModel="sales_count"
                                                    error="sales_count"
                                                />

                                                <!-- Réduction -->
                                                <x-input
                                                    label="Réduction"
                                                    id="discount"
                                                    type="number"
                                                    wireModel="discount"
                                                    step="0.01"
                                                    error="discount"
                                                />

                                                <!-- Date de Fin de Réduction -->
                                                <x-input
                                                    label="Date de Fin de Réduction"
                                                    id="discount_end_date"
                                                    type="date"
                                                    wireModel="discount_end_date"
                                                    error="discount_end_date"
                                                />

                                                <!-- Description Longue -->
                                                <x-textarea
                                                    label="Description Longue"
                                                    id="long_description"
                                                    wireModel="long_description"
                                                    error="long_description"
                                                />

                                                <!-- Images du Produit -->
                                                <x-file-upload
                                                    label="Images du Produit"
                                                    id="images"
                                                    wireModel="uploadedFiles"
                                                    multiple="true"
                                                    error="uploadedFiles.*"
                                                />

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
                                </div>
                            </div> <!-- Fin nk-block -->
                        </div> <!-- Fin nk-content-body -->
                    </div> <!-- Fin nk-content-inner -->
                </div> <!-- Fin container-fluid -->
            </div> <!-- Fin nk-content -->
        </div> <!-- Fin nk-wrap -->
    </div> <!-- Fin nk-main -->
</div>
