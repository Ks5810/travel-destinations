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
        //Destination::truncate();

        $faker = \Faker\Factory::create();

        // TODO: Add address field
        Destination::create([
            'name' => "Sapporo",
            'user_id' => 1,
            'visited' => false,
            'lat' => 43.061800,
            'lng' => 141.354500
        ]);
        Destination::create([
            'name' => "Sendai",
            'user_id' => 1,
            'visited' => false,
            'lat' => 38.268200,
            'lng' => 140.869400
        ]);
        Destination::create([
            'name' => "Kanazawa",
            'user_id' => 1,
            'visited' => false,
            'lat' => 36.65,
            'lng' => 136.71,
        ]);
        Destination::create([
            'name' => "Shinjuku",
            'user_id' => 1,
            'visited' => false,
            'lat' => 35.6895,
            'lng' => 139.69171
        ]);
        Destination::create([
            'name' => "Nagoya",
            'user_id' => 1,
            'visited' => false,
            'lat' => 35.18147,
            'lng' =>  136.90641
        ]);
        Destination::create([
            'name' => "Matsuyama",
            'user_id' => 1,
            'visited' => false,
            'lat' => 33.83916,
            'lng' => 132.76574
        ]);
        Destination::create([
            'name' => "Kagoshima",
            'user_id' => 1,
            'visited' => false,
            'lat' => 31.56667,
            'lng' => 130.55
        ]);


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
