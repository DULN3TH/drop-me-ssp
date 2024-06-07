<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;
use App\Enums\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 1,
        ]);

        $this->call([
            ProductCategorySeeder::class,
            ProductSeeder::class,
        ]);
        $this->call([
            ShopSeeder::class,
        ]);
    }
}
