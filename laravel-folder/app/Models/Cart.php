<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fullable=[
        'user_id',
        'product_id',
        'qty',
    ];

    protected $with=['products'];
    public function products()
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }
}
