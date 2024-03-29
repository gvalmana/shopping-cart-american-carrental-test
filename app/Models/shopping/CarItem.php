<?php

namespace App\Models\shopping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'car_order_id',
        'product_id',
        'quantity',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
        'car_order_id',
        'product_id',
        'deleted_at',
    ];
    protected $casts = [
        'quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'total' => 'decimal:2',
    ];
    protected $appends = ['total'];
    public function carOrder()
    {
        return $this->belongsTo(CarOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalAttribute()
    {
        return $this->quantity * $this->product->price;
    }
}
