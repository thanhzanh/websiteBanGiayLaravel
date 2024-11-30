<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ForgotPassword extends Model
{
    use HasFactory;

    // Chỉ định bảng liên kết
    protected $table = 'password_resets'; // Bảng mặc định của Laravel là password_resets

    // Các trường có thể được gán đại trà (mass assignable)
    protected $fillable = [
        'admin_email',
        'token'
    ];
}
