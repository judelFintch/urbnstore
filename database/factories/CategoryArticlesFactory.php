<?php

namespace Database\Factories;

use App\Models\CategoryArticles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryArticlesFactory extends Factory
{
    protected $model = CategoryArticles::class;

    public function definition(): array
    {
        $name = $this->faker->word();
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name.'-'.uniqid()),
            'description' => $this->faker->sentence(),
        ];
    }
}
