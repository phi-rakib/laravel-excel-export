<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        $now = Carbon::now()->toDateTimeString();

        Product::insert([
            ['name' => 'Pran Sixers', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'CBL Next', 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pran Fruto', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Coco Cola', 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now], 
            ['name' => 'Revive Shampoo', 'category_id' => 5, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
