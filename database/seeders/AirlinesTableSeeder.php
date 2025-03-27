<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Airline;

class AirlinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $airlines = [
            [
                'airline' => 'Japan Airlines',
                'airline_logo' => 'airlines/jal-logo.png'
            ],
            [
                'airline' => 'All Nippon Airways',
                'airline_logo' => 'airlines/ana-logo.png'
            ],
            [
                'airline' => 'Peach Aviation',
                'airline_logo' => 'airlines/peach-logo.png'
            ],
            [
                'airline' => 'Jetstar Japan',
                'airline_logo' => 'airlines/jetstar-logo.png'
            ]
        ];

        foreach ($airlines as $airline) {
            Airline::create($airline);
        }
    }
}
