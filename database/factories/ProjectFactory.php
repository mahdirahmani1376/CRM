<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->text(),
            //            'client_id'         =>  Client::inRandomOrder()->first(),
            'status' => array_rand(['open', 'closed']),
            'deadline' => now()->addDays(rand(1, 15)),
        ];
    }
}
