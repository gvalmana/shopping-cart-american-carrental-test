<?php

namespace App\Models\shopping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'price',
        'description',
        'image'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $casts = [
        'total' => 'decimal:2',
    ];

    public function getImageAttribute()
    {
        return Storage::disk('products')->url($this->attributes['image']);
    }
}
