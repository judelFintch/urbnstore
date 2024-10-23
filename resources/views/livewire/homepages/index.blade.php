<div>
    @include('partials.header')
    <!-- Cart -->
    @include('partials.cart')
    <!-- Slider -->
    @include('partials.slider')
    <!-- Banner -->
    <livewire:partials.sec-banner />
    <!-- Product -->
    @livewire('partials.product-filter')

    <livewire:partials.products />
    @include('partials.footer')
</div>
