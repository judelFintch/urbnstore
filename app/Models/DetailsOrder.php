<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailsOrder extends Model
{
    //
    use HasFactory;
    protected $fillable = [
       
        'quantity',
        'product_id',
        'product_title',
        'product_price',
        'product_description',
        'status',
        'reference',
        'order_id'
    ];
  
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id'); // Définition de la relation belongsTo
    }
}
