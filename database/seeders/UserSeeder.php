<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dimas Fadilah',
            'email' => 'dimasfadilah20@gmail.com',
            'password' => bcrypt('password'),
            'avatar' => 'me.png',
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Rafif',
            'email' => 'zeonkunix@gmail.com',
            'password' => bcrypt('password'),
            'avatar' => 'me.png',
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhon@gmail.com',
            'password' => bcrypt('password'),
            'avatar' => 'me.png',
            'role_id' => 1,
        ]);

        foreach(range(1, 20) as $i)
        {
            User::factory()->create();
        }
    }
}
