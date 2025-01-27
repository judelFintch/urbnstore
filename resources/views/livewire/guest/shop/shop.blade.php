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
                    <h5 class="fw-bold mb-3">Catégories</h5>
                    <ul class="list-unstyled">
                        <li><a href="" class="text-muted text-decoration-none">Tous les produits</a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="my-2">
                                <a href="
                                "
                                    class="text-dark text-decoration-none">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <hr class="my-4">

                    <!-- Price Filter -->
                    <h5 class="fw-bold mb-3">Filtrer par prix</h5>
                    <form action="" method="GET">
                        <input type="range" name="price_range" class="form-range" min="0" max="1000"
                            value="{{ request('price_range', 1000) }}">
                        <div class="d-flex justify-content-between">
                            <span>0€</span>
                            <span>1000€</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-3 w-100">Appliquer</button>
                    </form>

                    <hr class="my-4">

                    <!-- Colors -->
                    <h5 class="fw-bold mb-3">Couleurs</h5>
                    <ul class="list-unstyled d-flex flex-wrap">
                        <li>
                            <a href="#" class="d-block rounded-circle border m-1"
                                style="width: 24px; height: 24px; background: #000;"></a>
                        </li>
                        <li>
                            <a href="#" class="d-block rounded-circle border m-1"
                                style="width: 24px; height: 24px; background: #fff;"></a>
                        </li>
                        <li>
                            <a href="#" class="d-block rounded-circle border m-1"
                                style="width: 24px; height: 24px; background: #f00;"></a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="col-lg-9">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card product-card border-0 shadow-sm">
                                <!-- Product Image -->
                                <a href=""
                                    class="product-link">
                                    <img src="{{ $product->getFirstImageUrl() }}" alt="Product Image"
                                        class="card-img-top img-fluid hover-zoom">
                                </a>
                                <div class="card-body">
                                    <!-- Product Title -->
                                    <h5 class="card-title">
                                        <a href=""
                                            class="text-dark text-decoration-none">
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
                                    <!-- Wishlist Button -->
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-outline-secondary btn-sm w-100">
                                            Ajouter à la wishlist
                                        </a>
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
</div>