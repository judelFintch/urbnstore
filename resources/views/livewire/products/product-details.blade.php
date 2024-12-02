<div>
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{ route('home.index') }}" class="stext-109 cl8 hov-cl1 trans-04">
                Acceuil
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
                {{ $product->category->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">
                {{ $product->title }}
            </span>
        </div>
    </div>
    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @php
                                    // Décoder les images du produit depuis le champ 'image_url' dans les détails du produit
                                    $images = json_decode($product->details->image_url, true); // Assurez-vous que ce champ est bien un tableau d'URLs
                                @endphp
                            
                                @if ($images && count($images) > 0)
                                    @foreach ($images as $index => $image)
                                        <div class="item-slick3" data-thumb="{{ url($image) }}">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ url($image) }}" alt="IMG-PRODUCT">
                            
                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="{{ url($image) }}">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <!-- Si aucune image n'est disponible, afficher une image par défaut -->
                                    <div class="item-slick3">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('path/to/default-image.jpg') }}" alt="No Image Available">
                            
                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                               href="{{ asset('path/to/default-image.jpg') }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            


                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->title }}
                        </h4>
                        <span class="mtext-106 cl2">
                            {{ $product->price }} {{ $product->currency }}
                        </span>
                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
                        </p>
                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">Size</div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="size" id="size-{{ $product->id }}">
                                            <option>Choose an option</option>
                                            @foreach (explode(',', $product->details->size_available) as $size)
                                                <option value="{{ trim($size) }}">Size {{ trim($size) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">Color</div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="color" id="color-{{ $product->id }}">
                                            <option>Choose an option</option>
                                            <option>{{ $product->details->color }}</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input class="mtext-104 cl3 txt-center num-product" type="number" id="quantity-{{ $product->id }}" name="num-product" value="1">
                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    <button
                                        onclick="handleAddToCart({{ $product->id }}, '{{ $product->title }}', {{ $product->price }}, '{{ asset("images/item-cart-$product->id.jpg") }}')"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                    data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description"
                                role="tab">Description</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional
                                information</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" href="{{ asset('images/doc/size_guide.pdf') }}" role="tab">Size
                                Guide</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {{ $product->details->long_description }}
                                </p>
                            </div>
                        </div>
                        <!-- - -->
                        <div class="tab-pane fade" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <ul class="p-lr-28 p-lr-15-sm">
                                        <!-- Poids -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Weight
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->weight ?? 'Not specified' }}
                                            </span>
                                        </li>

                                        <!-- Matériaux -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Materials
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->material ?? '100% coton' }}
                                            </span>
                                        </li>

                                        <!-- Couleur -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Color
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->color ?? 'Blanc' }}
                                            </span>
                                        </li>

                                        <!-- Type de manches -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Sleeve Type
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->sleeve_type ?? 'Manches courtes' }}
                                            </span>
                                        </li>

                                        <!-- Type de col -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Collar Type
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->collar_type ?? 'Col rond' }}
                                            </span>
                                        </li>

                                        <!-- Coupe -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Fit
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->fit ?? 'Coupe droite' }}
                                            </span>
                                        </li>

                                        <!-- Tailles disponibles -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Size
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->size_available ?? 'S, M, L, XL' }}
                                            </span>
                                        </li>

                                        <!-- Instructions d'entretien -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Care Instructions
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->care_instructions ?? 'Lavable en machine à 30°C' }}
                                            </span>
                                        </li>

                                        <!-- Tags -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Tags
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->tags ?? 'Not specified' }}
                                            </span>
                                        </li>

                                        <!-- Note moyenne -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Rating
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->rating ?? '4.5' }} / 5
                                            </span>
                                        </li>

                                        <!-- Ventes -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Sales Count
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->sales_count ?? 0 }}
                                            </span>
                                        </li>

                                        <!-- Remise -->
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Discount
                                            </span>
                                            <span class="stext-102 cl6 size-206">
                                                {{ $product->details->discount ?? 0 }}%
                                                @if ($product->details->discount_end_date)
                                                    (until
                                                    {{ \Carbon\Carbon::parse($product->details->discount_end_date)->format('d M Y') }})
                                                @endif
                                            </span>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            @livewire('guest.partials.post.review', ['productId' => $product->id])
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
                <!--  code unique de l article-->
                {{ $product->category->name }}
            </span>

            <span class="stext-107 cl6 p-lr-25">
                Categories: {{ $product->category->name }}
            </span>
        </div>
    </section>
    @livewire('products.partials.related-products', [$product->category->id])
</div>
