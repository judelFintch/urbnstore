<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'stock',
        'is_active',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryArticles::class);
    }

    public function details()
    {
        return $this->hasOne(ProductDetails::class);
    }

    public function getFirstImageUrl(): string
    {
        $imageUrls = ! empty($this->details->image_url) ? json_decode($this->details->image_url, true) : [];

        return (! empty($imageUrls) && is_array($imageUrls) && count($imageUrls) > 0)
            ? Storage::url($imageUrls[0])
            : asset('path/to/default-image.jpg');
    }

    public function getAllImageUrls(): array
    {
        $imageUrls = ! empty($this->details->image_url) ? json_decode($this->details->image_url, true) : [];

        return array_map(function ($image) {
            return Storage::url($image);
        }, $imageUrls);
    }
}
