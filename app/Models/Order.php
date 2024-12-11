<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $primaryKey = "order_id";

    protected $fillable = [
        'order_id',
        'code',
        'user_id',
        'user_address_id',
        'total',
        'status'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
