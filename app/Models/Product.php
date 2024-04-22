<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    protected $table = 'products';
    protected $fillable = [
        'code',
        'description',
        'price',
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('code', 'like', "%$value%")
            ->orWhere('description', 'like', "%$value%");
    }

    public function children()
    {
        return $this->hasMany(Structure::class, 'master_product');
    }

    public function masters()
    {
        return $this->hasMany(Structure::class, 'child_product');
    }
}
