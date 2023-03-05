<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryCount = Category::count();
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(50),
            'category_id' => rand(1, $categoryCount)
        ];
    }
}
