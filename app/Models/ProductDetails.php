<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    //
    protected $fillable = [
        'product_id',
        'color',
        'material',
        'sleeve_type',
        'collar_type',
        'fit',
        'size_available',
        'care_instructions',
        'tags',
        'image_url',
        'rating',
        'sales_count',
        'discount',
        'discount_end_date',
        'added_date',
        'long_description',
        'isNew',
        'isSold',
        'isOnSale',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
