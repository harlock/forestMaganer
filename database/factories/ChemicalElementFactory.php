<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChemicalElementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'chemical_code' => $this->faker->numberBetween(1000, 9000),
        ];
    }
}
