<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable = [
        'airline',
        'airline_logo'
    ];

    // Flightモデルとのリレーション（後でFlightテーブルにairline_idを追加する際に使用）
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
