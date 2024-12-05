<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    // table
    protected $table = 'product_category';

    protected $primaryKey = 'product_category_id';

    protected $fillable = [
        'product_category_id',
        'product_category_name',
        'parent_id',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];

    // Quan hệ một nhiều (Cha - Con)
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    // Quan hệ nhiều một (Con - Cha)
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    

}


