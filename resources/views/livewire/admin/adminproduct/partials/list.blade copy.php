<style type="text/css">
.tb-product img {
    max-width: 50px; /* Limite la largeur de l'image */
    max-height: 50px; /* Limite la hauteur de l'image */
    object-fit: cover; /* Coupe l'image pour s'adapter */
    border-radius: 5px; /* Optionnel : arrondit légèrement les coins */
    margin-right: 10px; /* Ajoute un espace entre l'image et le texte */
}

</style>

<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner-group">
            <div class="card-inner p-0">
                <div class="nk-tb-list">
                    <!-- Table Head -->
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="pid">
                                <label class="custom-control-label" for="pid"></label>
                            </div>

                        </div>
                        <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                        <div class="nk-tb-col"><span>SKU</span></div>
                        <div class="nk-tb-col"><span>Price</span></div>
                        <div class="nk-tb-col"><span>Stock</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Category</span></div>
                        <div class="nk-tb-col tb-col-md"><em class="tb-asterisk icon ni ni-star-round"></em></div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1 my-n1">
                                <li class="me-n1">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown">
                                            <em class="icon ni ni-more-h"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit
                                                            Selected</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove
                                                            Selected</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update
                                                            Stock</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-invest"></em><span>Update
                                                            Price</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Loop through products -->
                    @foreach ($products as $product)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="pid{{ $product->id }}">
                                    <label class="custom-control-label" for="pid{{ $product->id }}"></label>
                                </div>
                            </div>

                            @php
                                $images = json_decode($product->details->image_url, true); // Decode JSON into an array

                            @endphp

                            <div class="nk-tb-col tb-col-sm">
                                <span class="tb-product">
                                    @if (count($images) > 0)
                                        <!-- Affiche la première image si elle existe -->
                                        <img src="{{ url($images[0]) }}" alt="{{ $product->title }}" class="thumb">
                                    @else
                                        <!-- Si aucune image n'est disponible, afficher une image par défaut -->
                                        <img src="{{ asset('path/to/default-image.jpg') }}" alt="No image"
                                            class="thumb">
                                    @endif
                                    <span class="title">{{ $product->title }}</span>
                                </span>
                            </div>


                            <div class="nk-tb-col">
                                <span class="tb-sub">{{ $product->sku }}</span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-lead">${{ number_format($product->price, 2) }}</span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-sub">{{ $product->stock }}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span class="tb-sub">{{ $product->category->name }}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <div class="asterisk tb-asterisk">
                                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em
                                            class="asterisk-on icon ni ni-star-fill"></em></a>
                                </div>
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="me-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit
                                                                Product</span></a></li>
                                                    <li><a href="{{ route('admin.products.details', $product->id) }}"><em
                                                                class="icon ni ni-eye"></em><span>View
                                                                Product</span></a></li>
                                                    <li><a href="#"><em
                                                                class="icon ni ni-activity-round"></em><span>Product
                                                                Orders</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove
                                                                Product</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-tb-item -->
                    @endforeach

                </div><!-- .nk-tb-list -->
            </div>
            <div class="card-inner">
                <div class="nk-block-between-md g-3">
                    <div class="g">
                        <ul class="pagination justify-content-center justify-content-md-start">
                            <li class="page-item"><a class="page-link" href="#"><em
                                        class="icon ni ni-chevrons-left"></em></a></li>
                            <li class="page-item"><a class="page-link" href="#"><em
                                        class="icon ni ni-chevrons-right"></em></a></li>
                        </ul><!-- .pagination -->
                    </div>
                    <div class="g">
                        <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                            <div>Page</div>
                            <div>
                                <select class="form-select js-select2" data-search="on" data-dropdown="xs center">
                                    <option value="page-1">1</option>
                                    <option value="page-2">2</option>
                                    <option value="page-3">3</option>
                                    <!-- Add other pages as needed -->
                                </select>
                            </div>
                            <div>OF 102</div>
                        </div>
                    </div><!-- .pagination-goto -->
                </div><!-- .nk-block-between -->
            </div>
        </div>
    </div>
</div><!-- .nk-block -->
