<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image'; // Tên bảng

    protected $primaryKey = 'image_id'; // Xác định khóa chính là 'image_id'

    // để lưu dữ liệu
    protected $fillable = [
        'product_id',
        'file_image_url',
    ];

    // khóa ngoại qua product_id
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
