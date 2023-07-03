<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booked_seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained()
                ->onDelete('cascade')
                ->nullable();
            $table->foreignId('date_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('seat_id')
                ->constrained()
                ->onDelete('cascade');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_seat');
    }
};
