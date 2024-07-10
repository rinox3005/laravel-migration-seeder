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
        // array delle maggiorni compagnie italiane
        $companies = ['Italo', 'Trenitalia', 'Frecciarossa', 'Trenord'];

        // array delle maggiori cittá italiane con una stazione dei treni
        $cities = [
            'Roma', 'Milano', 'Napoli', 'Torino', 'Firenze', 'Venezia', 'Bologna',
            'Genova', 'Verona', 'Palermo', 'Bari', 'Catania', 'Padova', 'Pisa',
            'Trieste', 'Brescia', 'Parma', 'Modena', 'Reggio Emilia', 'Messina'
        ];

        $departureStation = $faker->randomElement($cities);

        do {
            $arrivalStation = $faker->randomElement($cities);
        } while ($arrivalStation === $departureStation);

        $departureDateTime = $faker->dateTimeBetween('2024-07-01', '2025-01-01');
        $arrivalDateTime = $faker->dateTimeBetween(
            (clone $departureDateTime)->modify('+2 hours'),
            (clone $departureDateTime)->modify('+1 day')
        );

        $newTrain = new Train();
        $newTrain->train_code = $faker->regexify('[A-Z]{2}[0-9]{3}');
        $newTrain->company = $faker->randomElement($companies);
        $newTrain->departure_station = $departureStation;
        $newTrain->departure_date = $departureDateTime->format('Y-m-d');
        $newTrain->departure_time = $departureDateTime->format('H:i:00');
        $newTrain->arrival_station = $arrivalStation;
        $newTrain->arrival_date = $arrivalDateTime->format('Y-m-d');
        $newTrain->arrival_time = $arrivalDateTime->format('H:i:00');
        $newTrain->carriage_number = $faker->numberBetween(1, 30);
        $newTrain->is_ontime = $faker->boolean();
        $newTrain->is_canceled = $faker->boolean();
        $newTrain->save();
    }
}
