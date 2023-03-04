<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Chocolate', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fish', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cold Drinks', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Meat', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Personal Care', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
