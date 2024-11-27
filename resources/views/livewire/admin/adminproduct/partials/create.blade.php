<div class="nk-block">
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="row g-3">
            <!-- Product Title -->
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="product-title">Product Title</label>
                    <div class="form-control-wrap">
                        <input type="text" value="TEST" class="form-control" id="product-title"
                            wire:model.defer="title">
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Regular Price -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="regular-price">Regular Price</label>
                    <div class="form-control-wrap">
                        <input type="number" value="10" class="form-control" id="regular-price"
                            wire:model.defer="price">
                        <span class="text-danger">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Stock -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="stock">Stock</label>
                    <div class="form-control-wrap">
                        <input value="10" type="number" class="form-control" id="stock"
                            wire:model.defer="stock">
                        <span class="text-danger">
                            @error('stock')
                                {{ $message }}
                            @enderror
                        </span>
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
                        <span class="text-danger">
                            @error('category_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Additional Fields -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="color">Color</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="color" wire:model.defer="color">
                        <span class="text-danger">
                            @error('color')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="material">Material</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="material" wire:model.defer="material">
                        <span class="text-danger">
                            @error('material')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Sleeve Type -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="sleeve_type">Sleeve Type</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="sleeve_type" wire:model.defer="sleeve_type">
                        <span class="text-danger">
                            @error('sleeve_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Collar Type -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="collar_type">Collar Type</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="collar_type" wire:model.defer="collar_type">
                        <span class="text-danger">
                            @error('collar_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Fit -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="fit">Fit</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="fit" wire:model.defer="fit">
                        <span class="text-danger">
                            @error('fit')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Size Available -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="size_available">Size Available</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="size_available" wire:model.defer="size_available">
                        <span class="text-danger">
                            @error('size_available')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Care Instructions -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="care_instructions">Care Instructions</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="care_instructions" wire:model.defer="care_instructions">
                        <span class="text-danger">
                            @error('care_instructions')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Tags -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="tags">Tags</label>
                    <div class="form-control-wrap">
                        <input type="text" class="form-control" id="tags" wire:model.defer="tags">
                        <span class="text-danger">
                            @error('tags')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Image URL -->
          

            <!-- Rating -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="rating">Rating</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="rating" step="0.1" wire:model.defer="rating">
                        <span class="text-danger">
                            @error('rating')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Sales Count -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="sales_count">Sales Count</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="sales_count" wire:model.defer="sales_count">
                        <span class="text-danger">
                            @error('sales_count')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Discount -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="discount">Discount</label>
                    <div class="form-control-wrap">
                        <input type="number" class="form-control" id="discount" step="0.01" wire:model.defer="discount">
                        <span class="text-danger">
                            @error('discount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Discount End Date -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="discount_end_date">Discount End Date</label>
                    <div class="form-control-wrap">
                        <input type="date" class="form-control" id="discount_end_date"
                            wire:model.defer="discount_end_date">
                        <span class="text-danger">
                            @error('discount_end_date')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Long Description -->
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="long_description">Long Description</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control" id="long_description" wire:model.defer="long_description"></textarea>
                        <span class="text-danger">
                            @error('long_description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <!-- Product Images (Re-integrated) -->
            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="images">Product Images</label>
                    <div class="form-control-wrap">
                        <input type="file" class="form-control" id="images" wire:model="uploadedFiles" multiple>
                        <span class="text-danger">
                            @error('uploadedFiles.*')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="mt-2">
                            @if ($uploadedFiles)
                                @foreach ($uploadedFiles as $file)
                                    <img src="{{ $file->temporaryUrl() }}" alt="Preview" class="img-thumbnail" width="100">
                                @endforeach
                            @endif
                        </div>
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
<script>
    document.addEventListener('livewire:load', () => {
        window.addEventListener('notification', event => {
            alert(event.detail.message); // Replace with your notification logic
        });
    });
</script>
