<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderItems;
class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=[
        'firstname',
        'lastname',
        'email',
        'address',
        'state',
        'phone',
        'city',
        'zipcode',

    ];
    public function orderitems(){
        return $this->hasMany(orderItems::class,'order_id','id');
    }
}
