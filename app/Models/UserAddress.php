<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresss';

    protected $primaryKey = 'user_address_id';

    protected $fillable = [
        'user_id',
        'label',
        'receiver_name',
        'receiver_phone',
        'address',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
