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
        // array delle maggiori compagnie italiane
        $companies = ['Italo', 'Trenitalia', 'Frecciarossa', 'Trenord'];

        // array delle maggiori cittá italiane con una stazione dei treni
        $cities = [
            'Roma', 'Milano', 'Napoli', 'Torino', 'Firenze', 'Venezia', 'Bologna',
            'Genova', 'Verona', 'Palermo', 'Bari', 'Catania', 'Padova', 'Pisa',
            'Trieste', 'Brescia', 'Parma', 'Modena', 'Messina'
        ];

        // array delle tipologie di treno
        $trainType = ['Regional', 'Intercity', 'High-speed'];

        // array delle classi del treno
        $class = ['Economy', 'Business', 'First Class'];

        // array dei tipi di ticket
        $ticketType = ['Refundable', 'Non-refundable'];


        for ($i = 0; $i < 50; $i++) {
            // gestione randomizzazione delle cittá di partenza e arrivo
            $departureStation = $faker->randomElement($cities);

            do {
                $arrivalStation = $faker->randomElement($cities);
            } while ($arrivalStation === $departureStation);

            // gestione orari arrivo e partenza
            $departureDateTime = $faker->dateTimeBetween('2024-07-01', '2025-01-01');
            $arrivalDateTime = $faker->dateTimeBetween(
                (clone $departureDateTime)->modify('+2 hours'),
                (clone $departureDateTime)->modify('+1 day')
            );

            // gestione travel time
            $travelTimeInSeconds = $arrivalDateTime->getTimestamp() - $departureDateTime->getTimestamp();
            $hours = intdiv($travelTimeInSeconds, 3600);
            $minutes = ceil(($travelTimeInSeconds % 3600) / 60);
            $formattedTravelTime = "{$hours}h {$minutes}min";

            // gestione nome e cognome random
            $randomName = "{$faker->firstName()} {$faker->lastName()}";

            // generazione di 50 treni random

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
            $newTrain->travel_time = $formattedTravelTime;
            $newTrain->ticket_price = $faker->randomFloat(2, 10, 100);
            $newTrain->train_type = $faker->randomElement($trainType);
            $newTrain->available_seats = $faker->numberBetween(100, 1000);
            $newTrain->service_class = $faker->randomElement($class);
            $newTrain->conductor_name = $randomName;
            $newTrain->ticket_type = $faker->randomElement($ticketType);
            $newTrain->average_speed = $faker->randomFloat(2, 80, 300);
            $newTrain->manufacture_date = $faker->date('Y-m-d', 'now');
            $newTrain->save();
        }
    }
}
