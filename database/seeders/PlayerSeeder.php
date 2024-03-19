<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
use Illuminate\Support\Arr;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 25; $i++) {
            Player::create([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'age' => rand(18, 34),
                'nationality' => $faker->country,
                'position' => Arr::random(['PT', 'DF', 'MC', 'DL'])
            ]);
        }
    }
}
