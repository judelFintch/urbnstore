<div>
    <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
        data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h5 class="nk-block-title">New Category</h5>
                <div class="nk-block-des">
                    <p>Add information and create a new category.</p>
                </div>
            </div>
        </div>

        <div class="nk-block">
            <form wire:submit.prevent="save">
                <div class="row g-3">
                    <!-- Category Name -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="category-name">Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="category-name" wire:model="name">
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Category Slug -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="category-slug">Slug</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="category-slug" wire:model="slug">
                            </div>
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control" id="description" wire:model="description"></textarea>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Active Status -->
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="is_active">Is Active</label>
                            <div class="form-control-wrap">
                                <select class="form-control" id="is_active" wire:model="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            @error('is_active')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            <em class="icon ni ni-plus"></em>
                            <span>Add Category</span>
                        </button>
                    </div>
                </div>
            </form>

            @if (session()->has('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
