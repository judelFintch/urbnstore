<div>
    <div class="flex-w flex-l-m filter-tope-group m-tb-10">
        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" wire:click="filterByCategory('all')">
            All Products
        </button>
    
        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" wire:click="filterByCategory('women')">
            Women
        </button>
    
        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" wire:click="filterByCategory('men')">
            Men
        </button>
    
        <!-- Ajoutez les autres boutons de catégorie de la même manière -->
    </div>
    
    <!-- Autres filtres pour les prix et couleurs -->
    <div class="filter-col2 p-r-15 p-b-27">
        <div class="mtext-102 cl2 p-b-15">
            Price
        </div>
    
        <ul>
            <li class="p-b-6">
                <a href="#" wire:click="filterByPrice('all')" class="filter-link stext-106 trans-04 filter-link-active">
                    All
                </a>
            </li>
            <li class="p-b-6">
                <a href="#" wire:click="filterByPrice('0-50')" class="filter-link stext-106 trans-04">
                    $0.00 - $50.00
                </a>
            </li>
            <!-- Ajoutez les autres plages de prix ici -->
        </ul>
    </div>
    
    <!-- Affichage des produits -->
    <div class="row isotope-grid">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product->category }}">
            <!-- Product block -->
            <div class="block2">
                <!-- Afficher les détails du produit ici -->
                <h5>{{ $product->name }}</h5>
                <p>{{ $product->price }}</p>
                <!-- Etc. -->
            </div>
        </div>
        @endforeach
    </div>
    
