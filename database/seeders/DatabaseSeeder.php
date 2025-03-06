<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(1)->create();

        User::factory()->create([
            'name' => 'superadmin',
            'email' => 'test@example.com',
            'role' => '9',
            'isActive' => '1',

        ]);

        $this->call([
            CategoriesTableSeeder::class,
            ArticlesTableSeeder::class,
            UserSeeder::class,
        ]);
    }
}
