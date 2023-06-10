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
        Schema::create('movie_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('genre_id');
            $table->foreign('genre_id')->references('genre_id')->on('genres')->onDelete('cascade');
            $table->unsignedbiginteger('movie_id');
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_genres');
    }
};
