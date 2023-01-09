<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        [
            'title'             =>  fake()->title(),
            'description'       => fake()->text(),
            'assigned_client'   =>fake()->
            'status'            =>fake()->
            'deadline'          =>fake()->
        ];
    }
}
