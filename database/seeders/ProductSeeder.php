<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Product A',
            'category' => 'Category 1',
            'price' => 10000,
            'stock' => 10,
        ]);
        
    }
}
