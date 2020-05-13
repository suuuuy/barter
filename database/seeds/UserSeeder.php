<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'name' => 'Suy',
            'email' => 'example@example.com',
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(60),
            'api_token' => Str::random(60)
        ]);
    }
}
