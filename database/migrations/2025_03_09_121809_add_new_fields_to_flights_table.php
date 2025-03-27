<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->string('transfer_city')->nullable();
            $table->integer('transfer_time')->nullable();
            $table->string('class')->nullable();
            $table->boolean('carry_on_baggage')->default(false);
            $table->boolean('check_in_baggage')->default(false);
            $table->integer('duration_time')->nullable();
            $table->boolean('meal')->default(false);
            $table->boolean('refundable')->default(false);
            $table->decimal('change_fee',8,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn([
                'transfer_city',
                'transfer_time',
                'class',
                'carry_on_baggage',
                'check_in_baggage',
                'duration_time',
                'meal',
                'refundable',
                'change_fee'
            ]);
        });
    }
};
