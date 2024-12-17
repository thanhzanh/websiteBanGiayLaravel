<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin'; // Tên bảng

    protected $primaryKey = 'admin_id'; // Xác định khóa chính là 'admin_id'

    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password',
        'admin_phone',
        'admin_image',
        'admin_desc',
        'is_fixed'
    ];
}
