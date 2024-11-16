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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key for post
            $table->unsignedBigInteger('user_id'); // Foreign key for the user (creator of the post)
            $table->string('text')->nullable(); // Title of the post
            $table->string('image')->nullable(); // Content of the post
            $table->timestamps(); // created_at and updated_at timestamps
            // Foreign key constraint for user_id, referencing customers table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts'); // Drop the posts table if the migration is rolled back
    }
};
