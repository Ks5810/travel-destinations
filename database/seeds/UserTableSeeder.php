<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate User table
        User::truncate();

        $faker = \Faker\Factory::create();

        // Create a pass word hashed from the string "keisuke"
        $password = Hash::make('126621');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@test.com',
            'password' => $password,
        ]);
    }
}
