<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CategoryArticles extends Model
{
    //

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'created_at',
        'updated_at',
        'is_featured',
        'photo',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getAllCategoryImageUrls(): array
    {
        $imageUrls = [];

        // Vérifier si l'image est un chemin unique ou un JSON
        if (! empty($this->image_url)) {
            // Si c'est un tableau JSON encodé
            $decoded = json_decode($this->image_url, true);
            if (is_array($decoded)) {
                $imageUrls = $decoded;
            } else {
                // Si c'est une chaîne unique
                $imageUrls[] = $this->image_url;
            }
        }

        // Convertir chaque chemin relatif en URL publique
        return array_map(function ($image) {
            return Storage::url($image);
        }, $imageUrls);
    }
}
