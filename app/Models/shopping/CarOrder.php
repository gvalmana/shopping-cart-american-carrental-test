<?php

namespace App\Models\shopping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarOrder extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillables = [
        'client_name',
        'client_email',
        'client_phone',
        'total',
    ];

    protected $casts = [
        'client_name' => 'string',
        'client_email' => 'string',
        'client_phone' => 'string',
        'total' => 'decimal:2',
    ];

    public function items()
    {
        return $this->hasMany(CarItem::class);
    }
}
