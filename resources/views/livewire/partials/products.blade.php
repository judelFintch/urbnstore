<div>
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">Aperçu des produits</h3>
            </div>
    
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    @foreach ($categories as $category)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ $selectedCategory === $category ? 'how-active1' : '' }}"
                            wire:click="filterByCategory('{{ $category }}')">
                            {{ ucfirst($category) }} Products
                        </button>
                    @endforeach
                </div>
            </div>
    
            <div class="row isotope-grid">
                @foreach($filteredProducts as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product['category'] }}">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset($product['image']) }}" alt="IMG-PRODUCT">
                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ $product['link'] }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product['name'] }}
                                </a>
                                <span class="stext-105 cl3">{{ $product['price'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    
</div>
