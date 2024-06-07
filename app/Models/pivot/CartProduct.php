<?php

namespace App\Models\pivot;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProduct extends pivot
{
    public $timestamps = true;
    protected $fillable = [
        'quantity',
        'tax',
        'discount',
        'price',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'tax' => 'float',
        'discount' => 'float',
        'price' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
