<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $category = Category::create(['name' => 'Electronics']);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        Product::create([
            'name' => 'Laptop',
            'description' => 'High performance laptop',
            'quantity' => 10,
            'price' => 1500,
            'user_id' => $admin->id,
            'category_id' => $category->id,
        ]);

        Product::create([
            'name' => 'Smartphone',
            'description' => 'Latest smartphone',
            'quantity' => 5,
            'price' => 800,
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);
    }
}
