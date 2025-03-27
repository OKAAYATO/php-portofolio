<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        $cities = [
            [
                'code' => 'HND',
                'name' => 'Tokyo Haneda',
                'country' => 'Japan'
            ],
            [
                'code' => 'NRT',
                'name' => 'Tokyo Narita',
                'country' => 'Japan'
            ],
            [
                'code' => 'KIX',
                'name' => 'Osaka Kansai',
                'country' => 'Japan'
            ],
            [
                'code' => 'FUK',
                'name' => 'Fukuoka',
                'country' => 'Japan'
            ],
            [
                'code' => 'CTS',
                'name' => 'Sapporo Chitose',
                'country' => 'Japan'
            ],
            [
                'code' => 'OKA',
                'name' => 'Okinawa Naha',
                'country' => 'Japan'
            ]
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
