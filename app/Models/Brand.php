<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'brand';

    // Các cột có thể được ghi (để bảo vệ chống lại tấn công mass assignment)
    protected $fillable = [
        'brand_name',
        'logo',
        'brand_product',
        'year_of_manufacture',
        'country',
        'revenue',
        'admin_id'
    ];
}
