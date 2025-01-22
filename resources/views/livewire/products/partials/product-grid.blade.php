<div>
    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            @if ($isHomePage)
                <div class="p-b-10">
                    <h3 class="ltext-103 cl5">
                        Product Overview
                    </h3>
                </div>
            @endif

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
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
                        Filter
                    </div>
                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>
                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="Search">
                    </div>
                </div>
                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <!-- Sorting -->
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">Sort By</div>
                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">Default</a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">Popularity</a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">Average rating</a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">Newness</a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">Price: Low to High</a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">Price: High to Low</a>
                                </li>
                            </ul>
                        </div>
                        <!-- More Filters (Price, Color, etc.) -->
                    </div>
                </div>
            </div>
            <div class="row isotope-grid" id="product-grid">
                @foreach ($filteredProducts as $product)
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product['category']->name }}">
                                    <!-- Product Block -->
                                    <article class="block2">
                                        @php

                                            $imageId = sprintf('%02d', $product->id);
                                            $images = json_decode($product->details->image_url, true); // Decode JSON into an array

                                            $productUrl = route('show-product', [
                                                'id' => $product->id,
                                                'category' => $product->category->name,
                                                'slug' => $product->slug,
                                            ]);
                                        @endphp

                                        <div class="block2-pic hov-img0 {{ $product->details && $product->details->isNew ? 'label-new' : '' }}"
                                            data-label="{{ $product->details && $product->details->isNew ? 'New' : '' }}">
                                            <a href="{{ $productUrl }}">
                                                @php $images = $images ?? [] @endphp
                                                @if (count($images) > 0)
                                                    <img src="{{$product->getFirstImageUrl()}}" alt="{{ $product['title'] }}"
                                                        loading="lazy">
                                                @else
                                                    <!-- Si aucune image n'est disponible, afficher une image par défaut -->
                                                    <img src="{{ asset('path/to/default-image.jpg') }}" alt="No image" class="thumb">
                                                @endif

                                            </a>
                                            @if ($product->details && ($product->details->isOnSale ?? false))
                                                <span class="sale-label">On Sale</span>
                                            @endif
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l">
                                                <a href="{{ $productUrl }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{ $product['title'] }}
                                                </a>

                                                <div class="product-price">
                                                    @if ($product->isOnSale)
                                                        <span class="old-price">{{ $product['currency'] }}
                                                            {{ $product['originalPrice'] }}</span>
                                                        <span class="new-price">{{ $product['currency'] }}
                                                            {{ $product['salePrice'] }}</span>
                                                    @else
                                                        <span class="stext-105 cl3">{{ $product['currency'] }}
                                                            {{ $product['price'] }}</span>
                                                    @endif
                                                </div>

                                                @if ($product->isInStock)
                                                    <span class="stock-status">In Stock</span>
                                                @else
                                                    <span class="stock-status out-of-stock">Out of Stock</span>
                                                @endif
                                            </div>

                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04"
                                                        src="{{ asset('images/icons/icon-heart-01.png') }}" alt="Add to wishlist">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                        src="{{ asset('images/icons/icon-heart-02.png') }}" alt="In wishlist">
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                @endforeach
            </div>

            <!-- Load More -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <button id="load-more" data-next-page="2"
                    class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </button>
            </div>
        </div>
    </section>
</div>
</div>