<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_images')->truncate();
        DB::table('product_images')->insert([
            [
                'id'                    => 1,
                'product_id'            => 1,
                'image_name'            => 'oraimo-headphone-1.png',
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 2,
                'product_id'            => 1,
                'image_name'            => 'oraimo-headphone-2.jpeg',
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 3,
                'product_id'            => 1,
                'image_name'            => 'oraimo-headphone-3.jpeg',
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 4,
                'product_id'            => 2,
                'image_name'            => 'furniture.jpg',
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 5,
                'product_id'            => 3,
                'image_name'            => 'router-image.png',
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 6,
                'product_id'            => 3,
                'image_name'            => 'router-image-1.jpg',
                'updated_at'            => now(),
                'created_at'            => now()
            ],
        ]);
    }
}
