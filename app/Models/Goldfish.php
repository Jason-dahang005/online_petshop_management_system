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
}
