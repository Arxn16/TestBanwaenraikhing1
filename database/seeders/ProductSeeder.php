<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 100,
            'stock' => 50,
            'description' => 'This is a description for Product 1'
        ]);
        Product::create([
            'name' => 'Product 2',
            'price' => 150,
            'stock' => 30,
            'description' => 'This is a description for Product 2'
        ]);
    }
}
