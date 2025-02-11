<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    protected $fillable = [
        'product_id',
        'email',
        'name',
        'rating',
        'content',

    ];

    // Relation example: reviews belong to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
