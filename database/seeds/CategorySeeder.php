<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('categories')->insert([
        //     'category_name' => 'Antique',
        //     'slug_category_name' => Str::slug('Antique', '-')
        // ]);
    	DB::table('categories')->insert([
            'category_name' => 'Vintage Car',
            'slug_category_name' => Str::slug('Vintage Car', '-')
        ]);
    	// DB::table('categories')->insert([
        //     'category_name' => 'Coins',
        //     'slug_category_name' => Str::slug('Coins', '-')
        // ]);
    }
}
