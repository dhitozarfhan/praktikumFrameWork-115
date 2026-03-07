<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Kategori;

echo "Initial Counts:\n";
echo "Users: " . User::count() . "\n";
echo "Products: " . Product::count() . "\n";
echo "Kategoris: " . Kategori::count() . "\n\n";

echo "Creating 1 User...\n";
$user = User::factory()->create(['name' => 'Test User', 'email' => 'test_unique@example.com']);
echo "Counts after User creation:\n";
echo "Users: " . User::count() . "\n\n";

echo "Creating 20 Products...\n";
$products = Product::factory()->count(20)->create(['user_id' => $user->id]);
echo "Counts after Product creation:\n";
echo "Users: " . User::count() . "\n";
echo "Products: " . Product::count() . "\n\n";

echo "Creating 10 Kategoris (using make())...\n";
$kategoris = Kategori::factory()->count(10)->make();
echo "Counts after Kategori make():\n";
echo "Users: " . User::count() . "\n";
echo "Products: " . Product::count() . "\n";
echo "Kategoris: " . Kategori::count() . "\n\n";

echo "Saving 10 Kategoris...\n";
foreach ($kategoris as $k) {
    $k->product_id = $products->random()->id;
    $k->save();
}
echo "Counts after Kategori saving:\n";
echo "Users: " . User::count() . "\n";
echo "Products: " . Product::count() . "\n";
echo "Kategoris: " . Kategori::count() . "\n";
