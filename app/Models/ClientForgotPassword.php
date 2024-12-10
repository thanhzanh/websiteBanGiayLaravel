<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientForgotPassword extends Model
{
    protected $table = 'client_password_resets'; // table client_password_resets

    protected $fillable = [
        'user_email',
        'token'
    ];
}
