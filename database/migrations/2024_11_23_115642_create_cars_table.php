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
    Schema::create('cars', function (Blueprint $table) {
      
        $table->unsignedBigInteger('user_id'); 
        $table->string('carCode', 100)->primary();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        $table->enum('size', ['Small', 'Medium', 'Large'])->nullable(false);
        $table->string('model', 50)->nullable(); 
        $table->timestamps(); 
       
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars'); 
    }
};
