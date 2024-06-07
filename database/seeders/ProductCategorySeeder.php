<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveryServices = array(
            array(
                'name' => 'Food & Beverages',
                'description' => 'Food'
            ),
            array(
                'name' => 'Electronics',
                'description' => 'Electric badu'
            ),
            array(
                'name' => 'Clothes',
                'description' => 'Cloth'
            ),
        );

        foreach ($deliveryServices as $food) {
            \App\Models\ProductCategory::create([
                'name' => $food['name'],
                'slug' => \Illuminate\Support\Str::slug($food['name']),
                'description' => $food['description'],
            ]);
          }
    }
}
