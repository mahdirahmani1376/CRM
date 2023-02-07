<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_id' => User::inRandomOrder()->first(),
            'user_id' => Client::inRandomOrder()->first(),
            'status' => array_rand(Task::STATUS),
        ];
    }
}
