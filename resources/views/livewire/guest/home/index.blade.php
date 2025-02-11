<div>
    <!-- Hero Slider -->
    <section id="hero-slider">
        @livewire('partials.slide.home-slide')
    </section>

    <!-- Promotional Banner Section -->
    <section id="promotional-banner" class="sec-banner">
        <livewire:products.partials.sec-banner />
    </section>

    <!-- Product Grid Section -->
    <section id="product-grid" class="product-section">
        @if ($isHomePage ?? false)
            <!-- Product grid displayed only on the home page -->
            @livewire('products.partials.product-grid', ['isHomePage' => true])
        @endif
    </section>
</div>