<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->department(6) ,
            'category_id' => Category::inRandomOrder()->limit(1)->first()->id ,
            'created_at' => now() ,
        ];
    }
}
