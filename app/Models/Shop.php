<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'description',
        'slug'
    ];

//    public function products()
//    {
//        return $this->hasMany(Product::class);
//    }
}
