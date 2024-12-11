<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "orders_detail";

    protected $primaryKey = "order_detail_id ";

    protected $fillable = [
        'order_id', 
        'product_id',
        'quantity', 
        'price',
        'total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
