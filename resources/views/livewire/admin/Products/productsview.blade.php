<div>

    @include('livewire.admin.partials.sidebar')
    @include('livewire.admin.partials.header')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Products</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control" id="default-04"
                                                        placeholder="Quick search by id">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                        class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                        data-bs-toggle="dropdown">Status</a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>New Items</span></a></li>
                                                            <li><a href="#"><span>Featured</span></a></li>
                                                            <li><a href="#"><span>Out of Stock</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Add Product</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->






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
                                            <div class="nk-tb-col tb-col-md"><em
                                                    class="tb-asterisk icon ni ni-star-round"></em></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="me-n1">
                                                        <div class="dropdown">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger"
                                                                data-bs-toggle="dropdown">
                                                                <em class="icon ni ni-more-h"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                Selected</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-trash"></em><span>Remove
                                                                                Selected</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-bar-c"></em><span>Update
                                                                                Stock</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-invest"></em><span>Update
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
                                                    <div
                                                        class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="pid{{ $product->id }}">
                                                        <label class="custom-control-label"
                                                            for="pid{{ $product->id }}"></label>
                                                    </div>
                                                </div>


                                                @php
                                                $imageId = sprintf('%02d', $product->id);
                                                $imagePath = asset("images/product-{$imageId}.jpg");
                                                
                                            @endphp


                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-product">
                                                        <img src="{{ $imagePath }}" alt=""
                                                            class="thumb">
                                                        <span class="title">{{ $product->name }}</span>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $product->sku }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span
                                                        class="tb-lead">${{ number_format($product->price, 2) }}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $product->stock }}</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">{{ $product->category->name }}</span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <div class="asterisk tb-asterisk">
                                                        <a href="#"><em
                                                                class="asterisk-off icon ni ni-star"></em><em
                                                                class="asterisk-on icon ni ni-star-fill"></em></a>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="me-n1">
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                                    data-bs-toggle="dropdown">
                                                                    <em class="icon ni ni-more-h"></em>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-edit"></em><span>Edit
                                                                                    Product</span></a></li>
                                                                        <li><a
                                                                                href="{{ route('admin.products.view', $product->id) }}"><em
                                                                                    class="icon ni ni-eye"></em><span>View
                                                                                    Product</span></a></li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-activity-round"></em><span>Product
                                                                                    Orders</span></a></li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-trash"></em><span>Remove
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
                                            <div
                                                class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                <div>Page</div>
                                                <div>
                                                    <select class="form-select js-select2" data-search="on"
                                                        data-dropdown="xs center">
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


                    <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct"
                        data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">New Product</h5>
                                <div class="nk-block-des">
                                    <p>Add information and add new product.</p>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->

                        <div class="nk-block">
                            <div class="row g-3">
                                <!-- Product Title -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="product-title">Product Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="product-title"
                                                wire:model="title">
                                        </div>
                                    </div>
                                </div>

                                <!-- Regular Price -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="regular-price">Regular Price</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="regular-price"
                                                wire:model="price">
                                        </div>
                                    </div>
                                </div>

                                <!-- Stock -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="stock">Stock</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="stock"
                                                wire:model="stock">
                                        </div>
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="category">Category</label>
                                        <div class="form-control-wrap">
                                            <select class="form-control" id="category" wire:model="category_id">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Color -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="color">Color</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="color"
                                                wire:model="color">
                                        </div>
                                    </div>
                                </div>

                                <!-- Material -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="material">Material</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="material"
                                                wire:model="material">
                                        </div>
                                    </div>
                                </div>

                                <!-- Sleeve Type -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="sleeve_type">Sleeve Type</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="sleeve_type"
                                                wire:model="sleeve_type">
                                        </div>
                                    </div>
                                </div>

                                <!-- Collar Type -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="collar_type">Collar Type</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="collar_type"
                                                wire:model="collar_type">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fit -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fit">Fit</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fit"
                                                wire:model="fit">
                                        </div>
                                    </div>
                                </div>

                                <!-- Size Available -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="size_available">Size Available</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="size_available"
                                                wire:model="size_available">
                                        </div>
                                    </div>
                                </div>

                                <!-- Care Instructions -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="care_instructions">Care Instructions</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="care_instructions"
                                                wire:model="care_instructions">
                                        </div>
                                    </div>
                                </div>

                                <!-- Tags -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="tags">Tags</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="tags"
                                                wire:model="tags">
                                        </div>
                                    </div>
                                </div>

                                <!-- Image URL -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="image_url">Image URL</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="image_url"
                                                wire:model="image_url">
                                        </div>
                                    </div>
                                </div>

                                <!-- Rating -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="rating">Rating</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="rating"
                                                wire:model="rating" min="0" max="5" step="0.1">
                                        </div>
                                    </div>
                                </div>

                                <!-- Sales Count -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="sales_count">Sales Count</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="sales_count"
                                                wire:model="sales_count">
                                        </div>
                                    </div>
                                </div>

                                <!-- Discount -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="discount">Discount</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="discount"
                                                wire:model="discount">
                                        </div>
                                    </div>
                                </div>

                                <!-- Discount End Date -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="discount_end_date">Discount End Date</label>
                                        <div class="form-control-wrap">
                                            <input type="date" class="form-control" id="discount_end_date"
                                                wire:model="discount_end_date">
                                        </div>
                                    </div>
                                </div>

                                <!-- Long Description -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="long_description">Long Description</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control" id="long_description" wire:model="long_description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button class="btn btn-primary" wire:click="save"><em
                                            class="icon ni ni-plus"></em><span>Add New</span></button>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div>



                </div>
            </div>
        </div>
    </div>
    @include('livewire.admin.partials.footer')

</div>
