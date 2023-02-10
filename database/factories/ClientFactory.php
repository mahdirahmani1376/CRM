<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => fake()->company(),
            'company_vat' => fake()->numberBetween(10000, 99999),
            'company_address' => fake()->address(),
            'contact_name' => $this->faker->name(),
            'contact_email' => $this->faker->email(),
            'contact_phone_number' => $this->faker->phoneNumber(),
            'company_city' => $this->faker->city(),
            'company_zip' => $this->faker->randomNumber(4),
        ];
    }
}
