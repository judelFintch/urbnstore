<div>
    <section id="products-section" class="bg0 p-t-23 p-b-130">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Aperçu des produits
                </h3>
            </div>

            <!-- Chargement -->
            <div wire:loading.delay>
                <div class="d-flex justify-content-center my-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </div>
            </div>

            <!-- Grille de produits avec animation -->
            <div class="row isotope-grid" wire:loading.remove>
                @foreach ($specificProducts as $product)
                    @php
                        $productUrl = route('show-product', [
                            'id' => $product->id,
                            'category' => $product->category->name,
                            'slug' => $product->slug,
                        ]);
                        $categoryName = $product->category->name;
                    @endphp

                    <a href="{{ $productUrl }}" class="product-link">
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $categoryName }} product-item"
                             style="opacity: 0; transform: translateY(20px); transition: all 0.5s ease;">
                            <div class="block2-pic hov-img0 label-new" data-label="Nouveau">
                                <img src="{{ $product->getFirstImageUrl() }}" alt="Image du produit"
                                    class="product-image">
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <a href="{{ $productUrl }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product['title'] }}
                                    </a>
                                    <span class="stext-105 cl3">
                                        <span class="new-price">{{ $product['currency'] }} {{ $product['price'] }}</span>
                                    </span>
                                </div>
                                <div class="block2-txt-child2 flex-r p-t-3">
                                    @if ($product['stock'] > 0)
                                        <span class="stext-105 cl3">{{ $product['stock'] }} pcs</span>
                                    @else
                                        <span class="stext-105 cl3">Indisponible</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination stylisée -->
            <div class="d-flex justify-content-center pt-4">
                <ul class="pagination">
                    {{-- Précédent --}}
                    @if ($specificProducts->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Précédent</span></li>
                    @else
                        <li class="page-item">
                            <a href="#" class="page-link" wire:click.prevent="gotoPage({{ $specificProducts->currentPage() - 1 }})">Précédent</a>
                        </li>
                    @endif

                    {{-- Numéros --}}
                    @foreach ($specificProducts->getUrlRange(1, $specificProducts->lastPage()) as $page => $url)
                        @if ($page == $specificProducts->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item">
                                <a href="#" class="page-link" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Suivant --}}
                    @if ($specificProducts->hasMorePages())
                        <li class="page-item">
                            <a href="#" class="page-link" wire:click.prevent="gotoPage({{ $specificProducts->currentPage() + 1 }})">Suivant</a>
                        </li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Suivant</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
</div>

<!-- Script pour scroll doux vers la section produits -->
<script>
    Livewire.on('scrollToProducts', () => {
        document.getElementById('products-section').scrollIntoView({ behavior: 'smooth' });
        // Animation douce pour l'affichage des produits
        document.querySelectorAll('.product-item').forEach((el, index) => {
            setTimeout(() => {
                el.style.opacity = 1;
                el.style.transform = 'translateY(0px)';
            }, index * 100); // Animation en cascade
        });
    });
</script>
