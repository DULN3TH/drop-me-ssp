<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'meta_title',
        'category_id',
        'meta_description',
        'meta_keywords',
        'vendor_id',
        'price',
        'order_by',
        'status',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function getimage()
    {
        if (!empty($this->image) && file_exists(public_path('product_image/' . $this->image))) {
            return asset('product_image/' . $this->image);
        } else {
            return "**";
        }
    }


}
