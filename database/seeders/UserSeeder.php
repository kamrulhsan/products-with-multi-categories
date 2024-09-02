<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'user_type' => 1,
                'updated_at'    => now(),
                'created_at'    => now()
            ],
            [
                'id' => 2,
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('123456'),
                'user_type' => 2,
                'updated_at'    => now(),
                'created_at'    => now()
            ],

        ]);
    }
}
