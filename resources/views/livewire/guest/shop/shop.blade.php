<div class="shop-page bg-light py-5">
    <div class="container">
        <!-- Header -->
        <div class="shop-header mb-4 d-flex justify-content-between align-items-center">
            <h1 class="fw-bold text-dark">Boutique</h1>
            <span class="text-muted">{{ $products->total() }} produits trouvés</span>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <aside class="col-lg-3 mb-4">
                <div class="bg-white p-4 rounded shadow-sm">
                    <!-- Categories -->
                    <h5 class="fw-bold mb-3 text-primary">Catégories</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" wire:click.prevent="selectCategory(null)"
                                class="text-decoration-none d-block py-1 {{ is_null($selectedCategory) ? 'fw-bold text-primary' : 'text-dark' }}">
                                Tous les produits
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="my-2">
                                <a href="#" wire:click.prevent="selectCategory({{ $category->id }})"
                                    class="text-decoration-none d-block py-1 {{ $selectedCategory == $category->id ? 'fw-bold text-primary' : 'text-dark' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <hr class="my-4">
                    <!-- Price Filter -->
                    <h5 class="fw-bold mb-3 text-primary">Filtrer par prix</h5>

                    <div class="mb-2">
                        <label for="filterMin" class="form-label">Min: {{ $filterMin }} $</label>
                        <input type="range" min="0" max="1000" wire:model="filterMin" class="form-range"
                            id="filterMin">
                    </div>

                    <div class="mb-2">
                        <label for="filterMax" class="form-label">Max: {{ $filterMax }} $</label>
                        <input type="range" min="0" max="1000" wire:model="filterMax" class="form-range"
                            id="filterMax">
                    </div>

                    <button class="btn btn-outline-primary btn-sm w-100" wire:click="applyFilters">
                        Appliquer les filtres
                    </button>

                    <hr class="my-4">

                    <!-- Search -->
                    <h5 class="fw-bold mb-3 text-primary">Rechercher</h5>
                    <input type="text" wire:model.debounce.500ms="search" class="form-control"
                        placeholder="Rechercher...">
                </div>
            </aside>


            <main class="col-lg-9">
                <!-- Spinner de chargement -->
                <div wire:loading class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </div>

                <!-- Produits -->
                <div class="row">
                    @if ($products->isEmpty())
                        <!-- Message Aucun produit trouvé -->
                        <div class="col-12 text-center my-5">
                            <i class="bi bi-box-seam text-muted" style="font-size: 3rem;"></i>
                            <h5 class="text-muted mt-3">Aucun produit trouvé pour les filtres sélectionnés.</h5>
                            <a href="#" wire:click.prevent="resetFilters" class="btn btn-primary mt-3">
                                Réinitialiser les filtres
                            </a>
                        </div>

                        <!-- Produits suggérés -->
                        <div class="col-12 mt-5">
                            <h5 class="fw-bold text-dark">Produits similaires</h5>
                            <div class="row">
                                @foreach ($suggestedProducts as $suggestedProduct)
                                    @php
                                        $productUrl = route('show-product', [
                                            'id' => $suggestedProduct->id,
                                            'category' => $suggestedProduct->category->name,
                                            'slug' => $suggestedProduct->slug,
                                        ]);
                                        $categoryName = $suggestedProduct->category->name;
                                    @endphp
                                    <div class="col-md-4 mb-4">
                                        <div class="card product-card border-0 shadow-sm h-100">
                                            <a href="{{$productUrl}}" class="product-link">
                                                <div class="position-relative overflow-hidden">
                                                    <img src="{{ $suggestedProduct->getFirstImageUrl() }}"
                                                        alt="Product Image" class="card-img-top img-fluid hover-scale">
                                                </div>
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="#"
                                                        class="text-dark text-decoration-none hover-underline">
                                                        {{ $suggestedProduct->title }}
                                                    </a>
                                                </h5>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-primary fw-bold">{{ $suggestedProduct->currency }}
                                                        {{ $suggestedProduct->price }}</span>
                                                    <small class="text-muted">
                                                        {{ $suggestedProduct->stock > 0 ? $suggestedProduct->stock . ' en stock' : 'Indisponible' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Produits récemment consultés -->
                        @if ($recentlyViewedProducts->isNotEmpty())
                            <div class="col-12 mt-5">
                                <h5 class="fw-bold text-dark">Produits récemment consultés</h5>
                                <div class="row">
                                    @foreach ($recentlyViewedProducts as $recentProduct)
                                        <div class="col-md-4 mb-4">
                                            <div class="card product-card border-0 shadow-sm h-100">
                                                <a href="#" class="product-link">
                                                    <div class="position-relative overflow-hidden">
                                                        <img src="{{ $recentProduct->getFirstImageUrl() }}"
                                                            alt="Product Image"
                                                            class="card-img-top img-fluid hover-scale">
                                                    </div>
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <a href="#"
                                                            class="text-dark text-decoration-none hover-underline">
                                                            {{ $recentProduct->title }}
                                                        </a>
                                                    </h5>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span
                                                            class="text-primary fw-bold">{{ $recentProduct->currency }}
                                                            {{ $recentProduct->price }}</span>
                                                        <small class="text-muted">
                                                            {{ $recentProduct->stock > 0 ? $recentProduct->stock . ' en stock' : 'Indisponible' }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        @foreach ($products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card product-card border-0 shadow-sm h-100">
                                    <a href="#" class="product-link"
                                        wire:click="trackProduct({{ $product->id }})">
                                        <div class="position-relative overflow-hidden">
                                            <img src="{{ $product->getFirstImageUrl() }}" alt="Product Image"
                                                class="card-img-top img-fluid hover-scale">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="#" class="text-dark text-decoration-none hover-underline">
                                                {{ $product->title }}
                                            </a>
                                        </h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-primary fw-bold">{{ $product->currency }}
                                                {{ $product->price }}</span>
                                            <small class="text-muted">
                                                {{ $product->stock > 0 ? $product->stock . ' en stock' : 'Indisponible' }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </main>
        </div>
    </div>

</div>
