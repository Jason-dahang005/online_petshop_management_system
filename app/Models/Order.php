<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
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

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->order_code = IdGenerator::generate(['table' => 'orders', 'field' => 'order_code', 'length' => 10, 'prefix' =>date('y')]);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }

    public function shipping(){
        return $this->hasOne(Shipping::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}
