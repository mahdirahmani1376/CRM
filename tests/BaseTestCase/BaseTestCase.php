<?php

namespace Tests\BaseTestCase;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class BaseTestCase extends  TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $mahdi = User::create([
            'name' => 'mahdi rahmani',
            'email' => 'rahmanimahdi16@gmail.com',
            'password' => Hash::make('Ma13R18@'),
        ]);

        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $simpleUser = Role::create(['name' => 'Simple User']);

    }
}
