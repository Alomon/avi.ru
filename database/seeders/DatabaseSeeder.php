<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
           'name' => 'Пользователь',
           'code' => 'user',
        ]);
        Role::create([
            'name' => 'Админчик',
            'code' => 'admin',
        ]);
        User::create([
            'name' => 'Николай',
            'phone' => '88005553535',
            'login' => 'admin',
            'password' => 'admin',
            'role_id' => 2,
        ]);
    }
}
