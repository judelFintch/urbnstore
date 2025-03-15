<div>
    <div>
        <!-- main @s -->
        <div class="nk-main">
            <!-- wrap @s -->
            <div class="nk-wrap">
                <!-- main header @s -->
                @include('livewire.admin.partials.header')
                <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">z
                            <div class="nk-content-body">
                                @livewire('admin.product.partials.header', ['content' => 'create'])
                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold mb-2">Ajouter des photos</h4>
                                    
                                        <!-- Sélection multiple de fichiers -->
                                        <input type="file" wire:model="photos" multiple class="mb-3">
                                    
                                        <!-- Message d'erreur -->
                                        @error('photos.*')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    
                                        <!-- Bouton d'upload -->
                                        <button wire:click="savePhotos" class="bg-blue-500 text-white px-4 py-2 rounded">
                                            Enregistrer les photos
                                        </button>
                                    
                                        <!-- Message de confirmation -->
                                        @if (session()->has('message'))
                                            <p class="text-green-500 mt-2">{{ session('message') }}</p>
                                        @endif
                                    
                                        <!-- Affichage des photos existantes -->
                                        <h5 class="mt-5 font-semibold">Photos enregistrées :</h5>
                                        <div class="row">
                                            @foreach ($pictures as $picture)
                                                <?php $url_image = cleanImageUrl($picture->image_path); ?>
                                                <div class="col-md-4">
                                                    <div class="border rounded-lg overflow-hidden shadow-md relative group hover:scale-105 transition-transform duration-300">
                                                        <img src="{{ asset('storage/' . cleanImageUrl($picture->image_path)) }}" class="w-full aspect-square object-cover">
                                    
                                                        <!-- Bouton de suppression -->
                                                        <button wire:click="deletePhoto({{ $picture->id }})"
                                                            class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full opacity-100 hover:opacity-100 transition-opacity duration-300">
                                                            🗑️
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                </div> <!-- Fin de nk-block nk-block-lg -->
                            </div> <!-- Fin de nk-content-body -->
                        </div> <!-- Fin de nk-content-inner -->
                    </div> <!-- Fin de container-fluid -->
                </div> <!-- Fin de nk-content -->
            </div> <!-- Fin de nk-wrap -->
        </div> <!-- Fin de nk-main -->
    </div>
</div>
