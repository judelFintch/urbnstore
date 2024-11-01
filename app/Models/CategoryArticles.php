<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }


}
