<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goldfish extends Model
{
    use HasFactory;
    protected $table = 'goldfish';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image'
        
    ];

    public static function search($search){
        return empty($search) ? static::query()
        : static::query()->where('name', 'like', '%'.$search.'%')
        ->orWhere('slug', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->orWhere('status', 'like', '%'.$search.'%')
        ->orWhere('product_category_id', 'like', '%'.$search.'%')
        ->orWhere('price', 'like', '%'.$search.'%')
        ->orWhere('stock', 'like', '%'.$search.'%')
        ->orWhere('created_at', 'like', '%'.$search.'%');
    }

}
