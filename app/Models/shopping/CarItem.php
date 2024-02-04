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
        'car_order_id',
        'product_id',
        'deleted_at',
    ];
    protected $casts = [
        'quantity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function carOrder()
    {
        return $this->belongsTo(CarOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
