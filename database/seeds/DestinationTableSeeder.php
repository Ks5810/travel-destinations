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

        // TODO: Add address field
        // Creating ten destinations
        for ($i = 0; $i < 10; $i++) {
            Destination::create([
                'name' => $faker->city,
                'user_id' => 1,
                'visited' => false,
                'lat' => $faker->latitude,
                'lng' => $faker->longitude
            ]);
        }
        // Creating another ten destinations for user with id 2
        for ($i = 0; $i < 10; $i++) {
            Destination::create([
                'name' => $faker->city,
                'user_id' => 2,
                'visited' => false,
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
            ]);
        }
    }
}
