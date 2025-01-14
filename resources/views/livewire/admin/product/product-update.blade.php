<div>
    <!-- main @s -->
    <div class="nk-main">
        <!-- wrap @s -->
        <div class="nk-wrap">
            <!-- main header @s -->
            @include('livewire.admin.partials.header')
            <div class="nk-content">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Modifier une Catégorie</h5>
                                        <div class="nk-block-des">
                                            <p>Modifiez les informations de la catégorie sélectionnée.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <!-- Product Title -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Product Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="product-title"
                                                            wire:model.defer="title">
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Regular Price -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="regular-price">Regular Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="regular-price"
                                                            wire:model.defer="price">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Stock -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="stock">Stock</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="stock"
                                                            wire:model.defer="stock">
                                                        @error('stock')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Category -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="category">Category</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-control" id="category"
                                                            wire:model.defer="category_id">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Additional Fields -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="color">Color</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="color"
                                                            wire:model.defer="color">
                                                        @error('color')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="material">Material</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="material"
                                                            wire:model.defer="material">
                                                        @error('material')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Sleeve Type -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="sleeve_type">Sleeve Type</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="sleeve_type"
                                                            wire:model.defer="sleeve_type">
                                                        @error('sleeve_type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Collar Type -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="collar_type">Collar Type</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="collar_type"
                                                            wire:model.defer="collar_type">
                                                        @error('collar_type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Fit -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fit">Fit</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fit"
                                                            wire:model.defer="fit">
                                                        @error('fit')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Size Available -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="size_available">Size Available</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="size_available"
                                                            wire:model.defer="size_available">
                                                        @error('size_available')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Care Instructions -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="care_instructions">Care Instructions</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="care_instructions"
                                                            wire:model.defer="care_instructions">
                                                        @error('care_instructions')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tags -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Tags</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="tags"
                                                            wire:model.defer="tags">
                                                        @error('tags')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Existing Images -->
                                            <div class="col-12">
                                                <label class="form-label">Existing Images</label>
                                                <div class="d-flex flex-wrap gap-3">
                                                    @foreach ($images as $key => $image)
                                                        <div class="position-relative">
                                                            <img src="{{ asset('storage/' . $image) }}" alt="Image"
                                                                class="img-thumbnail" width="100">
                                                            <button type="button" class="btn btn-danger btn-sm position-absolute"
                                                                style="top: 5px; right: 5px;"
                                                                wire:click="deleteImage({{ $key }})">×</button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Upload New Images -->
                                            <div class="col-12">
                                                <label class="form-label" for="new-images">Upload New Images</label>
                                                <input type="file" class="form-control" id="new-images"
                                                    wire:model="uploadedFiles" multiple>
                                                @error('uploadedFiles.*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">
                                                    <em class="icon ni ni-save"></em>
                                                    <span>Save Product</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
