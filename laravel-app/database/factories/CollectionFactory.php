<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CollectionFactory extends Factory
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
                'season' => $this->faker->boolean ? 'summer':'winter',
                'designer_id' => $this->faker->numberBetween(1, 8)

            ];

    }
}
