<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $table = 'product'; // Tên bảng

    protected $primaryKey = 'product_id'; // Xác định khóa chính là 'product_id'

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'discount',
        'quantity',
        'image_id',
        'status',
        'featured',
        'slug',
        'size_id',
        'product_category_id',
        'created_at',
        'updated_at'
    ];

    // Mối quan hệ với bảng Category
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    // mối quan hệ
    public function size()
    {
        return $this->belongsToMany(Size::class, 'product_size', 'product_id', 'size_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'product_id');
    }
    

    // slug
    public function setProductNameAttribute($value)
    {
        $this->attributes['product_name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }
}
