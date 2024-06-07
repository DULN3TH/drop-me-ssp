<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveryServices = array(
            array(
                'name' => 'Pizza Hut',
                'description' => 'Pizza',
                'email' => 'pizzahut@gmail.com',
                'password' => 'Pizza12'
            ),
            array(
                'name' => 'Nike',
                'description' => 'Sapaththu',
                'email' => 'nike@gmail.com',
                'password' => 'nike',
            ),
            array(
                'name' => 'Samsung',
                'description' => 'Electric baanda',
                'email' => 'samsung@gmail.com',
                'password' => 'samsung'
            ),
        );

        foreach ($deliveryServices as $food) {
            \App\Models\Shop::create([
                'name' => $food['name'],
                'slug' => \Illuminate\Support\Str::slug($food['name']),
                'description' => $food['description'],
            ]);
        }
    }
}
