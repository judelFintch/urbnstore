<div>
    <style type="text/css">
        /* Pagination horizontale centrée proprement */
        .

        /* Conteneur du slider */
        .wrap-slick2 {
            position: relative;
            overflow: hidden;
            padding: 0 50px;
        }

        /* Images totalement responsive */
        .slick2 .block2-pic img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Boutons Précédent et Suivant personnalisés */
        .slick2 .slick-prev,
        .slick2 .slick-next {
            position: absolute;
            top: 45%;
            /* Légèrement au-dessus du centre pour mieux équilibrer */
            transform: translateY(-50%);
            width: 38px;
            height: 38px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            border: none;
            cursor: pointer;
            z-index: 100;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .slick2 .slick-prev {
            left: -20px;
        }

        .slick2 .slick-next {
            right: -20px;
        }

        /* Icônes flèches Font Awesome */
        .slick2 .slick-prev::before,
        .slick2 .slick-next::before {
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 16px;
            color: #555;
        }

        .slick2 .slick-prev::before {
            content: "\f053";
        }

        .slick2 .slick-next::before {
            content: "\f054";
        }

        /* Points de pagination Slick personnalisés */
        .slick2 .slick-dots {
            position: absolute;
            bottom: -40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex !important;
            gap: 10px;
        }

        .slick2 .slick-dots li button {
            font-size: 0;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ccc;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slick2 .slick-dots li.slick-active button {
            background-color: #333;
            width: 14px;
            height: 14px;
        }

        /* Responsive (Mobile & Tablette) */
        @media(max-width: 768px) {

            .slick2 .slick-prev,
            .slick2 .slick-next {
                width: 30px;
                height: 30px;
                top: 50%;
                left: -15px;
                right: -15px;
            }

            .slick2 .slick-prev::before,
            .slick2 .slick-next::before {
                font-size: 14px;
            }

            .slick2 .slick-dots {
                bottom: -30px;
            }
        }
    </style>
    <section class="sec-product bg0 p-t-100 p-b-50">
        <h3 class="ltext-105 cl5 txt-center respon1">
            Nouvelle collection
        </h3>
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
                            dots: false,
                            autoplay: true,
                            autoplaySpeed: 2500,
                            prevArrow: '<button type="button" class="slick-prev"></button>',
                            nextArrow: '<button type="button" class="slick-next"></button>',
                            responsive: [{
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 3
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 2
                                    }
                                },
                                {
                                    breakpoint: 576,
                                    settings: {
                                        slidesToShow: 1
                                    }
                                }
                            ]
                        });
                    }

                    document.addEventListener('livewire:update', initSlickSlider);
                    document.addEventListener('DOMContentLoaded', initSlickSlider);
                </script>


    </section>
</div>
