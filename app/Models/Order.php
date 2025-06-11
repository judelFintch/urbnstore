<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'status',
        'reference',
        'tel',
        'user_id'
    ];


    public function details()
    {
        return $this->hasMany(DetailsOrder::class, 'order_id'); // Définition de la relation hasMany
    }
}
