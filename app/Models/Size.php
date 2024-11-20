<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    // table
    protected $table = 'size';

    protected $primaryKey = 'size_id';

    protected $fillable = [
        'size_id',
        'size_name'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_size', 'product_id', 'size_id');
    }
    
}
