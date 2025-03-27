<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'airline_id',
        'departure_city_code',
        'arrival_city_code',
        'flight_number',
        'departure_time',
        'arrival_time',
        'price',
        'available_seats'
    ];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function departureCity()
    {
        return $this->belongsTo(City::class, 'departure_city_code', 'code');
    }

    public function arrivalCity()
    {
        return $this->belongsTo(City::class, 'arrival_city_code', 'code');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
