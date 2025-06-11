<div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/slide-product.css') }}">
    @endpush
    <section class="sec-product bg0 p-t-100 p-b-50">
        <h3 class="ltext-105 cl5 txt-center respon1">
            Nouvelle collection
        </h3>
        <p class="text-center respon1" style="font-size: 20px;">Trouve ton style</p>
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


                @push('scripts')
                    <script src="{{ asset('js/slide-product.js') }}"></script>
                @endpush


    </section>
</div>
