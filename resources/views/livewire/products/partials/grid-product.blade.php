<div>
    <section class="bg0 p-t-23 p-b-130">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Aperçu des produits
                </h3>
            </div>

            <div class="row isotope-grid">
                @foreach ($specificProducts as $product)
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
                                <img src="{{ $product->getFirstImageUrl() }}" alt="Image du produit"
                                    class="product-image">
                            </div>

                            <!-- Informations du produit -->
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <!-- Titre et prix -->
                                <div class="block2-txt-child1 flex-col-l">
                                    <a href="{{ $productUrl }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product['title'] }}
                                    </a>
                                    <span class="stext-105 cl3">
                                        <span class="new-price">{{ $product['currency'] }}
                                            {{ $product['price'] }}</span>
                                    </span>
                                </div>

                                <!-- Stock et wishlist -->
                                <div class="block2-txt-child2 flex-r p-t-3">
                                    @if ($product['stock'] > 0)
                                        <span class="stext-105 cl3">{{ $product['stock'] }} pcs</span>
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

            <!-- Pagination dynamique Livewire -->
            <div class="flex-c-m flex-w w-full p-t-38">
                {{ $specificProducts->links() }} <!-- Pour pagination Bootstrap stylée -->
            </div>
        </div>
    </section>
</div>
