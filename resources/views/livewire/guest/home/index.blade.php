<div>
    <!-- Slider -->
   
    <!-- Banner -->
    <livewire:products.partials.sec-banner />
    <!-- Product -->
    <!--  is true for the home page -->
    @livewire('products.partials.product-grid', ['isHomePage' => true])
</div>