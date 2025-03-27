<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flight;
use App\Models\City;
use App\Models\Airline;
use Carbon\Carbon;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 既存の都市IDを取得
        $tokyo = City::where('code', 'HND')->first()->id;
        $osaka = City::where('code', 'KIX')->first()->id;
        $fukuoka = City::where('code', 'FUK')->first()->id;

        // 航空会社IDを取得
        $jal = Airline::where('airline', 'Japan Airlines')->first()->id;
        $ana = Airline::where('airline', 'All Nippon Airways')->first()->id;
        $peach = Airline::where('airline', 'Peach Aviation')->first()->id;
        $jetstar = Airline::where('airline', 'Jetstar Japan')->first()->id;

        $flights = [
            // JAL路線
            [
                'airline_id' => $jal,
                'departure_city_code' => 'HND',
                'arrival_city_code' => 'CTS',
                'flight_number' => 'JL501',
                'departure_time' => Carbon::today()->addHours(7),
                'arrival_time' => Carbon::today()->addHours(8)->addMinutes(30),
                'price' => 35000,
                'available_seats' => 150
            ],
            [
                'airline_id' => $jal,
                'departure_city_code' => 'HND',
                'arrival_city_code' => 'KIX',
                'flight_number' => 'JL123',
                'departure_time' => Carbon::today()->addHours(8),
                'arrival_time' => Carbon::today()->addHours(9)->addMinutes(15),
                'price' => 25000,
                'available_seats' => 150
            ],
            [
                'airline_id' => $jal,
                'departure_city_code' => 'HND',
                'arrival_city_code' => 'FUK',
                'flight_number' => 'JL305',
                'departure_time' => Carbon::today()->addHours(9),
                'arrival_time' => Carbon::today()->addHours(11),
                'price' => 30000,
                'available_seats' => 150
            ],

            // ANA路線
            [
                'airline_id' => $ana,
                'departure_city_code' => 'NRT',
                'arrival_city_code' => 'KIX',
                'flight_number' => 'NH2176',
                'departure_time' => Carbon::today()->addHours(10),
                'arrival_time' => Carbon::today()->addHours(11)->addMinutes(30),
                'price' => 28000,
                'available_seats' => 120
            ],
            [
                'airline_id' => $ana,
                'departure_city_code' => 'NRT',
                'arrival_city_code' => 'FUK',
                'flight_number' => 'NH2451',
                'departure_time' => Carbon::today()->addHours(14),
                'arrival_time' => Carbon::today()->addHours(16),
                'price' => 32000,
                'available_seats' => 120
            ],

            // Peach Aviation路線
            [
                'airline_id' => $peach,
                'departure_city_code' => 'KIX',
                'arrival_city_code' => 'NRT',
                'flight_number' => 'MM102',
                'departure_time' => Carbon::today()->addHours(7),
                'arrival_time' => Carbon::today()->addHours(8)->addMinutes(30),
                'price' => 12000,
                'available_seats' => 180
            ],
            [
                'airline_id' => $peach,
                'departure_city_code' => 'KIX',
                'arrival_city_code' => 'CTS',
                'flight_number' => 'MM230',
                'departure_time' => Carbon::today()->addHours(11),
                'arrival_time' => Carbon::today()->addHours(13),
                'price' => 15000,
                'available_seats' => 180
            ],

            // Jetstar路線
            [
                'airline_id' => $jetstar,
                'departure_city_code' => 'NRT',
                'arrival_city_code' => 'OKA',
                'flight_number' => 'GK303',
                'departure_time' => Carbon::today()->addHours(9),
                'arrival_time' => Carbon::today()->addHours(12),
                'price' => 18000,
                'available_seats' => 180
            ],
            [
                'airline_id' => $jetstar,
                'departure_city_code' => 'KIX',
                'arrival_city_code' => 'FUK',
                'flight_number' => 'GK501',
                'departure_time' => Carbon::today()->addHours(13),
                'arrival_time' => Carbon::today()->addHours(14)->addMinutes(15),
                'price' => 10000,
                'available_seats' => 180
            ]
        ];

        foreach ($flights as $flight) {
            Flight::create($flight);
        }
    }
}
