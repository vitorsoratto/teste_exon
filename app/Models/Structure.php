<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $table = 'structures';
    protected $fillable = [
        'master_product',
        'child_product',
        'quantity',
    ];

    public function master()
    {
        return $this->belongsTo(Product::class, 'master_product', 'code');
    }

    public function child()
    {
        return $this->belongsTo(Product::class, 'child_product', 'code');
    }
}
