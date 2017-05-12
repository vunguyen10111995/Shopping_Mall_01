<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'admin',
            'full_name' => 'tranvanmy',
            'auth_key' => 12345,
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345),
            'phone' => 12345,
            'address' => 'namdinh',
            'level' => 1,
            'status' => 1,
            'striper_id' => 1,
            'card_brand' => 1,
            'card_last_four' => 1,
         ]);
    }
}
