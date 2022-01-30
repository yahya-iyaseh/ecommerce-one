<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->department(6),
            'description' => $this->faker->sentence(3) ,
            'image' => $this->faker->avatar('foo', '300x300') ,
            'created_at' => now()
        ];
    }
}
