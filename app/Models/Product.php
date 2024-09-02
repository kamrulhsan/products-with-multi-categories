<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'long_description',
        'is_active',
        'short_description',
        'stock_qty',
        'sku',
        'thumbnail',
        'slug',
        'title',
        'created_by_id',
        'deleted_by_id',
        'updated_by_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function purchases()
    {
        return $this->hasMany(ProductPurchase::class);
    }
}
