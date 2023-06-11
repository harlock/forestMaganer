<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypePhotographFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_photograph' => $this->faker->word(),
            'description' => $this->faker->word(),
        ];
    }
}
