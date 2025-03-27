<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airline_id')->constrained('airlines');
            $table->string('departure_city_code', 3);
            $table->string('arrival_city_code', 3);
            $table->string('flight_number');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->decimal('price', 10, 2);
            $table->integer('available_seats');
            $table->timestamps();

            $table->foreign('departure_city_code')
                  ->references('code')
                  ->on('cities')
                  ->onDelete('restrict');
            
            $table->foreign('arrival_city_code')
                  ->references('code')
                  ->on('cities')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
