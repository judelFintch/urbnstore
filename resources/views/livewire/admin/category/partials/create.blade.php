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
             <div class="row g-3">
                 <!-- Category Name -->
                 <div class="col-12">
                     <div class="form-group">
                         <label class="form-label" for="category-name">Name</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="category-name" wire:model="name">
                         </div>
                     </div>
                 </div>

                 <!-- Category Slug -->
                 <div class="col-12">
                     <div class="form-group">
                         <label class="form-label" for="category-slug">Slug</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="category-slug" wire:model="slug">
                         </div>
                     </div>
                 </div>

                 <!-- Description -->
                 <div class="col-12">
                     <div class="form-group">
                         <label class="form-label" for="description">Description</label>
                         <div class="form-control-wrap">
                             <textarea class="form-control" id="description" wire:model="description"></textarea>
                         </div>
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
                     </div>
                 </div>

                 <!-- Submit Button -->
                 <div class="col-12">
                     <button class="btn btn-primary" wire:click="save"><em class="icon ni ni-plus"></em><span>Add
                             Category</span></button>
                 </div>
             </div>
         </div><!-- .nk-block -->
     </div>
