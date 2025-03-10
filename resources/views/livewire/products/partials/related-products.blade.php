<div>
    <!-- Produits Associés -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Produits Associés
                </h3>
            </div>
            <!-- Carrousel Produits -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach ($products as $product)
                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                            <!-- Bloc Produit -->
                            <div class="block2">
                                @php
                                    $productUrl = route('show-product', [
                                        'id' => $product->id,
                                        'category' => $product->category->name,
                                        'slug' => $product->slug,
                                    ]);
                                @endphp
                                <div class="block2-pic hov-img0">

                                    <a href="{{ $productUrl }}">
                                        <img src="{{ $product->getFirstImageUrl() }}"
                                            alt="Image de {{ $product->title }}" loading="lazy" class="img-fluid">
                                    </a>

                                </div>
                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l">
                                        <a href="{{ $productUrl }}"
                                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $product->title }}
                                        </a>
                                        <span class="stext-105 cl3">
                                            {{ number_format($product->price, 2, ',', ' ') }} {{ $product->currency }}
                                        </span>
                                    </div>
                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <button class="btn-addwish-b2 dis-block pos-relative js-addwish-b2"
                                            aria-label="Ajouter aux favoris">
                                            <img class="icon-heart1 dis-block trans-04"
                                                src="{{ asset('images/icons/icon-heart-01.png') }}"
                                                alt="Ajouter aux favoris">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                src="{{ asset('images/icons/icon-heart-02.png') }}"
                                                alt="Déjà ajouté aux favoris">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
