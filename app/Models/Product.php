<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'Product';
    protected $primarykey = 'product_id'; // Xác định khóa chính là 'product_id'
    public $incrementing = false; // Xác định khóa chính ko tự động tăng
    protected $keyType = 'string'; // Nếu khóa chính không phải số nguyên thì khai báo dòng này 
}
