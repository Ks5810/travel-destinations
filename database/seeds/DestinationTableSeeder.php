<?php

use App\Destination;
use Illuminate\Database\Seeder;

class DestinationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate existing tables
        Destination::truncate();

        /** Using Faker
         * @link https://github.com/fzaninotto/Faker
         */
        $faker = \Faker\Factory::create();

        // Creating ten destinations
        for ($i = 0; $i < 10; $i++) {
            Destination::create([
                'name' => $faker->name,
                'user_id' => 1,
                'number' => $i,
                'visited' => false,
            ]);
        }
        // Creating another ten destinations for user with id 2
        for ($i = 0; $i < 10; $i++) {
            Destination::create([
                'name' => $faker->name,
                'user_id' => 2,
                'number' => $i,
                'visited' => false,
            ]);
        }
    }
}
