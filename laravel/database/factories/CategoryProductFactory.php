<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $countProducts = Product::count();
        $countCategories = Category::count();
        return [
            'category_id' => rand(1, $countCategories),
            'product_id' => rand(1, $countProducts)
        ];
    }
}
