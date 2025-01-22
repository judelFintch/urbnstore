<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HandlesProductImages
{
    public function uploadImages(array $files): array
    {
        $uploadedImages = [];
        foreach ($files as $file) {
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $path = $file->store('products', 'public');
                $uploadedImages[] = Storage::url($path);
            }
        }

        return $uploadedImages;
    }
}
