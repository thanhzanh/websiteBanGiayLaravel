<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Khóa chính

    protected $fillable = [
        'cart_id',
        'product_id',
        'size_id',
        'quantity',
        'price',
    ];

    // Mối quan hệ: Một sản phẩm trong giỏ hàng thuộc về một giỏ hàng
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    // Mối quan hệ: Một sản phẩm trong giỏ hàng liên kết với một sản phẩm cụ thể
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    // Mối quan hệ: Một sản phẩm trong giỏ hàng liên kết với một kích cỡ
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'size_id');
    }
}
