<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'code';    // 主キーをcodeに変更
    public $incrementing = false;      // 自動インクリメントを無効化
    protected $keyType = 'string';     // キーの型を文字列に設定

    protected $fillable = [
        'code',
        'name',
        'country'
    ];

    public function departureFlights()
    {
        return $this->hasMany(Flight::class, 'departure_city_code', 'code');
    }

    public function arrivalFlights()
    {
        return $this->hasMany(Flight::class, 'arrival_city_code', 'code');
    }
}
