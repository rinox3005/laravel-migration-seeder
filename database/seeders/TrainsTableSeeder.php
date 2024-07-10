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
        $companies = ['Italo', 'Trenitalia', 'Frecciarossa', 'Trenord'];

        $cities = [
            'Roma', 'Milano', 'Napoli', 'Torino', 'Firenze', 'Venezia', 'Bologna',
            'Genova', 'Verona', 'Palermo', 'Bari', 'Catania', 'Padova', 'Pisa',
            'Trieste', 'Brescia', 'Parma', 'Modena', 'Reggio Emilia', 'Messina'
        ];

        $newTrain = new Train();
        $newTrain->train_code = $faker->regexify('[A-Z]{2}[0-9]{3}');
        $newTrain->company = $faker->randomElement($companies);
        $newTrain->departure_station = $faker->randomElement($cities);

        $departureDateTime = $faker->dateTimeBetween('2024-07-10', '2025-01-01');
        $newTrain->departure_date = $departureDateTime->format('Y-m-d');
        $newTrain->departure_time = $departureDateTime->format('H:i:s');

        do {
            $newTrain->arrival_station = $faker->randomElement($cities);
        } while ($newTrain->departure_station === $newTrain->arrival_station);

        $minArrivalDateTime = (clone $departureDateTime)->modify('+2 hours');
        $maxArrivalDateTime = (clone $departureDateTime)->modify('+1 day');
        $arrivalDateTime = $faker->dateTimeBetween($minArrivalDateTime, $maxArrivalDateTime);
        $newTrain->arrival_date = $arrivalDateTime->format('Y-m-d');
        $newTrain->arrival_time = $arrivalDateTime->format('H:i:s');

        $newTrain->carriage_number = $faker->numberBetween(1, 30);
        $newTrain->is_ontime = $faker->boolean();
        $newTrain->is_canceled = $faker->boolean();
        $newTrain->save();
    }
}
