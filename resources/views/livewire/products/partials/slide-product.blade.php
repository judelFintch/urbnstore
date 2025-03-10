<section class="sec-product bg0 p-t-100 p-b-50">
    <style type="text/css">
    /* Conteneur des boutons */
   /* Container relatif pour positionner les boutons */
.wrap-slick2 {
    position: relative;
    padding: 0 30px; /* Espace pour les boutons */
}

/* Personnalisation des boutons Slick */
.slick2 .slick-prev,
.slick2 .slick-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 100;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.8);
    color: #333;
    border: none;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    transition: background-color 0.3s, color 0.3s;
}

.slick2 .slick-prev {
    left: 0;
}

.slick2 .slick-next {
    right: 0;
}

.slick2 .slick-prev:hover,
.slick2 .slick-next:hover {
    background-color: #333;
    color: #fff;
}

/* Icônes personnalisées (Font Awesome) */
.slick2 .slick-prev::before,
.slick2 .slick-next::before {
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    font-size: 20px;
}

.slick2 .slick-prev::before {
    content: "\f053"; /* icône FontAwesome gauche */
}

.slick2 .slick-next::before {
    content: "\f054"; /* icône FontAwesome droite */
}

/* Personnalisation des points de pagination Slick */
.slick-dots {
    bottom: -40px;
}

.slick-dots li button:before {
    font-size: 12px;
    color: #aaa;
    opacity: 0.8;
}

.slick2 .slick-dots li.slick-active button:before {
    color: #333;
    opacity: 1;
    font-size: 16px;
}

    </style>
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Nouvelle collection
            </h3>
        </div>

        <!-- Tab01 -->
        <div class="tab01">

            <!-- Tab panes -->
            <div class="tab-content p-t-50">
                <div class="tab-pane fade show active">
                    <div class="wrap-slick2" wire:ignore>
                        <div class="slick2">
                            @foreach ($filteredProducts as $product)
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
                                                <img src="{{ $product->getFirstImageUrl() }}" alt="IMG-PRODUCT"
                                                    loading="lazy">
                                                <a href="#"
                                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                    Quick View
                                                </a>
                                            </div>

                                            <div class="block2-txt flex-w flex-t p-t-14">
                                                <div class="block2-txt-child1 flex-col-l">
                                                    <a href="{{ $productUrl }}"
                                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                        {{ $product->title ?? $product->name }}
                                                    </a>
                                                    <span class="stext-105 cl3">
                                                        ${{ $product->price }}
                                                    </span>
                                                </div>

                                                <div class="block2-txt-child2 flex-r p-t-3">
                                                    <a href="#"
                                                        class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                        <img class="icon-heart1 dis-block trans-04"
                                                            src="{{ asset('images/icons/icon-heart-01.png') }}"
                                                            alt="ICON">
                                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                            src="images/icons/icon-heart-02.png" alt="ICON">
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


                <script>
                    function initSlickSlider() {
                        const slider = $('.slick2');

                        if (slider.hasClass('slick-initialized')) {
                            slider.slick('unslick');
                        }

                        slider.slick({
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true,
                            autoplay: true,
                            autoplaySpeed: 3000,
                            prevArrow: '<button type="button" class="slick-prev"></button>',
                            nextArrow: '<button type="button" class="slick-next"></button>',
                        });
                    }

                    // Initialisation à chaque mise à jour de Livewire
                    document.addEventListener('livewire:update', initSlickSlider);
                    document.addEventListener('DOMContentLoaded', initSlickSlider);
                </script>


</section>
