<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'id'                    => 1,
                'title'                 => 'Oraimo Headphone',
                'slug'                  => 'oraimo-headphone',
                'thumbnail'             => 'oraimo-thumbnail.jpg',
                'sku'                   => 12345,
                'short_description'     => 'Short Description',
                'long_description'      => 'Long Description',
                'stock_qty'             => 100,
                'is_active'             => 'yes',
                'created_by_id'         => 1,
                'updated_by_id'         => NULL,
                'deleted_by_id'         => NULL,
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 2,
                'title'                 => 'Furniture',
                'slug'                  => 'home-furniture',
                'thumbnail'             => 'furniture-thumbnail.jpg',
                'sku'                   => 12346,
                'short_description'     => 'Short Description',
                'long_description'      => 'Long Description',
                'stock_qty'             => 100,
                'is_active'             => 'yes',
                'created_by_id'         => 1,
                'updated_by_id'         => NULL,
                'deleted_by_id'         => NULL,
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 3,
                'title'                 => 'Wifi Router',
                'slug'                  => 'wifi-router',
                'thumbnail'             => 'Router-thumbnail.png',
                'sku'                   => 12347,
                'short_description'     => 'Short Description',
                'long_description'      => 'Long Description',
                'stock_qty'             => 100,
                'is_active'             => 'yes',
                'created_by_id'         => 1,
                'updated_by_id'         => NULL,
                'deleted_by_id'         => NULL,
                'updated_at'            => now(),
                'created_at'            => now()
            ],

        ]);

        DB::table('category_product')->truncate();
        DB::table('category_product')->insert([
            [
                'id'                    => 1,
                'category_id'           => 1,
                'product_id'            => 1,
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 2,
                'category_id'           => 2,
                'product_id'            => 1,
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 3,
                'category_id  '         => 3,
                'product_id '           => 2,
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 4,
                'category_id  '         => 4,
                'product_id '           => 2,
                'updated_at'            => now(),
                'created_at'            => now()
            ],
            [
                'id'                    => 5,
                'category_id  '         => 1,
                'product_id '           => 3,
                'updated_at'            => now(),
                'created_at'            => now()
            ],
        ]);
    }
}
