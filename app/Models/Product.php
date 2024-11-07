<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    
}
