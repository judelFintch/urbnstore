<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_articles')->insert([
            [
                'name' => 'Homme',
                'slug' => 'homme',
                'description' => 'Vêtements et accessoires pour homme',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Femme',
                'slug' => 'femme',
                'description' => 'Vêtements et accessoires pour femme',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Afro Styles',
                'slug' => 'Afro',
                'description' => 'Vêtements et accessoires pour enfant',
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Collections',
                'slug' => 'Collections',
                'description' => 'Chaussures pour tous les âges',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accessoires',
                'slug' => 'accessoires',
                'description' => 'Accessoires de mode pour homme, femme et enfant',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
