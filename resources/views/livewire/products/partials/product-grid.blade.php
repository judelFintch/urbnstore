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
</div>

