<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Es Krim Matcha',
            'image' => 'products/eskrim.jpg',
            'price' => 8000,
            'description' => 'Cocok dinikmati bareng gebetanmu nih!',
        ]);

        Product::create([
            'name' => 'Soto Ayam',
            'image' => 'products/sotoayam.jpeg',
            'price' => 6000,
            'description' => 'Enak dinikmati setelah dari pantai!',
        ]);
    }
}
