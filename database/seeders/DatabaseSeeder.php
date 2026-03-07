<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Kategori;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 1 User
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 20 Products for that user
        $products = Product::factory()->count(20)->create([
            'user_id' => $user->id,
        ]);

        // Create 10 Kategoris using the existing products
        Kategori::factory()->count(10)->recycle($products)->create();
    }
}
