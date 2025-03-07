<div>
    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Aperçu des produits
                </h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    @if($categories->isEmpty())
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#all" role="tab">
                                Tous les produits
                            </a>
                        </li>
                    @endif
                    @foreach($categories as $category)
                        <li class="nav-item p-b-10">
                            <a class="nav-link {{ $category->name ? 'active' : '' }}" 
                               data-toggle="tab" href="#{{ $category->name }}" role="tab">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-50">
                    @foreach($categories as $key => $category)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                             id="{{ $category }}" role="tabpanel">
                            <div class="wrap-slick2">
                                <div class="slick2">
                                    @foreach($products as $product)
                                        @php
                                            $productUrl = route('show-product', [
                                                'id' => $product->id,
                                                'category' => optional($product->category)->name ?? 'uncategorized',
                                                'slug' => $product->slug,
                                            ]);
                                        @endphp
                                       
                                         <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                            <a href="{{ $productUrl }}" class="product-link">
                                            <div class="block2">
                                                <div class="block2-pic hov-img0">
                                                    <img src="{{ $product->getFirstImageUrl() }}" 
                                                         alt="IMG-PRODUCT" loading="lazy">
                                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 
                                                        p-lr-15 trans-04 js-show-modal1">
                                                        Quick View
                                                    </a>
                                                </div>

                                                <div class="block2-txt flex-w flex-t p-t-14">
                                                    <div class="block2-txt-child1 flex-col-l">
                                                        <a href="{{ $productUrl }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                            {{ $product->title ?? $product->name }}
                                                        </a>
                                                        <span class="stext-105 cl3">
                                                            ${{ $product->price }}
                                                        </span>
                                                    </div>

                                                    <div class="block2-txt-child2 flex-r p-t-3">
                                                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                            <img class="icon-heart1 dis-block trans-04" 
                                                                 src="{{ asset('images/icons/icon-heart-01.png') }}" 
                                                                 alt="ICON">
                                                            <img class="icon-heart2 dis-block trans-04 ab-t-l" 
                                                                 src="{{ asset('images/icons/icon-heart-02.png') }}" 
                                                                 alt="ICON">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <div>
        <section class="bg0 p-t-23 p-b-130">
            <div class="container">
                <div class="p-b-10">
                    <h3 class="ltext-103 cl5">
                        Aperçu des produits
                    </h3>
                </div>
    
                <div class="flex-w flex-sb-m p-b-52">
                    <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                            Tous les produits
                        </button>
    
                        @foreach ($categories as $category)
                            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                                data-filter=".{{ $category['name'] }}">
                                {{ $category['name'] }}
                            </button>
                        @endforeach
                    </div>
    
                    <div class="flex-w flex-c-m m-tb-10">
                        <div
                            class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                            <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                            <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                            Filtrer
                        </div>
    
                        <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                            <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                            <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                            Rechercher
                        </div>
                    </div>
    
                    <!-- Rechercher un produit -->
                    <div class="dis-none panel-search w-full p-t-10 p-b-15">
                        <div class="bor8 dis-flex p-l-15">
                            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
    
                            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                                placeholder="Rechercher">
                        </div>
                    </div>
    
                    <!-- Filtrer -->
                    <div class="dis-none panel-filter w-full p-t-10">
                        <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                            <div class="filter-col1 p-r-15 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">
                                    Trier par
                                </div>
    
                                <ul>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Par défaut
                                        </a>
                                    </li>
    
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Popularité
                                        </a>
                                    </li>
                                </ul>
                            </div>
    
                            <div class="filter-col2 p-r-15 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">
                                    Prix
                                </div>
    
                                <ul>
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                            Tous
                                        </a>
                                    </li>
    
                                    <li class="p-b-6">
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            0,00 € - 50,00 €
                                        </a>
                                    </li>
                                </ul>
                            </div>
    
                            <div class="filter-col3 p-r-15 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">
                                    Couleur
                                </div>
    
                                <ul>
                                    <li class="p-b-6">
                                        <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                            <i class="zmdi zmdi-circle"></i>
                                        </span>
    
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Noir
                                        </a>
                                    </li>
                                    <li class="p-b-6">
                                        <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                            <i class="zmdi zmdi-circle"></i>
                                        </span>
    
                                        <a href="#" class="filter-link stext-106 trans-04">
                                            Gris
                                        </a>
                                    </li>
                                </ul>
                            </div>
    
                            <div class="filter-col4 p-b-27">
                                <div class="mtext-102 cl2 p-b-15">
                                    Tags
                                </div>
    
                                <div class="flex-w p-t-4 m-r--5">
                                    <a href="#"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Mode
                                    </a>
    
                                    <a href="#"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                        Style de vie
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row isotope-grid">
                    @foreach ($products as $product)
                                    @php
    
                                        $productUrl = route('show-product', [
                                            'id' => $product->id,
                                            'category' => $product->category->name,
                                            'slug' => $product->slug,
                                        ]);
    
                                        $categoryName = $product->category->name;
                                    @endphp
                                    <!-- Produit -->
                                    <a href="{{ $productUrl }}" class="product-link">
                                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $categoryName }}">
                                            <!-- Image du produit -->
                                            <div class="block2-pic hov-img0 label-new" data-label="Nouveau">
                                                <img src="{{$product->getFirstImageUrl()}}" alt="Image du produit" class="product-image">
                                            </div>
    
                                            <!-- Informations du produit -->
                                            <div class="block2-txt flex-w flex-t p-t-14">
                                                <!-- Titre et prix -->
                                                <div class="block2-txt-child1 flex-col-l">
                                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                        {{ $product['title'] }}
                                                    </a>
                                                    <span class="stext-105 cl3">
                                                        <span class="new-price">{{ $product['currency'] }} {{ $product['price'] }}</span>
                                                    </span>
                                                </div>
    
                                                <!-- Stock et wishlist -->
                                                <div class="block2-txt-child2 flex-r p-t-3">
                                                    @if($product['stock'] > 0)
                                                        <span class="stext-105 cl3">{{$product['stock']}} pcs</span>
                                                    @else
                                                        <span class="stext-105 cl3">Indisponible</span>
                                                    @endif
    
                                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                        <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                                            alt="Ajouter à la wishlist">
                                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                            src="images/icons/icon-heart-02.png" alt="Retirer de la wishlist">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                    @endforeach
    
                </div>
                <!-- Pagination -->
                <div class="flex-c-m flex-w w-full p-t-38">
                    <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                        1
                    </a>
    
                </div>
            </div>
        </section>
    </div>
</div>

