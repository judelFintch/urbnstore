<!--<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">New Product</h5>
            <div class="nk-block-des">
                <p>Add information and add new product.</p>
            </div>
        </div>
    </div>-->

    <div class="nk-block">
        <form wire:submit.prevent="save">
            <div class="row g-3">
                <!-- Product Title -->
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="product-title">Product Title</label>
                        <div class="form-control-wrap">
                            <input type="text" value="TEST" class="form-control" id="product-title" wire:model.defer="title">
                            <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <!-- Regular Price -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="regular-price">Regular Price</label>
                        <div class="form-control-wrap">
                            <input type="number" value="10" class="form-control" id="regular-price" wire:model.defer="price">
                            <span class="text-danger">@error('price') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <!-- Stock -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="stock">Stock</label>
                        <div class="form-control-wrap">
                            <input value="10" type="number" class="form-control" id="stock" wire:model.defer="stock">
                            <span class="text-danger">@error('stock') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <!-- Category -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="category">Category</label>
                        <div class="form-control-wrap">
                            <select class="form-control" id="category" wire:model.defer="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('category_id') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <!-- Additional Fields -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="color">Color</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="color" wire:model.defer="color">
                            <span class="text-danger">@error('color') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="material">Material</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="material" wire:model.defer="material">
                            <span class="text-danger">@error('material') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <!-- File Upload -->
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="images">Product Images</label>
                        <div class="form-control-wrap">
                            <input type="file" class="form-control" id="images" wire:model="images" multiple>
                            <span class="text-danger">@error('images.*') {{ $message }} @enderror</span>
                            <div class="mt-2">
                                @if ($images)
                                    @foreach ($images as $image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail" width="100">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Discount -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="discount">Discount</label>
                        <div class="form-control-wrap">
                            <input type="number" class="form-control" id="discount" wire:model.defer="discount">
                            <span class="text-danger">@error('discount') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="discount_end_date">Discount End Date</label>
                        <div class="form-control-wrap">
                            <input type="date" class="form-control" id="discount_end_date" wire:model.defer="discount_end_date">
                            <span class="text-danger">@error('discount_end_date') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <!-- Long Description -->
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label" for="long_description">Long Description</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" id="long_description" wire:model.defer="long_description"></textarea>
                            <span class="text-danger">@error('long_description') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </div>
    
                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <em class="icon ni ni-save"></em>
                        <span wire:loading.remove>Save Product</span>
                        <span wire:loading>Saving...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    