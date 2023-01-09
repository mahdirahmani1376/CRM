<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        [
        'company'   =>  fake()->company(),
        'vat'       =>  fake()->numberBetween(10000,99999),
        'address'   =>  fake()->address(),
        ];
    }
}
