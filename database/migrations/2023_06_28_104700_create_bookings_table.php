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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('movie_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('date_showtime_id')
                ->constrained('date_showtime')
                ->onDelete('cascade');
            $table->bigInteger('total_price')
                ->default(0);
            $table->enum('status', ['paid', 'cancelled']);
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
