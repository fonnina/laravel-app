<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'name' => $this->faker->company,
            'material' => $this->faker->word,
            'description' => $this->faker->text,
            'collection_id' => $this->faker->numberBetween(1, 40)
        ];
    }
}
