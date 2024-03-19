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
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
        });
    }
    //GENRES
    //['Action', 'Horror', 'Drama', 'Sci-Fi', 'Comedy', 'Romance', 'Fantasy', 'Other']

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
