<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'user_id' => User::factory(),
            'category_id' =>Category::factory(),
            'subcategory_id' => SubCategory::factory(),
            'price' => fake()->numberBetween(100, 5000),
            'qty' => fake()->numberBetween(1, 100),
            'image' => 'product_sample.jpg', // Or fake()->imageUrl()
            'status' => 1,
            // 'user_id'=<
        ];
    }
}
