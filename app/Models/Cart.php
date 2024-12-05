<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $primaryKey = 'cart_id'; // Khóa chính
    protected $fillable = [
        'user_id',
        'session_id',
    ];

    // Mối quan hệ: Một giỏ hàng thuộc về một user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Mối quan hệ: Một giỏ hàng có nhiều sản phẩm
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id', 'cart_id');
    }
}
