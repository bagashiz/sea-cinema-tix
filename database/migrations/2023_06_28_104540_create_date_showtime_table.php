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
        Schema::create('date_showtime', function (Blueprint $table) {
            $table->id();
            $table->foreignId('date_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('showtime_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_showtime');
    }
};
