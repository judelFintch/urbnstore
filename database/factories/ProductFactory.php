<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\CategoryArticles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'slug' => Str::slug($this->faker->unique()->words(3, true)),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock' => $this->faker->numberBetween(1, 50),
            'is_active' => true,
            'category_id' => CategoryArticles::factory(),
        ];
    }
}
