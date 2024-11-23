<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('booking_services', function (Blueprint $table) {
            $table->foreignId('booking_id')->constrained('bookings');
            $table->foreignId('service_id')->constrained('services');
            $table->primary(['booking_id', 'service_id']);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_services');
    }
};
