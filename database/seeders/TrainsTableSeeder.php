<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $newTrain = new Train();
        $newTrain->train_code = $faker->regexify('[A-Z]{2}[0-9]{3}');
        $newTrain->company = $faker->company();
        $newTrain->departure_station = $faker->city();
        $newTrain->departure_date = $faker->dateTimeBetween('2024-07-10', '2025-01-01')->format('Y-m-d');
        $newTrain->departure_time = $faker->time();
        $newTrain->arrival_station = $faker->city();
        $newTrain->arrival_date = $faker->dateTimeBetween('2024-07-10', '2025-01-01')->format('Y-m-d');
        $newTrain->arrival_time = $faker->time();
        $newTrain->carriage_number = $faker->numberBetween(1, 30);
        $newTrain->is_ontime = $faker->boolean();
        $newTrain->is_canceled = $faker->boolean();
        $newTrain->save();
    }
}
