<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mahdi rahmani',
            'email' => 'rahmanimahdi16@gmail.com',
            'password' => Hash::make('Ma13R18@'),
        ]);

        $users = User::factory(10)->create();
        $clients = Client::factory(20)->create()
            ->each(function ($client) use ($users) {
                Project::factory(random_int(1, 10))->create(['client_id' => $client->id])
                ->each(function ($project) use ($users) {
                    Task::create(['project_id' => $project->id, 'user_id' => $users->random()->id]);
                });
            });
    }
}
