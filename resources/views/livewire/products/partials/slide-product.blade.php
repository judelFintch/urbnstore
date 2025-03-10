<div>
    <style type="text/css">
    /* Pagination horizontale centrée proprement */
.slick2 .slick-dots {
    position: absolute;
    bottom: -40px; /* Ajuste selon l'espace voulu sous les images */
    left: 50%;
    transform: translateX(-50%);
    display: flex !important;
    justify-content: center;
    align-items: center;
    gap: 8px; /* Espace entre les points */
    padding: 0;
    margin: 0;
}

.slick2 .slick-dots li {
    list-style: none;
}

.slick2 .slick-dots li button {
    font-size: 0;
    line-height: 0;
    display: block;
    width: 12px;
    height: 12px;
    padding: 0;
    border-radius: 50%;
    background-color: #ddd;
    border: none;
    transition: background-color 0.3s ease;
}

.slick2 .slick-dots li.slick-active button {
    background-color: #333;
}

/* Responsive */
@media(max-width:768px) {
    .slick2 .slick-dots {
        bottom: -30px;
    }

    .slick2 .slick-dots button {
        width: 10px;
        height: 10px;
    }
}

    

    </style>
<section class="sec-product bg0 p-t-100 p-b-50">
    
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
        slidesToShow: 4, // valeur par défaut sur PC
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2500,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        responsive: [
            {
                breakpoint: 992, // taille tablette
                settings: { slidesToShow: 3 }
            },
            {
                breakpoint: 768, // mobile/tablette petite taille
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: { slidesToShow: 1 } // un produit à la fois sur téléphone
            }
        ]
    });
}

document.addEventListener('livewire:update', initSlickSlider);
document.addEventListener('DOMContentLoaded', initSlickSlider);


                </script>


</section>
</div>
