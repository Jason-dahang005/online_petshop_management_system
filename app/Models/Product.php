<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'product_category_id',
        'description',
        'price',
        'stock',
        'image',
        'status'
    ];

    public static function search($search){
        return empty($search) ? static::query()
        : static::query()->where('name', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->orWhere('status', 'like', '%'.$search.'%')
        ->orWhere('product_category_id', 'like', '%'.$search.'%')
        ->orWhere('price', 'like', '%'.$search.'%')
        ->orWhere('stock', 'like', '%'.$search.'%')
        ->orWhere('created_at', 'like', '%'.$search.'%');
    }

    public function category(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
