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
                        <input type="text" class="form-control" id="product-title" wire:model="title">
                    </div>
                </div>
            </div>

            <!-- Regular Price -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="regular-price">Regular Price</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="regular-price" wire:model="price">
                    </div>
                </div>
            </div>

            <!-- Stock -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="stock">Stock</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="stock" wire:model="stock">
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
                        <input type="text" class="form-control" id="color" wire:model="color">
                    </div>
                </div>
            </div>

            <!-- Material -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="material">Material</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="material" wire:model="material">
                    </div>
                </div>
            </div>

            <!-- Sleeve Type -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="sleeve_type">Sleeve Type</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="sleeve_type" wire:model="sleeve_type">
                    </div>
                </div>
            </div>

            <!-- Collar Type -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="collar_type">Collar Type</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="collar_type" wire:model="collar_type">
                    </div>
                </div>
            </div>

            <!-- Fit -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="fit">Fit</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="fit" wire:model="fit">
                    </div>
                </div>
            </div>

            <!-- Size Available -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="size_available">Size Available</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="size_available" wire:model="size_available">
                    </div>
                </div>
            </div>

            <!-- Care Instructions -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="care_instructions">Care Instructions</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="care_instructions" wire:model="care_instructions">
                    </div>
                </div>
            </div>

            <!-- Tags -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="tags">Tags</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="tags" wire:model="tags">
                    </div>
                </div>
            </div>

            <!-- Image URL -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="image_url">Image URL</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="image_url" wire:model="image_url">
                    </div>
                </div>
            </div>

            <!-- Rating -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="rating">Rating</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="rating" wire:model="rating" min="0" max="5" step="0.1">
                    </div>
                </div>
            </div>

            <!-- Sales Count -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="sales_count">Sales Count</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="sales_count" wire:model="sales_count">
                    </div>
                </div>
            </div>

            <!-- Discount -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="discount">Discount</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="discount" wire:model="discount">
                    </div>
                </div>
            </div>

            <!-- Discount End Date -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="discount_end_date">Discount End Date</label>
                    <div class="form-control-wrap">
                        <input type="date" class="form-control" id="discount_end_date" wire:model="discount_end_date">
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
                <button class="btn btn-primary" wire:click="save"><em class="icon ni ni-plus"></em><span>Add New</span></button>
            </div>
        </div>
    </div><!-- .nk-block -->
</div>
