<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NurseFactory extends Factory
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
            'cedula' => $this->faker->unique()->numerify('##########'), 
            'email' => $this->faker->unique()->safeEmail(), 
        ];
    }
}
