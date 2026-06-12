<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone', 'address',
        'delivery_method', 'payment_method', 'total_price'
    ];


    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
