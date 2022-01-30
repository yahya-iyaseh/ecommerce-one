<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->productName ,
            'price' => $this->faker->numberBetween(0, 1000) ,
            'image' => $this->faker->avatar('foo', '300x300') ,
            'description' => $this->faker->sentence(3) ,
            'additional_info' => $this->faker->sentence(4) ,
            'category_id' =>  Category::inRandomOrder()->limit(1)->first(),
            'sub_category' => SubCategory::inRandomOrder()->limit(1)->first() ,
            'created_at' => now() ,
        ];
    }
}
