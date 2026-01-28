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
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'usertype' => 'admin',
                'password' => '12345678',
            ],
             [
                'name' => 'athumani',
                'email' => 'a@gmail.com',
                'usertype' => 'user',
                'password' => '12345678',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
