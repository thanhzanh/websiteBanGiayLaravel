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

}


