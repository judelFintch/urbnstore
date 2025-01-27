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
                    <form>
                        <input type="range" wire:model="priceRange" class="form-range" min="0" max="1000">
                        <div class="d-flex justify-content-between">
                            <span>0€</span>
                            <span>{{ $priceRange }}€</span>
                        </div>
                    </form>

                    <hr class="my-4">

                    <!-- Search -->
                    <h5 class="fw-bold mb-3 text-primary">Rechercher</h5>
                    <input type="text" wire:model.debounce.500ms="search" class="form-control"
                        placeholder="Rechercher...">
                </div>
            </aside>

            <!-- Main Content -->
            <main class="col-lg-9">
                <div wire:loading class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card product-card border-0 shadow-sm h-100">
                                <!-- Product Image -->
                                <a href="#" class="product-link">
                                    <div class="position-relative overflow-hidden">
                                        <img src="{{ $product->getFirstImageUrl() }}" alt="Product Image"
                                            class="card-img-top img-fluid hover-scale">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <!-- Product Title -->
                                    <h5 class="card-title">
                                        <a href="#" class="text-dark text-decoration-none hover-underline">
                                            {{ $product->title }}
                                        </a>
                                    </h5>
                                    <!-- Product Price -->
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
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </main>
        </div>
    </div>



    <!-- Styles -->
    <style>
        .hover-active:hover {
            color: #0d6efd;
            font-weight: bold;
        }

        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .hover-underline:hover {
            text-decoration: underline;
        }

        /* Transition pour la hauteur de la barre latérale */
    .sidebar {
        transition: all 0.3s ease-in-out;
    }

    /* Effet lors du survol des liens */
    .sidebar a {
        transition: color 0.2s ease-in-out, font-weight 0.2s ease-in-out;
    }

    .sidebar a:hover {
        color: #0d6efd;
        font-weight: bold;
    </style>

</div>