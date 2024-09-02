<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'id'            => 1,
                'category_name' => 'Technology',
                'updated_at'    => now(),
                'created_at'    => now()
            ],
            [
                'id'            => 2,
                'category_name' => 'Headphone',
                'updated_at'    => now(),
                'created_at'    => now()
            ],
            [
                'id'            => 3,
                'category_name' => 'Furniture',
                'updated_at'    => now(),
                'created_at'    => now()
            ],
            [
                'id'            => 4,
                'category_name' => 'Sofa',
                'updated_at'    => now(),
                'created_at'    => now()
            ]

        ]);
    }
}
