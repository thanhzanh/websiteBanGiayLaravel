<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaction";

    protected $primaryKey = "transaction_id";

    protected $fillable = [
        'order_id', 
        'payment_method',
        'status', 
        'amount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
