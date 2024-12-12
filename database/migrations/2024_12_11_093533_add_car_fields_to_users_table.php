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
        Schema::table('users', function (Blueprint $table) {
        $table->string('phone', 15)->nullable()->after('email');
        $table->enum('car_size',['Small','Medium','Large'])->after('phone');
        $table->string('car_model')->nullable()->after('car_size');
        $table->string('car_license_plate')->nullable()->after('car_model');
        $table->string('car_image', 255)->nullable()->after('car_license_plate');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
