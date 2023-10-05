<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'zipcode' => fake()->postcode(),
            'address' => fake()->streetName(),
            'number' => fake()->buildingNumber(),
            'neighborhood' => ' ',
            'complement' => fake()->secondaryAddress(),
            'state_id' => 35,
            'city_id' => 3548708,
            'latitude' => fake()->latitude($min = -33, $max = 6),
            'longitude' => fake()->longitude($min = -60, $max = -53),
        ];
    }
}
