<?php

namespace Database\Factories;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'             =>  fake()->title(),
            'description'       =>  fake()->text(),
            'assigned_client'   =>  Clients::inRandomOrder()->first(),
            'assigned_user'     =>  User::inRandomOrder()->first(),
            'status'            =>  array_rand(['open','closed']),
            'deadline'          =>  now()->addDays(rand(1,15)),
        ];
    }
}
