<div>
    <div class="p-b-32">
        <h3 class="ltext-105 cl5 txt-center respon1">
            Aperçu de la boutique
        </h3>
    </div>

    <!-- Tab01 -->
    <div class="tab01">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            @php
                $tabs = [
                    'best-seller' => 'Meilleures ventes',
                    'featured' => 'En vedette',
                    'sale' => 'En solde',
                    'top-rate' => 'Les mieux notés'
                ];

                // Tableau fictif de produits
                $products = [
                    'best-seller' => [
                        (object) ['name' => 'Produit 1', 'price' => '20€', 'image_url' => 'images/product-01.jpg'],
                        (object) ['name' => 'Produit 2', 'price' => '25€', 'image_url' => 'images/product-02.jpg'],
                    ],
                    'featured' => [
                        (object) ['name' => 'Produit 3', 'price' => '30€', 'image_url' => 'images/product-03.jpg'],
                        (object) ['name' => 'Produit 4', 'price' => '35€', 'image_url' => 'images/product-04.jpg'],
                    ],
                    'sale' => [
                        (object) ['name' => 'Produit 5', 'price' => '15€', 'image_url' => 'images/product-05.jpg'],
                        (object) ['name' => 'Produit 6', 'price' => '10€', 'image_url' => 'images/product-06.jpg'],
                    ],
                    'top-rate' => [
                        (object) ['name' => 'Produit 7', 'price' => '40€', 'image_url' => 'images/product-07.jpg'],
                        (object) ['name' => 'Produit 8', 'price' => '45€', 'image_url' => 'images/product-08.jpg'],
                    ],
                ];
            @endphp

            @foreach ($tabs as $tabId => $tabName)
                <li class="nav-item p-b-10">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ $tabId }}"
                        role="tab">{{ $tabName }}</a>
                </li>
            @endforeach
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-t-50">
            @foreach ($tabs as $tabId => $tabName)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $tabId }}" role="tabpanel">
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            @foreach ($products[$tabId] as $product)
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="{{ $product->image_url }}" alt="IMG-PRODUCT">

                                            <a href="#"
                                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                Vue rapide
                                            </a>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="product-detail.html"
                                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{ $product->name }}
                                                </a>

                                                <span class="stext-105 cl3">
                                                    {{ $product->price }}
                                                </span>
                                            </div>

                                            <div class="block2-txt-child2 flex-r p-t-3">
                                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                    <img class="icon-heart1 dis-block trans-04"
                                                        src="images/icons/icon-heart-01.png" alt="ICON">
                                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                        src="images/icons/icon-heart-02.png" alt="ICON">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>